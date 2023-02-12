<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['add_register'])) {
  $idre = $_POST['idregister'];
  $title = $_POST['title']; //คำนำหน้าชื่อ
  $name = $_POST['name']; //ชื่อ
  $surname = $_POST['surname']; //นามสกุล
  $school = $_POST['school'];
  if($_POST['telephone'] != ""){
    $telephone = $_POST['telephone'];
  }else{
    $telephone = "-";
  }
  $parent = $_POST['parent']; //ชื่อ
  $telephone2 = $_POST['telephone2']; //โทรศัพท์มือถือ

  if($_POST['address'] != ""){
    $address = $_POST['address'];
  }else{
    $address = "-";
  }
  if($_POST['mu'] != ""){
    $mu = $_POST['mu'];
  }else{
    $mu = "-";
  }

  if($_POST['tumbon'] != ""){
    $tumbon = $_POST['tumbon'];
  }else{
    $tumbon = "-";
  }
  if($_POST['amphor'] != ""){
    $amphor = $_POST['amphor'];
  }else{
    $amphor = "-";
  }
  $province = $_POST['province'];

  $grade1 = $_POST['grade1'];
  $grade2 = $_POST['grade2'];
  $grade3 = $_POST['grade3'];

  if ($_POST['group1'] != "") {
    $group1 = $_POST['group1'];
  } else {
    redirect('../register-student4-66.php?action=error3');
  }

  if ($_POST['group2'] != "") {
    $group2 = $_POST['group2'];
  } else {
    $group2 = "0";
  }

  if ($group1 == $group2) {
    redirect('../register-student4-66.php?action=error3');
  }

  //เช็คว่ามี การสมัครแล้วหรือยัง
  $sqlid = "select u_id from `register` where u_id = '$_SESSION[id]' and idregister = '$idre'";
  $resultid = mysqli_query($conn, $sqlid);
  $numid = mysqli_num_rows($resultid);

  if ($numid == 0) {
    $sql = "INSERT INTO `register` 
    (`id`, 
    `u_id`, 
    `idregister`, 
    `title`, 
    `name`, 
    `surname`, 
    `school`, 
    `telephone`, 
    `parent`, 
    `telephone2`, 
    `address`, 
    `mu`, 
    `tumbon`, 
    `amphor`, 
    `province`, 
    `grade1`, 
    `grade2`, 
    `grade3`, 
    `group1`, 
    `group2`,  
    `s_check`, 
    `updated`) 
    VALUES 
    (NULL, 
    '$_SESSION[id]',
    '$idre',
    '$title',     
    '$name',  
    '$surname', 
    '$school', 
    '$telephone', 
    '$parent', 
    '$telephone2', 
    '$address', 
    '$mu', 
    '$tumbon', 
    '$amphor', 
    '$province', 
    '$grade1', 
    '$grade2', 
    '$grade3',  
    '$group1', 
    '$group2',  
    '0', 
    current_timestamp());";
    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO `evidence` 
    (`e_id`, 
    `u_id`, 
    `e1`, 
    `e2`, 
    `e3`, 
    `e4`, 
    `e5`, 
    `e6`, 
    `s1`, 
    `s1text`, 
    `s2`, 
    `s2text`, 
    `s3`, 
    `s3text`, 
    `s4`, 
    `s4text`, 
    `s5`, 
    `s5text`, 
    `comment`, 
    `comment_special`, 
    `e_date`) VALUES 
    (NULL, 
    '$_SESSION[id]', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    '0', 
    current_timestamp());";
    $query = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if ($result) {
      redirect('../register66.php?action=success');
    } else {
      redirect('../register-student1-66.php?action=error');
    }
  } else {
    redirect('../register-student1-66.php?action=error2');
  }
} else {
  redirect('../register-student1-66.php?action=error5');
}
