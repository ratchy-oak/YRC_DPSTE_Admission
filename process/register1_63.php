<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['add_register'])) {
  $level = $_POST['level'];
  $title = $_POST['title'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  if (is_numeric($_POST['onet']) == true) {
    $onet = $_POST['onet'];
  } else {
    redirect('../register-student1-63.php?action=error4');
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
    redirect('../register-student1-63.php?action=error3');
  }

  if ($_POST['group2'] != "") {
    $group2 = $_POST['group2'];
  } else {
    $group2 = "0";
  }

  if ($group1 == $group2) {
    redirect('../register-student1-63.php?action=error3');
  }

  if ($_POST['special'] != "") {
    $special = $_POST['special'];
  } else {
    $special = "0";
  }

  //เช็คว่ามี การสมัครแล้วหรือยัง
  $sqlid = "select u_id from `register` where u_id = '$_SESSION[id]'";
  $resultid = mysqli_query($conn, $sqlid);
  $numid = mysqli_num_rows($resultid);
  //เช็คว่ามี code ไหม
  $sql_code = "select c_id, level from code_register where u_id = '$_SESSION[id]' ";
  $result_code = mysqli_query($conn, $sql_code);
  $num_code = mysqli_num_rows($result_code);
  $fet_code = mysqli_fetch_array($result_code);
  if ($num_code != 0) {
    $type = "1";
    if ($fet_code['level'] != $level) {
      redirect('../register-student1-63.php?action=error5');
    }
  } else {
    $type = "2";
  }
  $datet = date("Y-m-d");
  if ($numid == 0) {
    $sql = "INSERT INTO `register` (`s_id`, `u_id`, `s_title`, `s_name`, `s_surname`, `s_level`, `s_onet`, `s_school`, `s_parent`, `s_telephone`, `s_address`, `s_province`, `s_group1`, `s_group2`, `s_group3`, `s_special`, `s_check`, `s_checkspecial`, `s_type`, `s_area`, `s_date`) VALUES (NULL, '$_SESSION[id]', '$title', '$name', '$surname', '$level', '$onet', '$school', '$parent', '$telephone', '$addr', '$province', '$group1', '$group2', '0', '$special', '0', '0', '$type', '0', '$datet');";
    $result = mysqli_query($conn, $sql);
    $sql2 = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
    $query = mysqli_query($conn, $sql2);
    mysqli_close($con);
    if ($result) {
      redirect('../register63.php?action=success');
    } else {
      redirect('../register-student1-63.php?action=error');
    }
  } else {
    redirect('../register-student1-63.php?action=error2');
  }
} else {
  redirect('../register-student1-63.php?action=error5');
}
