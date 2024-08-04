<?php
include "../koneksi.php";
$kode = $_GET['kd_matpel'];
$sql = "Select * From matpel where kd_matpel='$kode'";
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
        <h2>EDIT MAPEL</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode Matpel</label>
                <input type="text" class="form-control" name="kode" value='<?php echo
                                                                            $row['kd_matpel']; ?>' placeholder="Masukkan Kode">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Matpel</label>
                <input type="text" class="form-control" name="nama" value='<?php echo
                                                                            $row['nama_matpel']; ?>' placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Jam</label>
                <input type="text" class="form-control" name="jumlah_jam" value='<?php echo
                                                                                    $row['jumlah_jam']; ?>' placeholder="Masukkan Jumlah Jam">
                <label class="form-label">Tingkat</label>
                <input type="text" class="form-control" name="tingkat" value='<?php echo
                                                                                $row['tingkat']; ?>' placeholder="Masukkan Tingkat">
            </div>
            <div class="mb-3">
                <label class="form-label">Kompetensi</label>
                <select class="form-select" name="kompetensi">
                    <?php
                    include "../koneksi.php";
                    $sql_guru = "SELECT * FROM kompetensi";
                    $result_guru = mysqli_query($connection, $sql_guru);
                    while ($row_guru = mysqli_fetch_assoc($result_guru)) {
                        // Menambahkan attribute 'selected' jika nip guru sama dengan nip yang ada di data matpel
                        $selected = $row['kd_kompetensi'] == $row_guru['kd_komepetensi'] ? 'selected' : '';
                        echo "<option value='" . $row_guru["kd_kompetensi"] . "' " . $selected . ">" . $row_guru["nama_kompetensi"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Guru</label>
                <select class="form-select" name="nip">
                    <?php
                    include "../koneksi.php";
                    $sql_guru = "SELECT * FROM guru";
                    $result_guru = mysqli_query($connection, $sql_guru);
                    while ($row_guru = mysqli_fetch_assoc($result_guru)) {
                        // Menambahkan attribute 'selected' jika nip guru sama dengan nip yang ada di data matpel
                        $selected = $row['nip'] == $row_guru['nip'] ? 'selected' : '';
                        echo "<option value='" . $row_guru["nip"] . "' " . $selected . ">" . $row_guru["nama_guru"] . "</option>";
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
        $guru = $_POST['nip'];
        $sql = "UPDATE matpel SET nama_matpel='$nama',jumlah_jam='$jumlah_jam',tingkat='$tingkat',kd_kompetensi='$kompetensi',nip='$guru' WHERE kd_matpel='$kode'";
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