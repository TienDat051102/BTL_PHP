<?php 
include_once '../../models/ketnoi.php';
?>
<?php
    if(isset($_GET["UserName"])){

        $UserName=$_GET["UserName"];
    }

?>

<?php 

$sqldelete = "DELETE FROM user WHERE UserName='$UserName'";
$query = mysqli_query($conn,$sqldelete);
header('location: ../admin/quanlytaikhoan.php');

?>