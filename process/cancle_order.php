<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: login.php');
  exit();
}

if (isset($_GET['order'])) {
  $b_id = test_input($_GET['id']);
  $u_id = test_input($_GET['u_id']);
  $level_c = test_input($_GET['level']);
  $sqlid_buy = "select c_id, status from `buy_register` where b_id = '$b_id'";
  $resultid_buy = mysqli_query($conn, $sqlid_buy);
  $num_buy_register = mysqli_num_rows($resultid_buy);
  $fet_buy_register = mysqli_fetch_array($resultid_buy);
  $date = date("Y-m-d");
  if ($num_buy_register != 0 and $fet_buy_register['status'] == "2") {
    $code_g = "YRC" . password_generate(9) . $level_c;
    $sql = "UPDATE `buy_register` SET `c_id` = '0', `status` = '1' WHERE `b_id` = '$b_id';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $sql2 = "DELETE FROM `code_register` WHERE `u_id` = '$u_id' ";
      $result2 = mysqli_query($conn, $sql2);
      redirect('../manage-confirm.php?action2=success');
    } else {
      redirect('../manage-confirm.php?action2=error');
    }
  } else {
    redirect('../manage-confirm.php?action2=error');
  }
} else {
  redirect('../manage-confirm.php?action2=error');
}
