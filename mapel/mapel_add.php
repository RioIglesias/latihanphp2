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
        <h2>TAMBAH MAPEL</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode Matpel</label>
                <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Matpel</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Jam</label>
                <input type="text" class="form-control" name="jumlah_jam" placeholder="Masukkan Jumlah Jam">
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="text" class="form-control" name="tingkat" placeholder="Masukkan Tingkat">
            </div>
            <div class="mb-3">
                <label class="form-label">Kompetensi</label>
                <select class="form-select" name="kompetensi">
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
            <div class="mb-3">
                <label class="form-label">Guru</label>
                <select class="form-select" name="kd_guru">
                    <?php
                    include "../koneksi.php";
                    $sql = "SELECT * FROM guru";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["nip"] . "'>" . $row["nama_guru"] . "</option>";
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
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $jumlah_jam = $_POST['jumlah_jam'];
        $tingkat = $_POST['tingkat'];
        $kompetensi = $_POST['kompetensi'];
        $guru = $_POST['kd_guru'];
        $sql = "INSERT INTO matpel 
values('$kode','$nama','$jumlah_jam','$tingkat','$kompetensi','$guru')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:mapel_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>