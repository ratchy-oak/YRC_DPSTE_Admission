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
  $sqlid_re = "select * from `register` where u_id = '$u_id' LIMIT 1";
  $resultid_re = mysqli_query($conn, $sqlid_re);
  $fetid_re = mysqli_fetch_array($resultid_re);
  $datet = date("Y-m-d H:i:s");
  if ($fetid_re['s_check'] == "0") {

    $sqlid_c = "SELECT r_number FROM room ORDER BY r_number DESC";
    $resultid_c = mysqli_query($conn, $sqlid_c);
    $fetid_c = mysqli_fetch_array($resultid_c);
    $num_c = mysqli_num_rows($resultid_c);
    if ($num_c == 0) {
      $idstudent = 66050001;
    } else {
      $idstudent = $fetid_c['r_number'] + 1;
    }

    $sql_r = "INSERT INTO `room` (`r_id`, `r_number`, `u_id`, `r_date`) VALUES (NULL, '$idstudent', '$u_id', current_timestamp());
    ";
    $result_r = mysqli_query($conn, $sql_r);

    $sql_s = "UPDATE `register` SET `s_check` = '1', idregister = '$idstudent' WHERE `u_id` = '$u_id' LIMIT 1;";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      redirect("../check-data-m4.php?action=success&s_id=$u_id");
    } else {
      redirect("../check-data-m4.php?action=error&s_id=$u_id");
    }
  } elseif ($fetid_re['s_check'] == "1") {
    $sql_s = "UPDATE `register` SET `s_check` = '0', idregister = '0' WHERE `u_id` = '$u_id' LIMIT 1;";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      redirect("../check-data-m4.php?action=success&s_id=$u_id");
    } else {
      redirect("../check-data-m4.php?action=error&s_id=$u_id");
    }
  }
} else {
  redirect("../check-data-m4.php?action=error&s_id=$u_id");
}
