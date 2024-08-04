<?php
include "koneksi.php";

$sql = "SELECT nip, nama_guru FROM guru";
$result = mysqli_query($connection, $sql);
?>
<html>

<head>
    <title>Dynamic Drop Down Box</title>
</head>

<BODY bgcolor="yellow">
    <form id="form" name="form" method="post">
        <select id="dropdown" name="dropdown">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["nip"] . "'>" . $row["nama_guru"] . "</option>";
                }
            } else {
                echo "<option value=''>No data available</option>";
            }
            ?>
        </select>
        <input type="submit" name="Submit" value="Select" />
    </form>
</body>

</html>