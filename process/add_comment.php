<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: ../login.php');
  exit();
}

if (isset($_POST['add_comment'])) {
  $u_id = $_POST['u_id'];
  $sid = $_POST['s_id'];
  if($_POST['content']!=""){
    $content = strip_tags($_POST['content']);
  }else{
    $content = "0";
  }
  $strSQL = "UPDATE `evidence` SET `comment` = '$content' WHERE `u_id` = '$u_id';";
  $objQuery = mysqli_query($conn, $strSQL);
  if ($objQuery) {
    redirect("../check-data-m1.php?action=success&s_id=$sid");
  } else {
    redirect("../check-data-m1.php?action=error&s_id=$sid");
  }
} else {
  redirect("../check-data-m1.php?action=error&s_id=$sid");
}
