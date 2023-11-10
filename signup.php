    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Đăng Ký</title>
    
</head>
<body>
<?php


session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;



if($_POST){

    

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'cccd'=>$_POST['cccd'],
        'dob'=>$_POST['dob']
    );


    print_r($_SESSION["personal"]);
    header("location: create-account.php");




}

?>


    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
                    <p class="header-text">ĐĂNG KÝ TÀI KHOẢN</p>
                    <p class="sub-text">Hoàn Thành Thông Tin Cá Nhân Để Tiếp Tục</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Tên: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="Tên của bạn" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Họ của bạn" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Địa chỉ: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Địa chỉ lưu trú" required>
                </td>
            </tr>
            <tr>
  <td class="label-td" colspan="2">
    <label for="cccd" class="form-label">CCCD: </label>
  </td>
</tr>
<!-- chỉ định kiểu pattern mà input cần phải match. \d{12} có nghĩa là chỉ cho phép nhập 12 ký tự số -->
<tr>
  <td class="label-td" colspan="2">
    <input type="text" name="cccd" class="input-text" placeholder="Số CCCD bắt buộc 12 số" required pattern="\d{12}">
  </td>
</tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="dob" class="form-label">Ngày sinh: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Tiếp tục" class="login-btn btn-primary btn">
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