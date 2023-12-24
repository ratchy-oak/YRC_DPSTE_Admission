<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['add_users'])) {
  //เช็คว่า username ว่างหรือไม่
  //$pattern = "/^[A-Za-z0-9]{5,20}$/";
  if(empty($_POST['username'])){
      redirect('../register.php?action=error1');
  }else{
    $username = test_input($_POST['username']);
    //เช็คความยาว username < 5
    // if (strlen($username) < 5) {
    //   redirect('../register.php?action=error2');
    // }
    // if(!preg_match($pattern, $username)){
    //   redirect('../register.php?action=error2');
    // }
  }

  if(empty($_POST['password'])){
    redirect('../register.php?action=error');
  }else{
    $password = test_input($_POST['password']);
  }

  if(empty($_POST['repassword'])){
    redirect('../register.php?action=error');
  }else{
    $repassword = test_input($_POST['repassword']);
  }
  if($_POST['password'] !== $_POST['repassword']){
    redirect('../register.php?action=error4');
  }
  //เช็คว่ามี username นี้หรือยัง
  $sqlid = "select u_id from `users` where u_user LIKE '$username'";
  $resultid = mysqli_query($conn, $sqlid);
  $numid = mysqli_num_rows($resultid);
  $datet = date("Y-m-d H:i:s");
  if ($numid == 0) {
  //$sql = "INSERT INTO `users` (`u_id`, `u_user`, `u_pass`, `u_permission`, `u_lastlogin`, `u_approve`) VALUES (NULL, '$username', MD5('$password'), '1', '$datet', '1');";
  $sql = "INSERT INTO `users` (`u_id`, `u_user`, `u_pass`, `u_permission`, `u_lastlogin`, `u_approve`) VALUES (NULL, '$username', '$password', '1', '$datet', '1');";
  $result = mysqli_query($conn, $sql);
    if ($result) {
        redirect('../login.php?action=success');
    } else {
        redirect('../register.php?action=error');
    }
  } else {
    redirect('../register.php?action=error3');
  }
} else {
  redirect('../register.php?action=error');
}
