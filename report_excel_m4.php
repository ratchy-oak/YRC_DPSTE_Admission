<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: login.php');
  exit();
}
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="m4-yrc.xls"'); # ชื่อไฟล์
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<HTML>

<HEAD>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
</HEAD>

<BODY>
  <TABLE x:str BORDER="1">
    <TR>
      <th>ที่</th>
      <th>เลขประจำตัว</th>
      <th>คำนำหน้า</th>
      <th>ชื่อ</th>
      <th>นามสกุล</th>
      <th>โรงเรียน</th>
      <th>ผลการเรียนเฉลี่ยรวมทุกรายวิชา</th>
      <th>ผลการเรียนเฉลี่ยวิชาคณิตศาสตร์พื้นฐาน</th>
      <th>ผลการเรียนเฉลี่ยวิชาวิทยาศาสตร์และเทคโนโลยีพื้นฐาน</th>
      <th>ผลการเรียนเฉลี่ยวิชาอังกฤษพื้นฐาน</th>
      <th>เบอร์โทร</th>
      <th>ที่อยู่</th>
      <th>อำเภอ</th>
      <th>จังหวัด</th>
      <th>รหัสไปรษณีย์</th>
      <th>email</th>
      <th>สถานะตรวจหลักฐานปกติ</th>
      <th>comment</th>
      <th>วันที่สมัคร</th>
    </TR>
    <TR>
      <?php
      $sqlid = "select * from `register` order by id asc";
      $resultid = mysqli_query($conn, $sqlid);
      $i = 0;
      while ($fet1 = mysqli_fetch_array($resultid)) {
        $i++;
        $date_digit = convert_date_func($fet1['updated'], "digit", "datetime");
      ?>
        <TD align="center"><?php echo $i; ?></TD>
        <TD align="center"><?php echo $fet1['idregister']; ?></TD>
        <TD align="center"><?php echo $fet1['title']; ?></TD>
        <TD align="center"><?php echo $fet1['name']; ?></TD>
        <TD align="center"><?php echo $fet1['surname']; ?></TD>
        <TD align="center"><?php echo $fet1['school']; ?></TD>
        <TD align="center"><?php echo $fet1['grade1']; ?></TD>
        <TD align="center"><?php echo $fet1['grade2']; ?></TD>
        <TD align="center"><?php echo $fet1['grade3']; ?></TD>
        <TD align="center"><?php echo $fet1['grade4']; ?></TD>
        <TD align="center"><?php echo $fet1['telephone']; ?></TD>
        <TD align="center"><?php echo "บ้านเลขที่ " . $fet1['address'] . "  หมู่ที่ " . $fet1['mu'] . "   ตำบล " . $fet1['tumbon']; ?></TD>
        <TD align="center"><?php echo $fet1['amphor']; ?></TD>
        <TD align="center"><?php echo $fet1['province']; ?></TD>
        <TD align="center"><?php echo $fet1['zipcode']; ?></TD>
        <TD align="center"><?php echo $fet1['email']; ?></TD>
        <TD align="center"><?php echo ($fet1['s_check'] == "0") ? "คุณสมบัติยังไม่ครบ" : "คุณสมบัติครบถ้วน"; ?></TD>
        <TD align="center"><?php echo $fet1['comment']; ?></TD>
        <TD align="center"><?php echo $date_digit; ?></TD>
    </TR>
  <?php
      }
  ?>
  </TABLE>
</BODY>

</HTML>