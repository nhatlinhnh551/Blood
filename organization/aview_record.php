<?php
// Kết nối CSDL
$conn = mysqli_connect("localhost","root","", "doctorbooking");

// Lấy danh sách bệnh án
$sql = "SELECT * FROM record";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
    font-family: sans-serif;
    }

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid black;
  padding: 8px;
}

th {
  background-color: #D8EBFA;
  color: #1969AA    ;
}
h1{
    font-family: 'Inter', sans-serif;
    text-align: center;
    font-size: 38px;
}

</style>
</head>
<body>
<h1>HỒ SƠ BỆNH ÁN</h1>
<table>
  <tr>
    <th>ID bệnh án</th>
    <th>Ngày</th>
    <th>Tên bệnh nhân</th>
    <th>Tên bác sĩ</th>
    <th>Chuẩn đoán</th>
    <th>Ghi chú</th>
  </tr>

  <?php while($row = mysqli_fetch_assoc($result)){

    // Lấy tên bệnh nhân
    $sqlPatient = "SELECT pname FROM patient WHERE pid = {$row['pid']}";
    $patientName = mysqli_fetch_assoc(mysqli_query($conn, $sqlPatient))['pname'];
    
    // Lấy tên bác sĩ 
    $sqlDoctor = "SELECT docname FROM doctor WHERE docid = {$row['docid']}";
    $doctorName = mysqli_fetch_assoc(mysqli_query($conn, $sqlDoctor))['docname'];
    
  ?>

  <tr>
    <td><?php echo $row['rid']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $patientName; ?></td> 
    <td><?php echo $doctorName; ?></td>
    <td><?php echo $row['diagnostic']; ?></td>
    <td><?php echo $row['note']; ?></td>
  </tr>
  
  <?php } ?>
  
</table>
<div style="position: fixed; bottom: 20px; right: 20px;">
<a href="add-record.php"> <button class="login-btn btn-primary-soft btn btn-icon-back" style="background-color: #D8EBFA; color: #1969AA;font-weight: 500; font-size: 16px; border: none;padding: 8px 20px 8px 20px; border-radius: 5px; cursor: pointer;">
<font class="tn-in-text">Trở về</font>

</button> </a>
    </button>
</a>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>