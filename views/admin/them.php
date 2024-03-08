<?php include '../admin/header.php';
include_once '../../models/ketnoi.php';
?>

<?php
    
       
    if(isset($_POST['them'])){
        $UserName=$_POST['UserName'];
       
        $PassWord=$_POST['PassWord'];
      
        $LoaiUser=$_POST['LoaiUser'];

        $Ho=$_POST['Ho'];

        $Ten=$_POST['Ten'];

        $DiaChi=$_POST['DiaChi'];

        $SDT=$_POST['SDT'];

        $NgaySinh=$_POST['NgaySinh'];

      



        

      

        if($UserName !=""&&$PassWord !="" &&$LoaiUser !=""&&$DiaChi !=""&&$SDT !=""&&$NgaySinh !="" ){
            $sql ="INSERT INTO `user`(`UserName`, `PassWord` , `LoaiUser` , `Ho` , `Ten` ,`DiaChi`, `SDT` ,`NgaySinh` )
             VALUES('$UserName','$PassWord',b'$LoaiUser','$Ho','$Ten','$DiaChi' ,'$SDT','$NgaySinh') ";
        $query = mysqli_query($conn,$sql);
        header('location: ../admin/quanlytaikhoan.php');

        }
        
    }
    ?>

<div class="content-wrapper">

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Thêm Tài Khoản</div>
            <form method="POST" action ="">
            
            <div  class="form-group">
                    <label   for="input-6">UserName</label>
                    <input  name="UserName" type="text" class="form-control form-control-rounded" id="input-6" placeholder="Enter Your UserName">
                    <span asp-validation-for="UsernName" class="text-danger"></span>
                </div>
                
                <div  class="form-group">
                    <label  for="input-7">PassWord</label>
                    <input name="PassWord"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Password">
                </div>

                <div  class="form-group">
                    <label for="input-7">Họ </label>
                    <input  name ="Ho" type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Họ ">
                </div>

                <div  class="form-group">
                    <label for="input-7">Tên </label>
                    <input name ="Ten"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Tên ">
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
                    <input name ="SDT"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your SDT ">
                </div>
            
                <div  class="form-group">
                    <label for="input-7">Địa Chỉ </label>
                    <input name ="DiaChi"  type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Địa Chỉ ">
                </div>

                <div  class="form-group">
                    <label for="input-7">Ngày Sinh</label>
                    <input name ="NgaySinh" class="form-control form-control-rounded" id="input-7" type="date"  value="">
                    <span class="text-danger field-validation-valid" data-valmsg-for="NgaySinh" data-valmsg-replace="true"></span>
                </div>
             
                
               
                <a  >
                    <Button type="submit" name="them" value="them" class="btn btn-light btn-round px-5"> Thêm </Button>
                    </a>
                </div>
                </form>
            
        </div>
    </div>
</div>
</div>
<?php include '../admin/footer.php' ?>