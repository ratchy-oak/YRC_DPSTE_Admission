<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['add_evidance1'])) {
  $name_folder = $_SESSION['id'];
  if (file_exists("../upload/evidence/$name_folder")) {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  } else {
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if ($checkOK) {
    //echo "checkOK";
    $sqlid = "select e1 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
    $resultid = mysqli_query($conn, $sqlid);
    $numid = mysqli_num_rows($resultid);
    $fetid = mysqli_fetch_array($resultid);
    $target_file = basename($_FILES['fileupload']['name']);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $datet = date("Y-m-d H:i:s");
    if ($numid == 0) {
      $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
      $query = mysqli_query($conn, $sql);
    }
    if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
      $rand = rand(1, 1000000);
      $thumb = 'thumb' . $rand . '.' . $FileType;
      //$e = 'thumb' . $rand . '.' . "jpg";
      if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_dir."/".$thumb)){
      //$resize = resizeImage($_FILES['fileupload']['tmp_name'], $target_dir . "/", $thumb, '148');
      $strSQL = "UPDATE `evidence` SET `e1` = '$thumb' WHERE `u_id` = '$_SESSION[id]';";
      $objQuery = mysqli_query($conn, $strSQL);
      redirect('../register66.php?action=uploadSuccess');
      }else{
        redirect('../register66.php?action=uploadError');
      }
    } else {
      redirect('../register66.php?action=uploadError3');
    }
  } else {
    redirect('../register66.php?action=uploadError');
  }
}

if (isset($_POST['add_evidance2'])) {
  $name_folder = $_SESSION['id'];
  if (file_exists("../upload/evidence/$name_folder")) {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  } else {
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if ($checkOK) {
    //echo "checkOK";
    $sqlid = "select e2 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
    $resultid = mysqli_query($conn, $sqlid);
    $numid = mysqli_num_rows($resultid);
    $fetid = mysqli_fetch_array($resultid);
    $target_file = basename($_FILES['fileupload']['name']);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $datet = date("Y-m-d");
    if ($numid == 0) {
      $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
      $query = mysqli_query($conn, $sql);
    }
    if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
      //if ($_FILES["fileupload"]["size"] > 5120000) {
        //redirect('../register66.php?action=uploadError2');
        //exit();
      //}
      $rand = rand(1, 1000000);
      $thumb = 'thumb' . $rand . '.' . "jpg";
      $e = 'thumb' . $rand . '.' . "jpg";
      $resize = resizeImage($_FILES['fileupload']['tmp_name'], $target_dir . "/", $thumb, '1024');
      $strSQL = "UPDATE `evidence` SET `e2` = '$e' WHERE `u_id` = '$_SESSION[id]';";
      $objQuery = mysqli_query($conn, $strSQL);
      redirect('../register66.php?action=uploadSuccess');
    } else {
      redirect('../register66.php?action=uploadError3');
    }
  } else {
    redirect('../register66.php?action=uploadError');
  }
}

if (isset($_POST['add_evidance3'])) {
  $name_folder = $_SESSION['id'];
  if (file_exists("../upload/evidence/$name_folder")) {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  } else {
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if ($checkOK) {
    //echo "checkOK";
    $sqlid = "select e3 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
    $resultid = mysqli_query($conn, $sqlid);
    $numid = mysqli_num_rows($resultid);
    $fetid = mysqli_fetch_array($resultid);
    $target_file = basename($_FILES['fileupload']['name']);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $datet = date("Y-m-d");
    if ($numid == 0) {
      $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
      $query = mysqli_query($conn, $sql);
    }
    if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
      //if ($_FILES["fileupload"]["size"] > 5120000) {
        //redirect('../register66.php?action=uploadError2');
        //exit();
      //}
      $rand = rand(1, 1000000);
      $thumb = 'thumb' . $rand . '.' . "jpg";
      $e = 'thumb' . $rand . '.' . "jpg";
      $resize = resizeImage($_FILES['fileupload']['tmp_name'], $target_dir . "/", $thumb, '1024');
      $strSQL = "UPDATE `evidence` SET `e3` = '$e' WHERE `u_id` = '$_SESSION[id]';";
      $objQuery = mysqli_query($conn, $strSQL);
      redirect('../register66.php?action=uploadSuccess');
    } else {
      redirect('../register66.php?action=uploadError3');
    }
  } else {
    redirect('../register66.php?action=uploadError');
  }
}

if (isset($_POST['add_evidance4'])) {
  $name_folder = $_SESSION['id'];
  if (file_exists("../upload/evidence/$name_folder")) {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  } else {
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if ($checkOK) {
    //echo "checkOK";
    $sqlid = "select e4 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
    $resultid = mysqli_query($conn, $sqlid);
    $numid = mysqli_num_rows($resultid);
    $fetid = mysqli_fetch_array($resultid);
    $target_file = basename($_FILES['fileupload']['name']);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $datet = date("Y-m-d");
    if ($numid == 0) {
      $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
      $query = mysqli_query($conn, $sql);
    }
    if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
      //if ($_FILES["fileupload"]["size"] > 5120000) {
        //redirect('../register66.php?action=uploadError2');
        //exit();
      //}
      $rand = rand(1, 1000000);
      $thumb = 'thumb' . $rand . '.' . "jpg";
      $e = 'thumb' . $rand . '.' . "jpg";
      $resize = resizeImage($_FILES['fileupload']['tmp_name'], $target_dir . "/", $thumb, '1024');
      $strSQL = "UPDATE `evidence` SET `e4` = '$e' WHERE `u_id` = '$_SESSION[id]';";
      $objQuery = mysqli_query($conn, $strSQL);
      redirect('../register66.php?action=uploadSuccess');
    } else {
      redirect('../register66.php?action=uploadError3');
    }
  } else {
    redirect('../register66.php?action=uploadError');
  }
}

if (isset($_POST['add_evidance5'])) {
  $name_folder = $_SESSION['id'];
  if (file_exists("../upload/evidence/$name_folder")) {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  } else {
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if ($checkOK) {
    //echo "checkOK";
    $sqlid = "select e5 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
    $resultid = mysqli_query($conn, $sqlid);
    $numid = mysqli_num_rows($resultid);
    $fetid = mysqli_fetch_array($resultid);
    $datet = date("Y-m-d");
    if ($numid == 0) {
      $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
      $query = mysqli_query($conn, $sql);
    }
    for($i=0;$i<count($_FILES["fileupload"]["name"]);$i++){
      $sqlid = "select e5 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
      $resultid = mysqli_query($conn, $sqlid);
      $fetid = mysqli_fetch_array($resultid);
      $target_file = basename($_FILES['fileupload']['name'][$i]);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {

          $rand = rand(1, 1000000);
          $thumb = 'thumb' . $rand . '.' . $FileType;

          if(move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i],$target_dir."/".$thumb)){
            if($fetid['e5'] != "0"){
              $pattern = $fetid['e5'].$thumb."#";
              }else{
                $pattern = $thumb."#";
              }
            $strSQL = "UPDATE `evidence` SET `e5` = '$pattern' WHERE `u_id` = '$_SESSION[id]';";
            $objQuery = mysqli_query($conn, $strSQL);
          }else{
            redirect('../register66.php?action=uploadError');
          }
        }
    }
    redirect('../register66.php?action=uploadSuccess');
  } else {
    redirect('../register66.php?action=uploadError');
  }
}

if (isset($_POST['add_evidance6'])) {
  $name_folder = $_SESSION['id'];
  if (file_exists("../upload/evidence/$name_folder")) {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  } else {
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if ($checkOK) {
    //echo "checkOK";
    $sqlid = "select e6 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
    $resultid = mysqli_query($conn, $sqlid);
    $numid = mysqli_num_rows($resultid);
    $fetid = mysqli_fetch_array($resultid);
    $datet = date("Y-m-d H:i:s");
    if ($numid == 0) {
      $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
      $query = mysqli_query($conn, $sql);
    }
    for($i=0;$i<count($_FILES["fileupload"]["name"]);$i++){
      $sqlid = "select e6 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
      $resultid = mysqli_query($conn, $sqlid);
      $fetid = mysqli_fetch_array($resultid);
      $target_file = basename($_FILES['fileupload']['name'][$i]);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
          $rand = rand(1, 1000000);
          $thumb = 'thumb' . $rand . '.' . $FileType;

          if(move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i],$target_dir."/".$thumb)){
            if($fetid['e6'] != "0"){
              $pattern = $fetid['e6'].$thumb."#";
              }else{
                $pattern = $thumb."#";
              }
            $strSQL = "UPDATE `evidence` SET `e6` = '$pattern' WHERE `u_id` = '$_SESSION[id]';";
            $objQuery = mysqli_query($conn, $strSQL);
          }else{
            redirect('../register66.php?action=uploadError');
          }
        }
    }
    redirect('../register66.php?action=uploadSuccess');
  } else {
    redirect('../register66.php?action=uploadError');
  }
}