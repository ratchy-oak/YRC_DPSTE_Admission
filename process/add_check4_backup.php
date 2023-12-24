<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: ../login.php');
  exit();
}

$sid = $_GET['s_id'];
$sqlid_re = "select * from `register` where s_id = '$sid' and s_level ='4' LIMIT 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
$sqlide = "select * from `evidence` where u_id='$fetid_re[u_id]' LIMIT 1";
$resultide = mysqli_query($conn, $sqlide);
$fetide = mysqli_fetch_array($resultide);
if (isset($_GET['action'])) {
  if ($_GET['action'] == "success") {
    $sql_s = "UPDATE `register` SET `s_check` = '1' WHERE `s_id` = '$fetid_re[s_id]';";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      redirect("../check-data-m4.php?action=success&s_id=$sid");
    } else {
      redirect("../check-data-m4.php?action=error&s_id=$sid");
    }
  } elseif ($_GET['action'] == "unsuccess") {
    $sql_s = "UPDATE `register` SET `s_check` = '0' WHERE `s_id` = '$fetid_re[s_id]';";
    $result_s = mysqli_query($conn, $sql_s);
    if ($result_s) {
      redirect("../check-data-m4.php?action=success&s_id=$sid");
    } else {
      redirect("../check-data-m4.php?action=error&s_id=$sid");
    }
  }
} else {
  redirect("../check-data-m4.php?action=error&s_id=$sid");
}
