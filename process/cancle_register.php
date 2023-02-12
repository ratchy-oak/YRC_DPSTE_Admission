<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}

if (isset($_GET['cancle'])) {
  $cancle = test_input($_GET['cancle']);
  $sqlid_buy = "select c_id, status from `buy_register` where u_id = '$_SESSION[id]'";
  $resultid_buy = mysqli_query($conn, $sqlid_buy);
  $fet_buy_register = mysqli_fetch_array($resultid_buy);
  $date = date("Y-m-d H:i:s");
  if ($fet_buy_register['c_id'] == "" or $fet_buy_register['status'] == "0" or $fet_buy_register['status'] == "1") {
    $sql = "DELETE FROM `buy_register` WHERE `u_id` = '$_SESSION[id]' limit 1";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      redirect('../buy-register.php?action2=success');
    } else {
      redirect('../buy-register.php?action2=error');
    }
  } else {
    redirect('../buy-register.php?action2=error2');
  }
} else {
  redirect('../buy-register.php?action2=error');
}
