<?php
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="Result_Loga_Survey.xls"');
echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">';

//ทำการดึงข้อมูลจาก Database
//Connect DB
include('configdb.php');
if ($conn->connect_errno) {
  die("Failed to connect to MySQL : (" . $conn->connect_errno . ") " . $conn->connect_error);
}
$conn->set_charset("utf8");
$query = " SELECT * FROM answers order by id desc ";
$res = $conn->query($query);
echo '<table style="width:100%" x:str>';
echo '  <tr>
        <td>ID</td>
        <td>เวลาที่กรอกข้อมูล</td>
        <td>Q1</td>
        <td>รายละเอียดข้อ 1</td>
        <td>Q2 </td>
        <td>Q3</td>
        <td>รายละเอียดข้อ 3</td>
        <td>Q4</td>
        <td>รายละเอียดข้อ 4</td>
        <td>Q5</td>
        <td>Q6</td>
        <td>รายละเอียดข้อ 6</td>
        <td>Q7</td>
        <td>Q8</td>
        <td>รายละเอียดข้อ 8</td>
        <td>Q9</td>
        <td>รายละเอียดข้อ 9</td>
        <td>Q10</td>
        <td>Email</td>
        <td>Telephone</td>
        </tr>';
while ($row = $res->fetch_array()) {
  echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['user_time'] . '</td>
                <td>' . $row['q1'] . '</td>
                <td>' . $row['detail_q1'] . '</td>
                <td>' . $row['q2'] . '</td>
                <td>' . $row['q3'] . '</td>
                <td>' . $row['detail_q3'] . '</td>
                <td>' . $row['q4'] . '</td>
                <td>' . $row['detail_q4'] . '</td>
                <td>' . $row['q5'] . '</td>
                <td>' . $row['q6'] . '</td>
                <td>' . $row['detail_q6'] . '</td>
                <td>' . $row['q7'] . '</td>
                <td>' . $row['q8'] . '</td>
                <td>' . $row['detail_q8'] . '</td>
                <td>' . $row['q9'] . '</td>
                <td>' . $row['detail_q9'] . '</td>
                <td>' . $row['q10'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['telephone'] . '</td>
            </tr>';
}
echo '</table>';
