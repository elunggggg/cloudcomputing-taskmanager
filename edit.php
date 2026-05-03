<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM todos WHERE id=$id");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE todos SET title='$title', description='$desc', status='$status' WHERE id=$id");
    header("Location: index.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <!-- HEADER -->
    <div class="topbar">
        <div>
            <h1>Edit Task</h1>
            <div class="subtitle">Perbarui tugas kamu</div>
        </div>
        <a href="index.php" class="btn">← Kembali</a>
    </div>

    <!-- FORM CARD -->
    <div class="task-item" style="flex-direction: column; align-items: stretch; gap:15px;">

        <form method="POST">

            <div class="task-content">
                <h4>Judul</h4>
                <input type="text" name="title" value="<?= $d['title']; ?>" required style="width:100%; padding:10px; border-radius:10px; border:none;">
            </div>

            <div class="task-content">
                <h4>Deskripsi</h4>
                <textarea name="description" style="width:100%; padding:10px; border-radius:10px; border:none;"><?= $d['description']; ?></textarea>
            </div>

            <div class="task-content">
                <h4>Status</h4>
                <select name="status" style="width:100%; padding:10px; border-radius:10px; border:none;">
                    <option value="pending" <?= $d['status']=='pending'?'selected':''; ?>>Pending</option>
                    <option value="done" <?= $d['status']=='done'?'selected':''; ?>>Selesai</option>
                </select>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:10px;">
                <a href="index.php" class="btn">Batal</a>
                <button type="submit" name="update" class="btn">Update</button>
            </div>

        </form>

    </div>

</div>