<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}

if (isset($_GET['cancle'])) {
  $cancle = test_input($_GET['cancle']);
  $sqlid_register = "select s_id, s_check from `register` where u_id = '$_SESSION[id]'";
  $resultid_register = mysqli_query($conn, $sqlid_register);
  $fet_register = mysqli_fetch_array($resultid_register);
  if ($fet_register['s_check'] == 0) {
    $sql = "DELETE FROM `register` WHERE `u_id` = '$_SESSION[id]' limit 1";
    $result = mysqli_query($conn, $sql);
    $sql2 = "DELETE FROM `evidence` WHERE `u_id` = '$_SESSION[id]' limit 1";
    $result2 = mysqli_query($conn, $sql2);
    mysqli_close($con);
    if ($result) {
      redirect('../register-student4-65.php?action=success2');
    } else {
      redirect('../register65.php?action=error5');
    }
  } else {
    redirect('../register65.php?action=error5');
  }
} else {
  redirect('../register65.php?action=error5');
}
