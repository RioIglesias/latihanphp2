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
    <h2>DATA KOMPETENSI</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Kode Kompetensi</th>
                <th scope="col">Nama Kompetensi</th>
                <th scope="col">Program Keahlian</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../koneksi.php";
            $sql = "Select * From kompetensi";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
<td>$row[kd_kompetensi]</td>
<td>$row[nama_kompetensi]</td>
<td>$row[prog_keahlian]</td>
<td><a href='kompetensi_edit.php?kd_kompetensi=$row[kd_kompetensi]'>EDIT</a> | <a 
href='kompetensi_delete.php?kd_kompetensi=$row[kd_kompetensi]'>DELETE</a></td>
</tr>";
            }
            ?>

        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="kompetensi_add.php" role="button">Tambah Data</a>
    </div>
</body>

</html>