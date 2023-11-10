    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Thêm Bệnh Án</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com
    session_start();
    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }  
    //import database
    include("../connection.php");
    $userrow = $database->query("select * from doctor where docemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["docid"];
    $username=$userfetch["docname"];
    //echo $userid;
    //echo $username;
    ?>
    <div class="container">
    <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Bác Sĩ</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Đăng xuất" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Bảng điều khiển</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Cuộc hẹn</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Phiên khám</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient ">
                        <a href="patient.php" class="non-style-link-menu  non-style-link-menu"><div><p class="menu-text">Bệnh nhân</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment menu-active menu-icon-appoinment-active">
                        <a href="add-record.php" class="non-style-link-menu-active"><div><p class="menu-text">Bệnh Án</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings   ">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Cài đặt</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
       
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">

                <tr >
                    <td width="13%">

                    <a href="aview_record.php" ><button  class="login-btn btn-primary-soft btn"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;"><font class="tn-in-text">Xem hồ sơ bệnh án</font></button></a>
                        
                    </td>
                        
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Ngày
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
                            </table>

                        <hr>

<?php
// Kết nối CSDL
$conn = mysqli_connect("localhost", "root", "", "doctorbooking");

// Xử lý submit form
if(isset($_POST['submit'])) {
  // Lấy dữ liệu
  $pid = $_POST['pid'];
  $date = $_POST['date'];
  $docid = $_POST['docid'];
  $diagnostic = $_POST['diagnostic'];
  $note = $_POST['note'];

  // Câu lệnh INSERT
  $sql = "INSERT INTO record (pid, date, docid, diagnostic, note)
          VALUES ('$pid', '$date', '$docid', '$diagnostic', '$note')";

  // Thực thi câu lệnh INSERT
  mysqli_query($conn, $sql);
  
  // Thông báo kết quả
{
    $message = "Lưu bệnh án thành công";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

}


?>

<style>
form {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-family: Arial;
}

h1 {
  text-align: center; 
}

label {
  display: block;
  margin-bottom: 5px;
}

input, textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  margin-bottom: 20px;
  border-radius: 3px;
}

button {
  background: #4caf50;
  border: none;
  color: white;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background: #006dd3;
}

@media (max-width: 600px) {
  form {
    max-width: 100%;
    padding: 20px 10px; 
  }
}
</style>

<div class="">
  <h1>Thêm Mới Bệnh Án</h1>

  <form method="post">
    <label>ID bệnh nhân:</label>
    <input type="text" name="pid" required>

    <label>Ngày khám:</label>
    <input type="date" name="date" required>

    <label>ID bác sĩ:</label>
    <input type="text" name="docid" required>
    
    <label>Chuẩn đoán:</label>
    <textarea name="diagnostic"></textarea>

    <label>Ghi chú:</label>
    <textarea name="note"></textarea>

    <button type="submit"  class="login-btn btn-primary-soft btn"  style="padding-top:11px;padding-bottom:11px;"><font class="tn-in-text">Lưu bệnh án</font></button>
  </form>

</div>
</table>

</body>
</html>