<?php
include "../koneksi.php";
$kode = $_GET['kd_nilai'];
$sql = "DELETE From nilai where kd_nilai='$kode'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:nilai_view.php');
}else{
echo "Gagal terhapus";
}
?>
