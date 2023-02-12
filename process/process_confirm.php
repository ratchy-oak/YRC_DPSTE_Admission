<?php
include '../connection/config.inc.php';
include '../includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../login.php');
  exit();
}

if (isset($_POST['add_confirm'])) {
  if ($_FILES['fileupload']['name'] != "") {
    $name = test_input($_POST['name']);
    //$name2 = test_input($_POST['name2']);
    $selectBox = test_input($_POST['selectBox']);
    $date1 = $_POST['listyear2'] . "-" . $_POST['listmonth2'] . "-" . $_POST['listdate2'];
    $time1 = $_POST['listtime1'] . "." . $_POST['listtime2'];
    $u_id = $_SESSION['id'];

    $sqlid = "select b_id from `buy_register` where u_id='$u_id' limit 1";
    $resultid = mysqli_query($conn, $sqlid);
    $numid = mysqli_num_rows($resultid);

    if ($numid != 0) {
      $target_dir = '../upload/';
      $target_file = basename($_FILES['fileupload']['name']);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
        $rand = password_generate(7);
        $thumb = 'thumb' . $rand . '.' . $FileType;
        //$resize = resizeImage($_FILES['fileupload']['tmp_name'], $target_dir, $thumb, '800');
        if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_dir.$thumb)){
          $strSQL = "UPDATE `buy_register` SET `s_name`='', `b_name` = '$name', `b_bank` = '$selectBox', `b_date` = '$date1', `b_time` = '$time1', `b_file` = '$thumb', `status` = '1' WHERE `u_id` = '$u_id';";
          $objQuery = mysqli_query($conn, $strSQL);
          if($objQuery){
            redirect("../buy-register.php?action2=success");
          }
        }else{
          redirect('../confirm-buy-register.php?action=error3');
        }
      } else {
        redirect('../confirm-buy-register.php?action=error3');
      }
    } else {
      redirect('../buy-register.php?action2=error4');
    }
  } else {
    redirect('../confirm-buy-register.php?action=error2');
  }
} else {
  redirect('../confirm-buy-register.php?action=error');
}
