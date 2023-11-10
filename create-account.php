<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Tạo Tài Khoản</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
<?php

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";





//import database
include("connection.php");





if($_POST){

    $result= $database->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    $cccd=$_SESSION['personal']['cccd'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $result= $database->query("select * from webuser where email='$email';");
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Tên tài khoản đã tồn tại.</label>';
        }else{
            
            $database->query("insert into patient(pemail,pname,ppassword, paddress, pcccd,pdob,ptel) values('$email','$name','$newpassword','$address','$cccd','$dob','$tele');");
            $database->query("insert into webuser values('$email','p')");

            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Lỗi xác minh mật khẩu! Điều chỉnh lại mật khẩu</label>';
    }



    
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}

?>


    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">Đăng Ký Tài Khoản</p>
                    <p class="sub-text">Tiếp Tục Điền Thông Tin.</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Nhập địa chỉ Email" required>
                </td>
                
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="tele" class="form-label">Số Điện Thoại: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <!-- pattern này yêu cầu input Số Điện Thoại phải bắt đầu bằng số 0 và có tổng cộng 10 chữ số từ 0-9. -->
                    <input type="tel" name="tele" class="input-text"  placeholder="vd: 0123456789" pattern="[0]{1}[0-9]{9}" >
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Tạo mật khẩu: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="Nhập mật khẩu bạn mong muốn" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Xác minh mật khẩu: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="Nhập lại mật khẩu" required>
                </td>
            </tr>
     
            <tr>
                
                <td colspan="2">
                    <?php echo $error ?>

                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="submit" value="Đăng Ký" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Đã có tài khoản&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Đăng nhập</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>