<?php
include "../koneksi.php";
$kode = $_GET['kd_nilai'];
$sql = "Select * From nilai where kd_nilai='$kode'";
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
        <h2>Edit Nilai</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" class="form-control" name="kode" value='<?php echo
                                                                            $row['kd_nilai']; ?>' placeholder="Masukkan Kode">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <select class="form-select" name="nama">
                    <?php
                    include "../koneksi.php";
                    $sql_guru = "SELECT * FROM siswa";
                    $result_guru = mysqli_query($connection, $sql_guru);
                    while ($row_guru = mysqli_fetch_assoc($result_guru)) {
                        // Menambahkan attribute 'selected' jika nip guru sama dengan nip yang ada di data matpel
                        $selected = $row['nis'] == $row_guru['nis'] ? 'selected' : '';
                        echo "<option value='" . $row_guru["nis"] . "' " . $selected . ">" . $row_guru["nama_siswa"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Matpel</label>
                <select class="form-select" name="matpel">
                    <?php
                    include "../koneksi.php";
                    $sql_guru = "SELECT * FROM matpel";
                    $result_guru = mysqli_query($connection, $sql_guru);
                    while ($row_guru = mysqli_fetch_assoc($result_guru)) {
                        // Menambahkan attribute 'selected' jika nip guru sama dengan nip yang ada di data matpel
                        $selected = $row['kd_matpel'] == $row_guru['kd_matpel'] ? 'selected' : '';
                        echo "<option value='" . $row_guru["kd_matpel"] . "' " . $selected . ">" . $row_guru["nama_matpel"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai P</label>
                <input type="text" class="form-control" name="nilaiP" value='<?php echo
                                                                                $row['nilai_p']; ?>' placeholder="Masukkan Nilai P">
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai K</label>
                <input type="text" class="form-control" name="nilaiK" value='<?php echo
                                                                                $row['nilai_p']; ?>' placeholder="Masukkan Nilai P">
            </div>
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="text" class="form-control" name="semester" value="<?php echo
                                                                            $row['semester']; ?>" placeholder="No HP">
            </div>
            <div class="mb-3">
                <label class="form-label">Tapel</label>
                <input type="text" class="form-control" name="tapel" value="<?php echo
                                                                                    $row['tapel']; ?>" placeholder="Kompetensi">
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
        $matpel = $_POST['matpel'];
        $nilaiP = $_POST['nilaiP'];
        $nilaiK = $_POST['nilaiK'];
        $semester = $_POST['semester'];
        $tapel = $_POST['tapel'];
        $sql = "UPDATE nilai SET nis='$nama',kd_matpel='$matpel',nilai_p='$nilaiP',nilai_k='$nilaiK',semester='$semester',tapel='$tapel' WHERE kd_nilai='$kode'";
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