<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['check_user'])) {
  $user = test_input($_POST['username']);
    $sql = "select u_id, u_user from `users` where u_user LIKE '$user'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $fet = mysqli_fetch_array($result);
    if ($num != 0) {
        $_SESSION['newpassword'] = TRUE;
        $_SESSION['u_newpassword'] = $fet['u_user'];
        redirect('../new-password.php?action=success');
    } else {
        redirect('../forgot-password.php?action=error2');
    }
} else {
  redirect('../forgot-password.php?action=error');
}