<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}

if (isset($_GET['level'])) {
  $level = test_input($_GET['level']);
  $type = test_input($_GET['type']);
  if ($level == "1" or $level == "4") {
    $sqlid_buy = "select b_id from `buy_register` where u_id = '$_SESSION[id]' limit 1";
    $resultid_buy = mysqli_query($conn, $sqlid_buy);
    $num_buy_register = mysqli_num_rows($resultid_buy);
    $date = date("Y-m-d H:i:s");
    if ($num_buy_register == "") {
      $sql = "INSERT INTO `buy_register` (`b_id`, `u_id`, `level`, `date`, `c_id`, `s_name`, `b_name`, `b_bank`, `b_date`, `b_time`, `b_type`, `b_file`, `status`) VALUES (NULL, '$_SESSION[id]', '$level', '$date', 0, NULL, NULL, NULL, NULL, NULL, '$type', NULL, '0');";
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
} else {
  redirect('../buy-register.php?action2=error');
}
