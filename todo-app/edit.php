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

    <div class="card">

        <a href="index.php" class="back">← Kembali</a>

        <div style="margin-bottom:20px;">
            <h1 style="font-size:22px;">Edit Tugas</h1>
            <p style="font-size:13px; color:var(--muted);">
                Perbarui data tugas
            </p>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Judul Tugas</label>
                <input type="text" name="title" value="<?= $d['title']; ?>" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description"><?= $d['description']; ?></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="pending" <?= $d['status']=='pending'?'selected':''; ?>>Pending</option>
                    <option value="done" <?= $d['status']=='done'?'selected':''; ?>>Selesai</option>
                </select>
            </div>

            <div style="display:flex; justify-content:space-between; margin-top:20px;">
                <a href="index.php" class="btn">← Batal</a>
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </div>

        </form>

    </div>

</div>