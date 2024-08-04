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
        <h2>TAMBAH NILAI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode Nilai</label>
                <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Nilai">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <select class="form-select" name="nama_siswa">
                    <?php
                    include "../koneksi.php";
                    $sql = "SELECT * FROM siswa";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["nis"] . "'>" . $row["nama_siswa"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mapel</label>
                <select class="form-select" name="mapel">
                    <?php
                    include "../koneksi.php";
                    $sql = "SELECT * FROM matpel";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["kd_matpel"] . "'>" . $row["nama_matpel"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai P</label>
                <input type="text" class="form-control" name="nilai_p" placeholder="Masukkan Nilai P">
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai K</label>
                <input type="text" class="form-control" rows="3" name="nilai_k" placeholder="Masukkan Nilai K"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" class="form-control" name="semester" placeholder="Semester">
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Pelajaran</label>
                <input type="text" class="form-control" name="tapel" placeholder="tapel">
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
        $nama = $_POST['nama_siswa'];
        $mapel = $_POST['mapel'];
        $nilai_p = $_POST['nilai_p'];
        $nilai_k = $_POST['nilai_k'];
        $semester = $_POST['semester'];
        $tapel = $_POST['tapel'];
        $sql = "INSERT INTO nilai 
values('$kode','$nama','$mapel','$nilai_p','$nilai_k','$semester','$tapel')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:nilai_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>