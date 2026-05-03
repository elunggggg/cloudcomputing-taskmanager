<?php include 'koneksi.php'; ?>



<?php
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM todos"))['t'];
$done = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM todos WHERE status='done'"))['t'];
$pending = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as t FROM todos WHERE status='pending'"))['t'];
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <div class="topbar">
        <h1>🧠 Task Manager</h1>
        <a href="tambah.php" class="btn btn-primary">+ Tambah</a>
    </div>

    <!-- STATS -->
    <div class="stats">
        <div class="stat-box">
            <h3><?= $total ?></h3>
            <p>Total Task</p>
        </div>
        <div class="stat-box">
            <h3><?= $done ?></h3>
            <p>Selesai</p>
        </div>
        <div class="stat-box">
            <h3><?= $pending ?></h3>
            <p>Pending</p>
        </div>
    </div>

    <div class="card">

        <div class="search">
            <input type="text" id="search" placeholder="Cari tugas...">
        </div>

        <table id="table">
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php
            $data = mysqli_query($conn, "SELECT * FROM todos");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?= $d['title']; ?></td>

                    <td class="desc" title="<?= $d['description']; ?>">
                        <?= $d['description']; ?>
                    </td>

                    <td>
                        <span class="status <?= $d['status']; ?>">
                            <?= $d['status']; ?>
                        </span>
                    </td>

                    <td>
                        <div class="action">
                            <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </div>
</div>

<script>
    document.getElementById("search").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#table tr");

        rows.forEach((row, i) => {
            if (i === 0) return;
            row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
        });
    });
</script>
