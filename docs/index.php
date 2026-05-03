<?php include 'koneksi.php'; ?>

<?php
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM todos"))['t'];
$done = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM todos WHERE status='done'"))['t'];
$pending = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM todos WHERE status='pending'"))['t'];

$progress = $total > 0 ? round(($done / $total) * 100) : 0;
?>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<div class="container">

    <!-- HEADER -->
    <div class="topbar">
        <div>
            <h1>🚀 My Tasks</h1>
            <p class="subtitle">Kelola tugasmu dengan lebih produktif</p>
        </div>
        <a href="tambah.php" class="btn">+ Task</a>
    </div>

    <!-- PROGRESS CARD -->
    <div class="progress-card">
        <div class="progress-info">
            <h2><?= $progress ?>%</h2>
            <p>Progress Selesai</p>
        </div>
        <div class="progress-bar-wrap">
            <div class="progress-bar" style="width: <?= $progress ?>%"></div>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats">
        <div class="stat total">
            <h3><?= $total ?></h3>
            <p>Total</p>
        </div>
        <div class="stat done">
            <h3><?= $done ?></h3>
            <p>Selesai</p>
        </div>
        <div class="stat pending">
            <h3><?= $pending ?></h3>
            <p>Pending</p>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="search-box">
        <input type="text" id="search" placeholder="🔍 Cari task...">
    </div>

    <!-- TASK LIST (lebih dinamis dari table) -->
    <div id="taskList" class="task-list">
        <?php
        $data = mysqli_query($conn, "SELECT * FROM todos ORDER BY id DESC");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="task-item">

                <div class="task-content">
                    <h4><?= $d['title']; ?></h4>
                    <p><?= substr($d['description'], 0, 80); ?>...</p>
                </div>

                <div class="task-right">
                    <span class="badge <?= $d['status']; ?>">
                        <?= $d['status']; ?>
                    </span>

                    <div class="actions">
                        <a href="edit.php?id=<?= $d['id']; ?>">✏️</a>
                        <a href="hapus.php?id=<?= $d['id']; ?>">🗑️</a>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>

</div>

<script>
const search = document.getElementById("search");
const tasks = document.querySelectorAll(".task-item");

search.addEventListener("keyup", function() {
    let value = this.value.toLowerCase();

    tasks.forEach(task => {
        task.style.display = task.innerText.toLowerCase().includes(value) ? "flex" : "none";
    });
});
</script>