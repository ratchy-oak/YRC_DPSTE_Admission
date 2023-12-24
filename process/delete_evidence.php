<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../login.php');
  exit();
}

if (isset($_GET['delete_evidence'])) {
  $member_final = "";
  $u_id = $_SESSION['id'];
  $e = "e".$_GET['e'];
  $k_id = $_GET['k'];
  $sqlid_re = "select s_check from `register` where u_id = '$_SESSION[id]' limit 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
if($fetid_re['s_check']!="1"){
  $sqlid = "select $e from evidence where u_id = '$u_id'";
  $result = mysqli_query($conn, $sqlid);
  $fetid = mysqli_fetch_array($result);
  $member = explode("#", $fetid[0]);
  unset($member[$k_id]);
  $member_reindex = array_values($member);
  if ($member_reindex[0] != "") {
      foreach ($member_reindex as $key => $member_f) {
          if ($member_f) {
              $member_final .= $member_f . "#";
          }
      }
      $query2 = "UPDATE `evidence` SET `$e` = '$member_final' WHERE `u_id` = '$u_id';";
      $result2 = mysqli_query($conn, $query2);
    if ($result2) {
      redirect('../register66.php?action=deleteSuccess');
    } else {
      redirect('../register66.php?action=error');
    }
  } else {
    $query3 = "UPDATE `evidence` SET `$e` = '0' WHERE `u_id` = '$u_id';";
      $result3 = mysqli_query($conn, $query3);
      if ($result3) {
        redirect('../register66.php?action=deleteSuccess');
    } else {
      redirect('../register66.php?action=error');
    }
  }
}else{
  redirect('../register66.php?action=error');
}
} else {
  redirect('../register66.php?action=error');
}