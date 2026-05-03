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

    <!-- HEADER -->
    <div class="topbar">
        <div>
            <h1>Tambah Task</h1>
            <div class="subtitle">Buat tugas baru</div>
        </div>
        <a href="index.php" class="btn">← Kembali</a>
    </div>

    <!-- FORM CARD -->
    <div class="task-item" style="flex-direction: column; align-items: stretch; gap:15px;">

        <form method="POST">

            <div class="task-content">
                <h4>Judul</h4>
                <input type="text" name="title" placeholder="Contoh: Belajar PHP" required style="width:100%; padding:10px; border-radius:10px; border:none;">
            </div>

            <div class="task-content">
                <h4>Deskripsi</h4>
                <textarea name="description" placeholder="Tulis detail tugas..." style="width:100%; padding:10px; border-radius:10px; border:none;"></textarea>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:10px;">
                <a href="index.php" class="btn">Batal</a>
                <button type="submit" name="submit" class="btn">Simpan</button>
            </div>

        </form>

    </div>

</div>