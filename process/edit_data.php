<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission']!='2') {
  header('Location: ../login.php');
  exit();
}

if (isset($_GET['edit-user'])) {
    $data1 = test_input($_GET['u_id']);
  
    $u_permission = $_SESSION['permission'];
    if($u_permission == '2')
    {
      $sql = "UPDATE `users` SET `u_approve` = '0' WHERE `u_id` = '$data1';";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        redirect('../manage-user.php?action2=success');
      } else {
        redirect('../manage-user.php?action2=error');
      }
    }else{
      redirect('../manage-user.php?action2=error');
    }
  }

  
if (isset($_GET['approve'])) {
  $data1 = test_input($_GET['u_id']);
  
  $u_permission = $_SESSION['permission'];
  if($u_permission == '2')
    {
      $sql = "UPDATE `users` SET `u_approve` = '1' WHERE `u_id` = '$data1';";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        redirect('../manage-user.php?action2=success');
      } else {
        redirect('../manage-user.php?action2=error');
      }
    }else{
      redirect('../manage-user.php?action2=error');
    }
  
  }

  if (isset($_GET['edit-register'])) {
    $data1 = test_input($_GET['u_id']);
    
    $u_permission = $_SESSION['permission'];
    if($u_permission == '2')
      {
        $sql = "UPDATE `users` SET `u_register` = '0' WHERE `u_id` = '$data1';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          redirect('../manage-user.php?action2=success');
        } else {
          redirect('../manage-user.php?action2=error');
        }
      }else{
        redirect('../manage-user.php?action2=error');
      }
    
    }

  if (isset($_POST['edit_password'])) {
    $data1 = $_POST['uId'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $check = 1;
    if($pass==$pass2){
      $check = 1;
      $enpass = MD5($pass);
    }else{
      $check = 0;
    }
    $u_permission = explode('-', $_SESSION['permission']);
    if($u_permission[0] == '1' and $check == 1)
    {
      $sql = "UPDATE `teachers` SET `t_pass` = '$enpass' WHERE `t_id` = '$data1';";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        redirect('../manage-users.php?action2=success');
      } else {
        redirect('../manage-users.php?action2=error');
      }
    }else{
      redirect('../manage-users.php?action2=error');
    }
  
  }