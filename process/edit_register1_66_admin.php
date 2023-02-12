<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: ../login.php');
  exit();
}

if (isset($_POST['edit_register4a'])) {
  $s_id = $_POST['s_id'];
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
    redirect('../manage-m1.php?action=error3');
  }

  if ($_POST['group2'] != "") {
    $group2 = $_POST['group2'];
  } else {
    $group2 = "0";
  }

  if ($group1 == $group2) {
    redirect('../manage-m1.php?action=error3');
  }

  //เช็คว่ามี การสมัครแล้วหรือยัง
  $sqlid = "select u_id, s_check from `register` where u_id = '$s_id'";
  $resultid = mysqli_query($conn, $sqlid);
  $numid = mysqli_num_rows($resultid);
  $fetid = mysqli_fetch_array($resultid);
  $datet = date("Y-m-d");
  if ($numid == 1 and $fetid['s_check'] == "0") {
    $sql = "UPDATE 
    `register` 
    SET 
    `idregister` = '$idre', 
    `title` = '$title', 
    `name` = '$name', 
    `surname` = '$surname', 
    `school` = '$school', 
    `telephone` = '$telephone', 
    `parent` = '$parent', 
    `telephone2` = '$telephone2', 
    `address` = '$address', 
    `mu` = '$mu', 
    `tumbon` = '$tumbon', 
    `amphor` = '$amphor', 
    `province` = '$province', 
    `grade1` = '$grade1', 
    `grade2` = '$grade2', 
    `grade3` = '$grade3', 
    `group1` = '$group1', 
    `group2` = '$group2'
    WHERE `u_id` = '$s_id';";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if ($result) {
      redirect('../manage-m1.php?action2=success');
    } else {
      redirect('../manage-m1.php?action2=error');
    }
  } else {
    redirect('../manage-m1.php?action2=error5');
  }
} else {
  redirect('../manage-m1.php?action2=error5');
}
