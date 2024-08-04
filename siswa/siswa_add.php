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
        <h2>TAMBAH SISWA</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" name="nis" placeholder="Masukkan 
NIM">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan 
Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">tempat Lahir</label>
                <input type="text" class="form-control" name="tempatLahir" placeholder="Masukkan Tempat Lahir">
            </div>
            <div class="mb-3">
                <label class="form-label">Tgl Lahir</label>
                <input type="date" class="form-control" name="tglLahir" placeholder="Masukkan 
Tgl Lahir">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" rows="3" name="alamat"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" name="noHp" placeholder="No HP">
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Kompetensi</label>
                <select class="form-select" name="kd_kompetensi">
                    <?php
                    include "../koneksi.php";
                    $sql = "SELECT * FROM kompetensi";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["kd_kompetensi"] . "'>" . $row["nama_kompetensi"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "../koneksi.php";
    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $tempatLahir = $_POST['tempatLahir'];
        $tglLahir = $_POST['tglLahir'];
        $alamat = $_POST['alamat'];
        $noHp = $_POST['noHp'];
        $kompetensi = $_POST['kd_kompetensi'];
        $sql = "INSERT INTO siswa 
values('$nis','$nama','$tempatLahir','$tglLahir','$alamat','$noHp','$kompetensi')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:siswa_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>