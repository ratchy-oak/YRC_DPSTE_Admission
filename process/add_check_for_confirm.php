<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: ../login.php');
  exit();
}

if (isset($_POST['add_check1'])) {
//$sid = $_POST['s_id'];
$u_id = $_POST['u_id'];
$sqlid_re = "select * from `report` where u_id = '$u_id' LIMIT 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
$datet=date("Y-m-d H:i:s");
if($fetid_re['re_check'] == "0"){
    $sql_s = "UPDATE `report` SET `re_check` = '1' WHERE `u_id` = '$u_id';";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      flash('Message', 'บันทึกข้อมูลเรียบร้อย', 'alert alert-success');
      redirect("../check-data-confirm-m1.php?s_id=$u_id");
    } else {
      flash('Message', 'ไม่สามารถบันทึกข้อมูลได้', 'alert alert-danger');
      redirect("../check-data-confirm-m1.php?s_id=$u_id");
    }
  } elseif ($fetid_re['re_check'] == "1") {
    $sql_s = "UPDATE `report` SET `re_check` = '0' WHERE `u_id` = '$u_id';";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      flash('Message', 'บันทึกข้อมูลเรียบร้อย', 'alert alert-success');
      redirect("../check-data-confirm-m1.php?s_id=$u_id");
    } else {
      flash('Message', 'ไม่สามารถบันทึกข้อมูลได้', 'alert alert-danger');
      redirect("../check-data-confirm-m1.php?s_id=$u_id");
    }
  }
}

if (isset($_POST['add_check4'])) {
  //$sid = $_POST['s_id'];
  $u_id = $_POST['u_id'];
  $sqlid_re = "select * from `report` where u_id = '$u_id' LIMIT 1";
  $resultid_re = mysqli_query($conn, $sqlid_re);
  $fetid_re = mysqli_fetch_array($resultid_re);
  $datet=date("Y-m-d H:i:s");
  if($fetid_re['re_check'] == "0"){
      $sql_s = "UPDATE `report` SET `re_check` = '1' WHERE `u_id` = '$u_id';";
      $result_s = mysqli_query($conn, $sql_s);
      if ($result_s) {
        flash('Message', 'บันทึกข้อมูลเรียบร้อย', 'alert alert-success');
        redirect("../check-data-confirm-m4.php?s_id=$u_id");
      } else {
        flash('Message', 'ไม่สามารถบันทึกข้อมูลได้', 'alert alert-danger');
        redirect("../check-data-confirm-m4.php?s_id=$u_id");
      }
    } elseif ($fetid_re['re_check'] == "1") {
      $sql_s = "UPDATE `report` SET `re_check` = '0' WHERE `u_id` = '$u_id';";
      $result_s = mysqli_query($conn, $sql_s);
      if ($result_s) {
        flash('Message', 'บันทึกข้อมูลเรียบร้อย', 'alert alert-success');
        redirect("../check-data-confirm-m4.php?s_id=$u_id");
      } else {
        flash('Message', 'ไม่สามารถบันทึกข้อมูลได้', 'alert alert-danger');
        redirect("../check-data-confirm-m4.php?s_id=$u_id");
      }
    }
  }
