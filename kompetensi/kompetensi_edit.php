<?php
include "../koneksi.php";
$kode = $_GET['kd_kompetensi'];
$sql = "Select * From kompetensi where kd_kompetensi='$kode'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
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
        <h2>EDIT KOMPETENSI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" class="form-control" name="kode" value='<?php echo
                                                                            $row['kd_kompetensi']; ?>' placeholder="Masukkan Kode">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value='<?php echo
                                                                            $row['nama_kompetensi']; ?>' placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Program Keahlian</label>
                <input type="text" class="form-control" name="prog_keahlian" value="<?php echo
                                                                                    $row['prog_keahlian']; ?>" placeholder="prog_keahlian">
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
        $sql = "UPDATE kompetensi SET nama_kompetensi='$nama',prog_keahlian='$prog_keahlian' WHERE kd_kompetensi='$kode'";
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