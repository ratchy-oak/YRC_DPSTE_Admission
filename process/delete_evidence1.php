<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../login.php');
  exit();
}

if (isset($_GET['delete_evidence1'])) {
  $u_id = $_SESSION['id'];
  $sqlid_re = "select s_check from `register` where u_id = '$_SESSION[id]' limit 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
if($fetid_re['s_check']!="1"){
  $query2 = "UPDATE `evidence` SET `e1` = '0' WHERE `u_id` = '$u_id';";
    $result2 = mysqli_query($conn, $query2);
    if ($result2) {
      redirect('../register66.php?action=deleteSuccess');
    } else {
      redirect('../register66.php?action=error');
    }
}else{
  redirect('../register66.php?action=error');
}
} else {
  redirect('../register66.php?action=error');
}