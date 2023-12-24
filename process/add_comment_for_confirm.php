<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: ../login.php');
  exit();
}

if (isset($_POST['add_comment1'])) {
  $u_id = $_POST['u_id'];
  if($_POST['content']!=""){
    $content = strip_tags($_POST['content']);
  }else{
    $content = "";
  }
  $strSQL = "UPDATE `report` SET `re_comment` = '$content' WHERE `u_id` = '$u_id';";
  $objQuery = mysqli_query($conn, $strSQL);
  if ($objQuery) {
    flash('Message', 'บันทึกข้อมูลเรียบร้อย', 'alert alert-success');
      redirect("../check-data-confirm-m1.php?s_id=$u_id");
  } else {
    flash('Message', 'ไม่สามารถบันทึกข้อมูลได้', 'alert alert-danger');
      redirect("../check-data-confirm-m1.php?s_id=$u_id");
  }
}

if (isset($_POST['add_comment4'])) {
  $u_id = $_POST['u_id'];
  if($_POST['content']!=""){
    $content = strip_tags($_POST['content']);
  }else{
    $content = "";
  }
  $strSQL = "UPDATE `report` SET `re_comment` = '$content' WHERE `u_id` = '$u_id';";
  $objQuery = mysqli_query($conn, $strSQL);
  if ($objQuery) {
    flash('Message', 'บันทึกข้อมูลเรียบร้อย', 'alert alert-success');
      redirect("../check-data-confirm-m4.php?s_id=$u_id");
  } else {
    flash('Message', 'ไม่สามารถบันทึกข้อมูลได้', 'alert alert-danger');
      redirect("../check-data-confirm-m4.php?s_id=$u_id");
  }
}
