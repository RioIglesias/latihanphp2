<?php
include "../koneksi.php";
$kode = $_GET['kd_kompetensi'];
$sql = "DELETE From kompetensi where kd_kompetensi='$kode'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:kompetensi_view.php');
}else{
echo "Gagal terhapus";
}
?>
