<?php include 'koneksi.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];

    mysqli_query($conn, "INSERT INTO todos (title, description) VALUES ('$title','$desc')");
    header("Location: index.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">

    <div class="card">

        <a href="index.php" class="back">← Kembali</a>

        <div style="margin-bottom:20px;">
            <h1 style="font-size:22px;">Tambah Tugas</h1>
            <p style="font-size:13px; color:var(--muted);">
                Isi data tugas baru dengan lengkap
            </p>
        </div>

        <form method="POST">

            <div class="form-group">
                <label>Judul Tugas</label>
                <input type="text" name="title" placeholder="Contoh: Belajar PHP CRUD" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" placeholder="Tulis detail tugas..."></textarea>
            </div>

            <div style="display:flex; justify-content:space-between; margin-top:20px;">
                <a href="index.php" class="btn">← Batal</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>

    </div>

</div>