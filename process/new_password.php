<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['newpassword']) and $_SESSION['newpassword']) {
    $pass1 = test_input($_POST['password1']);
    $pass2 = test_input($_POST['password2']);
    if($pass1 === $pass2){
    $sql = "select u_id from `users` where u_user LIKE '$_SESSION[u_newpassword]'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    //$enpass= MD5($pass1);
    if ($num != 0) {
        $sql2 = "UPDATE `users` SET `u_pass` = '$pass1' WHERE `u_user` LIKE '$_SESSION[u_newpassword]';";
        $result2 = mysqli_query($conn, $sql2);
        if ($result) {
        redirect('../login.php?action=new-password-success');
        }else{
          redirect('../forgot-password.php?action=error1');
        }
    } else {
        redirect('../forgot-password.php?action=error');
    }
  }else{
    redirect('../new-password.php?action=error4');
  }
} else {
  redirect('../forgot-password.php?action=error1');
}