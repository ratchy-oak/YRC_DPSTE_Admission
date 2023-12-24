<?php
include "../connection/config.inc.php";

if (!isset($_POST['username'], $_POST['pass'])) {
    die('Please fill both the username and password field!');
}

if ($stmt = $conn->prepare('SELECT u_id, u_user, u_pass, u_permission, u_approve FROM users WHERE u_user = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
}

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $user, $password, $permission, $approve);
    $stmt->fetch();
    if($approve == '1'){
    //$enpass = MD5($_POST['pass']);
    $enpass = $_POST['pass'];
        if ($enpass === $password) {
            //session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['id'] = $id;
            $_SESSION['user_'] = $user;
            $_SESSION['permission'] = $permission;
            $datet = date("Y-m-d H:i:s");
            $sql = "UPDATE `users` SET `u_lastlogin` = '$datet' WHERE `u_id` = '$id' ";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            header('Location: ../index.php');
            exit();
        } else {
            //echo 'Incorrect password!';
            header('Location: ../login.php?action=error');
            exit();
        }
    }else{
    header('Location: ../login.php?action=error');
    exit();
    }
} else {
    //echo 'Incorrect username!';
    header('Location: ../login.php?action=error');
    exit();
}
$stmt->close();
