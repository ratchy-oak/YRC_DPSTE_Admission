<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['edit_register'])) {
  $level = $_POST['level'];
  if($level != "4"){
    redirect('../register63.php?action=error5');
  }
  $title = $_POST['title'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  if (is_numeric($_POST['onet']) == true) {
    $onet = $_POST['onet'];
  } else {
    redirect('../register63.php?action=error4');
  }
  $school = $_POST['school'];
  $parent = $_POST['parent'];
  $telephone = $_POST['telephone'];
  //ทะเบียนบ้าน
  if ($_POST['address'] != "") {
    $address = $_POST['address'];
  } else {
    $address = "-";
  }
  if ($_POST['mu'] != "") {
    $mu = $_POST['mu'];
  } else {
    $mu = "-";
  }
  if ($_POST['tumbon'] != "") {
    $tumbon = $_POST['tumbon'];
  } else {
    $tumbon = "-";
  }
  if ($_POST['amphor'] != "") {
    $amphor = $_POST['amphor'];
  } else {
    $amphor = "-";
  }
  $addr = $address . "#" . $mu . "#" . $tumbon . "#" . $amphor;
  $province = $_POST['province'];

  if ($_POST['group1'] != "") {
    $group1 = $_POST['group1'];
  } else {
    redirect('../register63.php?action=error3');
  }

  if ($_POST['group2'] != "") {
    $group2 = $_POST['group2'];
  } else {
    $group2 = "0";
  }

  if ($_POST['group3'] != "") {
    $group3 = $_POST['group3'];
  } else {
    $group3 = "0";
  }

  if ($group1 == $group2) {
    redirect('../register63.php?action=error3');
  }

  if ($group1 == $group3) {
    redirect('../register63.php?action=error3');
  }

  //เช็คว่ามี การสมัครแล้วหรือยัง
  $sqlid = "select u_id, s_check from `register` where u_id = '$_SESSION[id]'";
  $resultid = mysqli_query($conn, $sqlid);
  $numid = mysqli_num_rows($resultid);
  $fetid = mysqli_fetch_array($resultid);
  $datet = date("Y-m-d");
  if ($numid == 1 and $fetid['s_check'] == "0") {
    $sql = "UPDATE `register` SET `s_title` = '$title', `s_name` = '$name', `s_surname` = '$surname', `s_onet` = '$onet', `s_school` = '$school', `s_parent` = '$parent', `s_telephone` = '$telephone', `s_address` = '$addr', `s_province` = '$province', `s_group1` = '$group1', `s_group2` = '$group2',  `s_group3` = '$group3' WHERE `u_id` = '$_SESSION[id]';";
    $result = mysqli_query($conn, $sql);
    mysqli_close($con);
    if ($result) {
      redirect('../register63.php?action=success');
    } else {
      redirect('../register63.php?action=error');
    }
  } else {
    redirect('../register63.php?action=error5');
  }
} else {
  redirect('../register63.php?action=error5');
}
