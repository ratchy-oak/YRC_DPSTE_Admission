<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: ../login.php');
  exit();
}

if (isset($_POST['add_check'])) {
$sid = $_POST['s_id'];
$u_id = $_POST['u_id'];
$area = $_POST['area'];
$sqlid_re = "select * from `register` where s_id = '$sid' and s_level ='1' LIMIT 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
$sqlide = "select * from `evidence` where u_id='$u_id' LIMIT 1";
$resultide = mysqli_query($conn, $sqlide);
$fetide = mysqli_fetch_array($resultide);
$sql_a = "UPDATE `register` SET `s_area` = '$area' WHERE `s_id` = '$fetid_re[s_id]' and u_id = '$u_id';";
$result_a = mysqli_query($conn, $sql_a);
		$datet=date("Y-m-d");
if($fetid_re['s_check'] == "0"){
    $sql_s = "UPDATE `register` SET `s_check` = '1' WHERE `s_id` = '$fetid_re[s_id]';";
    $result_s = mysqli_query($conn, $sql_s);
	$sql_e = "UPDATE `evidence` SET `e_date` = '$datet' WHERE `u_id` = '$u_id';";
    $result_e = mysqli_query($conn, $sql_e);
    if ($result_s) {
      redirect("../check-data-m1.php?action=success&s_id=$sid");
    } else {
      redirect("../check-data-m1.php?action=error&s_id=$sid");
    }
  } elseif ($fetid_re['s_check'] == "1") {
    $sql_s = "UPDATE `register` SET `s_check` = '0' WHERE `s_id` = '$fetid_re[s_id]';";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      redirect("../check-data-m1.php?action=success&s_id=$sid");
    } else {
      redirect("../check-data-m1.php?action=error&s_id=$sid");
    }
  }
} else {
  redirect("../check-data-m1.php?action=error&s_id=$sid");
}
