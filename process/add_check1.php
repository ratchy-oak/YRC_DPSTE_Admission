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
    $sqlid_c = "SELECT r_number FROM room";
    $resultid_c = mysqli_query($conn, $sqlid_c);
    $num_c = mysqli_num_rows($resultid_c);
    // $sqlid_c = "SELECT r_number, u_id FROM room WHERE u_id = '$u_id'";
    // $resultid_c = mysqli_query($conn, $sqlid_c);
    // $fetid_c = mysqli_fetch_array($resultid_c);
    // $num_c = mysqli_num_rows($resultid_c);
    if ($num_c == 0) {
      // check 1
      $idstudent = '66050001';
      $sql_r = "INSERT INTO `room` (`r_id`, `r_number`, `u_id`, `r_date`) VALUES (NULL, '$idstudent', '$u_id', current_timestamp());
      ";
      $result_r = mysqli_query($conn, $sql_r);
      $sql_s = "UPDATE `register` SET `s_check` = '1', idregister = '$idstudent', updated = '$datet' WHERE `u_id` = '$u_id' LIMIT 1;";
      $result_s = mysqli_query($conn, $sql_s);
      if ($result_s) {
        redirect("../check-data-m4.php?action=success&s_id=$u_id");
      } else {
        redirect("../check-data-m4.php?action=error&s_id=$u_id");
      }
    } else {
      $sqlid_c = "SELECT r_number, u_id FROM room WHERE u_id = '$u_id'";
      $resultid_c = mysqli_query($conn, $sqlid_c);
      $fetid_c = mysqli_fetch_array($resultid_c);
      $num_c = mysqli_num_rows($resultid_c);


      if ($num_c == 0) {
        $sqlid_c2 = "SELECT r_number FROM room WHERE u_id = '0' ORDER BY r_number ASC LIMIT 1";
        $resultid_c2 = mysqli_query($conn, $sqlid_c2);
        $fetid_c2 = mysqli_fetch_array($resultid_c2);
        $num_c2 = mysqli_num_rows($resultid_c2);
        if ($num_c2 == 0) {
          $sqlid_c3 = "SELECT r_number FROM room ORDER BY r_number DESC";
          $resultid_c3 = mysqli_query($conn, $sqlid_c3);
          $fetid_c3 = mysqli_fetch_array($resultid_c3);
          $idstudent = $fetid_c3['r_number'] + 1;
          $sql_r = "INSERT INTO `room` (`r_id`, `r_number`, `u_id`, `r_date`) VALUES (NULL, '$idstudent', '$u_id', current_timestamp());
          ";
          $result_r = mysqli_query($conn, $sql_r);
          //$idstudent = 66050001;
        } else {
          $idstudent = $fetid_c2['r_number'];
        }
      }

      $sql_s = "UPDATE `register` SET `s_check` = '1', idregister = '$idstudent', updated = '$datet' WHERE `u_id` = '$u_id' LIMIT 1;";
      $result_s = mysqli_query($conn, $sql_s);
      if ($result_s) {
        redirect("../check-data-m4.php?action=success&s_id=$u_id");
      } else {
        redirect("../check-data-m4.php?action=error&s_id=$u_id");
      }
    }
  } elseif ($fetid_re['s_check'] == "1") {
    $sql_s = "UPDATE `register` SET `s_check` = '0', idregister = '0' WHERE `u_id` = '$u_id' LIMIT 1;";
    $result_s = mysqli_query($conn, $sql_s);

    $sql_s = "UPDATE `room` SET `u_id` = '0' WHERE `u_id` = '$u_id' LIMIT 1;";
    $result_s = mysqli_query($conn, $sql_s);

    // $sql_s2 = "DELETE FROM `room` WHERE `u_id` = '$u_id' limit 1;";
    // $result_s2 = mysqli_query($conn, $sql_s2);

    if ($result_s) {
      redirect("../check-data-m4.php?action=success&s_id=$u_id");
    } else {
      redirect("../check-data-m4.php?action=error&s_id=$u_id");
    }
  }
} else {
  redirect("../check-data-m4.php?action=error&s_id=$u_id");
}
