<!DOCTYPE html>
<html>

<head>
    <title>Menambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
<?php
    include "../template/menu.php";
    ?>
    <div class="container">
        <h2>TAMBAH KOMPETENSI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">KODE KOMPETENSI</label>
                <input type="text" class="form-control" name="kode" placeholder="Masukkan Kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kompetensi</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kompetensi">
            <div class="mb-3">
                <label class="form-label">Program Keahlian</label>
                <input type="text" class="form-control" name="prog_keahlian" placeholder="Masukkan Keahlian">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "../koneksi.php";
    if (isset($_POST['submit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $prog_keahlian = $_POST['prog_keahlian'];
        $sql = "INSERT INTO kompetensi 
values('$kode','$nama','$prog_keahlian')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:kompetensi_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>