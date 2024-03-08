<?php include '../admin/header.php' ?>
<?php
include_once '../../models/ketnoi.php';
?>
<?php
        $MaSP = $_GET['MaSP']; 
        $sql = "DELETE FROM danhmucsp where MaSP = '$MaSP'";
        $query= mysqli_query($conn, $sql);
        header('location: danhmucmonan.php');

?>