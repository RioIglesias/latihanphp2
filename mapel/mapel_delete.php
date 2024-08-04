<?php
include "../koneksi.php";
$kode = $_GET['kd_matpel'];
$sql = "DELETE From matpel where kd_matpel='$kode'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:mapel_view.php');
}else{
echo "Gagal terhapus";
}
?>
