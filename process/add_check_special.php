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
$ids = $_POST['ids'];
$sqlid_re = "select * from `register` where s_id = '$sid' and s_level ='1' LIMIT 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
$sqlide = "select * from `evidence` where u_id='$u_id' LIMIT 1";
$resultide = mysqli_query($conn, $sqlide);
$fetide = mysqli_fetch_array($resultide);
if($fetid_re['s_checkspecial'] == "0"){
    $sql_s = "UPDATE `register` SET `s_checkspecial` = '1' WHERE `s_id` = '$fetid_re[s_id]';";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      redirect("../check-data-m1-special1.php?action=success&s_id=$sid&ids=$ids");
    } else {
      redirect("../check-data-m1-special1.php?action=error&s_id=$sid&ids=$ids");
    }
  } elseif ($fetid_re['s_checkspecial'] == "1") {
    $sql_s = "UPDATE `register` SET `s_checkspecial` = '0' WHERE `s_id` = '$fetid_re[s_id]';";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      redirect("../check-data-m1-special1.php?action=success&s_id=$sid&ids=$ids");
    } else {
      redirect("../check-data-m1-special1.php?action=error&s_id=$sid&ids=$ids");
    }
  }
} else {
  redirect("../check-data-m1-special1.php?action=error&s_id=$sid&ids=$ids");
}
