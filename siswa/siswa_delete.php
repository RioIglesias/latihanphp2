<?php
include "../koneksi.php";
$nis = $_GET['nis'];
$sql = "DELETE From siswa where nis='$nis'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:siswa_view.php');
}else{
echo "Gagal terhapus";
}
?>
