<?php
// Kết nối CSDL
$conn = mysqli_connect("localhost","root","", "doctorbooking");

// Lấy ID bệnh nhân
if(isset($_GET['pid'])) {
  $pid = $_GET['pid'];
} else {
  $pid = 1; // giả sử pid = 1  
}

// Truy vấn bệnh án 
$sql = "SELECT * FROM record WHERE pid = $pid";

$result = mysqli_query($conn, $sql);

?>See details

<!DOCTYPE html>See details
<html>
<head>
  <title>Xem bệnh án</title>
  
  <style>

body {
  font-family: 'Arial', sans-serif;
  color: #444;
}

h2 {
  font-size: 45px;
  text-transform: uppercase;
  text-align: center;
  color: #046AB4;
}

table {
  border: 1px solid #046AB4;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
  width: 75%;
  margin: 30px auto;
}

th {
  background-color: #046AB4;
  color: #fff;
  padding: 8px 12px;
  text-transform: uppercase;
}  

td {
  padding: 8px 12px;
  text-align: center;
  border-right: 1px solid #ddd;
}

tr:nth-child(even) {
  background-color: #f3f3f3;
}

</style>

</head>

<body>

  <h2>HỒ SƠ BỆNH ÁN</h2>

  <table>
    <tr>
      <th>Ngày khám</th>
      <th>Bác sĩ</th>
      <th>Chuẩn đoán</th>
      <th>Ghi chú</th>
    </tr>
    
    <?php while($row = mysqli_fetch_assoc($result)) {

      // Lấy tên bác sĩ
      $doc_id = $row['docid'];
      $sql2 = "SELECT docname FROM doctor WHERE docid = $doc_id";
      $result2 = mysqli_query($conn, $sql2);
      $doctor = mysqli_fetch_assoc($result2)['docname'];

      // Hiển thị kết quả
      echo "<tr>";
      echo "<td>{$row['date']}</td>";
      echo "<td>$doctor</td>";
      echo "<td>{$row['diagnostic']}</td>";
      echo "<td>{$row['note']}</td>";
      echo "</tr>";

    } ?>
  
  </table>

</body>
</html>

<?php

mysqli_close($conn);

?>