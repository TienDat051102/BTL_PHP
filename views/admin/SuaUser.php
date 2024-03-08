<?php 
include '../admin/header.php';
include_once '../../models/ketnoi.php';
?>
<?php
    if(isset($_GET["UserName"])){

        $UserName=$_GET["UserName"];
    }

?>


<?php
        $sqluser ="SELECT * FROM user";
        $queryuser = mysqli_query($conn,$sqluser);
        
        $sqlsua ="SELECT *FROM user  WHERE UserName='$UserName'";
        $querysua = mysqli_query($conn,$sqlsua);
        $rows = mysqli_fetch_array($querysua);

        if(isset($_POST['Sua'])){
            $UserName=$_POST['UserName'];
           
            $PassWord=$_POST['PassWord'];
          
            $LoaiUser=$_POST['LoaiUser'];
    
            $Ho=$_POST['Ho'];
    
            $Ten=$_POST['Ten'];
    
            $DiaChi=$_POST['DiaChi'];
    
            $SDT=$_POST['SDT'];
    
            $NgaySinh=$_POST['NgaySinh'];
    
         
    
    
    
            if($PassWord !=""){
                $sqlSua ="UPDATE user SET `UserName`='$UserName',  `PassWord` ='$PassWord' 
                ,Ho='$Ho',Ten='$Ten',DiaChi ='$DiaChi',SDT='$SDT',NgaySinh='$NgaySinh', LoaiUser= b'$LoaiUser' WHERE UserName='$UserName' ";
            $query = mysqli_query($conn,$sqlSua);
            header('location: ../admin/quanlytaikhoan.php');
    
            }
            
        }


?>


<div class="content-wrapper">

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Sửa Tài Khoản</div>
            <form method="POST" action ="">
            
            <div  class="form-group">
                    <label   for="input-6">UserName</label>
                    <input readonly name="UserName" value="<?php echo $rows['UserName']; ?>" type="text" class="form-control form-control-rounded" id="input-6" placeholder="Enter Your UserName">
                    <span asp-validation-for="UsernName" class="text-danger"></span>
                </div>
                
                <div  class="form-group">
                    <label  for="input-7">PassWord</label>
                    <input name="PassWord" value="<?php echo $rows['PassWord']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Password">
                </div>

               
                    

                <div  class="form-group">
                    <label for="input-7">Họ </label>
                    <input  name ="Ho" value="<?php echo $rows['Ho']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Họ ">
                </div>

                <div  class="form-group">
                    <label for="input-7">Tên </label>
                    <input name ="Ten" value="<?php echo $rows['Ten']; ?>" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Tên ">
                </div>

                <div  class="form-group">
                    <label for="input-8">Loại User</label>
                    <select name="LoaiUser" class="form-control form-control-rounded" id="input-7" placeholder="Enter LoaiUser">
                    

                        <option > 00</option>
                        <option > 01</option>
                        <option > 10</option>

                        
                      
                    </select>
                </div>

                <div  class="form-group">
                    <label for="input-7">SDT </label>
                    <input name ="SDT" value="<?php echo $rows['SDT']; ?>"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your SDT ">
                </div>
            
                <div  class="form-group">
                    <label for="input-7">Địa Chỉ </label>
                    <input name ="DiaChi" value="<?php echo $rows['DiaChi']; ?>"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Địa Chỉ ">
                </div>

                <div  class="form-group">
                    <label for="input-7">Ngày Sinh</label>
                    <input name ="NgaySinh" value="" class="form-control form-control-rounded" id="input-7" type="date"  value="">
                    <span class="text-danger field-validation-valid" data-valmsg-for="NgaySinh" data-valmsg-replace="true"></span>
                </div>
             
                
               
                <a  >
                    <Button type="submit" name="Sua" value="Sua" class="btn btn-light btn-round px-5"> Sửa </Button>
                    </a>
                </div>
                </form>
            
        </div>
    </div>
</div>
</div>
<?php include '../admin/footer.php' ?>