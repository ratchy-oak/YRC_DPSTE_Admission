<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['add_special1'])) {
  $name_folder = $_SESSION['id'];
  $content = $_POST['content'];
  if(file_exists("../upload/evidence/$name_folder"))
  {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }else{
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if($checkOK){
    //echo "checkOK";
      $sqlid = "select s1 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
      $resultid = mysqli_query($conn, $sqlid);
      $numid = mysqli_num_rows($resultid);
      $fetid = mysqli_fetch_array($resultid);
      $target_file = basename($_FILES['fileupload']['name']);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $datet = date("Y-m-d");
      if($numid == 0){
        $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
        $query = mysqli_query($conn, $sql);
      }
      if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
              //if ($_FILES["fileupload"]["size"] > 5120000) {
                //redirect('../register63.php?action=uploadError2');
                //exit();
              //}
              $rand = rand(1, 1000000);
              $thumb = 'thumb' . $rand . '.' . "jpg";
              $e = 'thumb' . $rand . '.' . "jpg";
              $resize = resizeImage($_FILES['fileupload']['tmp_name'],$target_dir."/",$thumb,'1024');
              $strSQL = "UPDATE `evidence` SET `s1` = '$e', `s1text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
              $objQuery = mysqli_query($conn, $strSQL);
              redirect('../register63.php?action=uploadSuccess');
      }elseif($FileType == 'pdf') {
            //if ($_FILES["fileupload"]["size"] > 5120000) {
              //redirect('../register63.php?action=uploadError2');
              //exit();
            //}
            $rand = rand(1, 1000000);
            $thumb = 'doc' . $rand . '.' . "pdf";
            $e = 'doc' . $rand . '.' . "pdf";
            move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_dir."/".$thumb);
            $strSQL = "UPDATE `evidence` SET `s1` = '$e', `s1text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
            $objQuery = mysqli_query($conn, $strSQL);
            redirect('../register63.php?action=uploadSuccess');
      }else{
        redirect('../register63.php?action=uploadError3');
      }
  }else{
	redirect('../register63.php?action=uploadError');
  }
}

if (isset($_POST['add_special2'])) {
  $name_folder = $_SESSION['id'];
  $content = $_POST['content'];
  if(file_exists("../upload/evidence/$name_folder"))
  {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }else{
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if($checkOK){
    //echo "checkOK";
      $sqlid = "select s2 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
      $resultid = mysqli_query($conn, $sqlid);
      $numid = mysqli_num_rows($resultid);
      $fetid = mysqli_fetch_array($resultid);
      $target_file = basename($_FILES['fileupload']['name']);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $datet = date("Y-m-d");
      if($numid == 0){
        $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
        $query = mysqli_query($conn, $sql);
      }
      if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
              //if ($_FILES["fileupload"]["size"] > 5120000) {
                //redirect('../register63.php?action=uploadError2');
                //exit();
              //}
              $rand = rand(1, 1000000);
              $thumb = 'thumb' . $rand . '.' . "jpg";
              $e = 'thumb' . $rand . '.' . "jpg";
              $resize = resizeImage($_FILES['fileupload']['tmp_name'],$target_dir."/",$thumb,'1024');
              $strSQL = "UPDATE `evidence` SET `s2` = '$e', `s2text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
              $objQuery = mysqli_query($conn, $strSQL);
              redirect('../register63.php?action=uploadSuccess');
      }elseif($FileType == 'pdf') {
            //if ($_FILES["fileupload"]["size"] > 5120000) {
              //redirect('../register63.php?action=uploadError2');
              //exit();
            //}
            $rand = rand(1, 1000000);
            $thumb = 'doc' . $rand . '.' . "pdf";
            $e = 'doc' . $rand . '.' . "pdf";
            move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_dir."/".$thumb);
            $strSQL = "UPDATE `evidence` SET `s2` = '$e', `s2text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
            $objQuery = mysqli_query($conn, $strSQL);
            redirect('../register63.php?action=uploadSuccess');
      }else{
        redirect('../register63.php?action=uploadError3');
      }
  }else{
	redirect('../register63.php?action=uploadError');
  }
}

if (isset($_POST['add_special3'])) {
  $name_folder = $_SESSION['id'];
  $content = $_POST['content'];
  if(file_exists("../upload/evidence/$name_folder"))
  {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }else{
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if($checkOK){
    //echo "checkOK";
      $sqlid = "select s3 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
      $resultid = mysqli_query($conn, $sqlid);
      $numid = mysqli_num_rows($resultid);
      $fetid = mysqli_fetch_array($resultid);
      $target_file = basename($_FILES['fileupload']['name']);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $datet = date("Y-m-d");
      if($numid == 0){
        $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
        $query = mysqli_query($conn, $sql);
      }
      if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
              //if ($_FILES["fileupload"]["size"] > 5120000) {
                //redirect('../register63.php?action=uploadError2');
                //exit();
              //}
              $rand = rand(1, 1000000);
              $thumb = 'thumb' . $rand . '.' . "jpg";
              $e = 'thumb' . $rand . '.' . "jpg";
              $resize = resizeImage($_FILES['fileupload']['tmp_name'],$target_dir."/",$thumb,'1024');
              $strSQL = "UPDATE `evidence` SET `s3` = '$e', `s3text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
              $objQuery = mysqli_query($conn, $strSQL);
              redirect('../register63.php?action=uploadSuccess');
      }elseif($FileType == 'pdf') {
            //if ($_FILES["fileupload"]["size"] > 5120000) {
              //redirect('../register63.php?action=uploadError2');
              //exit();
            //}
            $rand = rand(1, 1000000);
            $thumb = 'doc' . $rand . '.' . "pdf";
            $e = 'doc' . $rand . '.' . "pdf";
            move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_dir."/".$thumb);
            $strSQL = "UPDATE `evidence` SET `s3` = '$e', `s3text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
            $objQuery = mysqli_query($conn, $strSQL);
            redirect('../register63.php?action=uploadSuccess');
      }else{
        redirect('../register63.php?action=uploadError3');
      }
  }else{
	redirect('../register63.php?action=uploadError');
  }
}

if (isset($_POST['add_special4'])) {
  $name_folder = $_SESSION['id'];
  $content = $_POST['content'];
  if(file_exists("../upload/evidence/$name_folder"))
  {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }else{
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if($checkOK){
    //echo "checkOK";
      $sqlid = "select s4 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
      $resultid = mysqli_query($conn, $sqlid);
      $numid = mysqli_num_rows($resultid);
      $fetid = mysqli_fetch_array($resultid);
      $target_file = basename($_FILES['fileupload']['name']);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $datet = date("Y-m-d");
      if($numid == 0){
        $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
        $query = mysqli_query($conn, $sql);
      }
      if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
              //if ($_FILES["fileupload"]["size"] > 5120000) {
                //redirect('../register63.php?action=uploadError2');
                //exit();
              //}
              $rand = rand(1, 1000000);
              $thumb = 'thumb' . $rand . '.' . "jpg";
              $e = 'thumb' . $rand . '.' . "jpg";
              $resize = resizeImage($_FILES['fileupload']['tmp_name'],$target_dir."/",$thumb,'1024');
              $strSQL = "UPDATE `evidence` SET `s4` = '$e', `s4text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
              $objQuery = mysqli_query($conn, $strSQL);
              redirect('../register63.php?action=uploadSuccess');
      }elseif($FileType == 'pdf') {
            //if ($_FILES["fileupload"]["size"] > 5120000) {
              //redirect('../register63.php?action=uploadError2');
              //exit();
            //}
            $rand = rand(1, 1000000);
            $thumb = 'doc' . $rand . '.' . "pdf";
            $e = 'doc' . $rand . '.' . "pdf";
            move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_dir."/".$thumb);
            $strSQL = "UPDATE `evidence` SET `s4` = '$e', `s4text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
            $objQuery = mysqli_query($conn, $strSQL);
            redirect('../register63.php?action=uploadSuccess');
      }else{
        redirect('../register63.php?action=uploadError3');
      }
  }else{
	redirect('../register63.php?action=uploadError');
  }
}

if (isset($_POST['add_special5'])) {
  $name_folder = $_SESSION['id'];
  $content = $_POST['content'];
  if(file_exists("../upload/evidence/$name_folder"))
  {
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }else{
    $flgCreate = mkdir("../upload/evidence/$name_folder");
    $target_dir = "../upload/evidence/$name_folder";
    $checkOK = 1;
  }
  if($checkOK){
    //echo "checkOK";
      $sqlid = "select s5 from `evidence` where u_id='$_SESSION[id]' LIMIT 1";
      $resultid = mysqli_query($conn, $sqlid);
      $numid = mysqli_num_rows($resultid);
      $fetid = mysqli_fetch_array($resultid);
      $target_file = basename($_FILES['fileupload']['name']);
      $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $datet = date("Y-m-d");
      if($numid == 0){
        $sql = "INSERT INTO `evidence` (`e_id`, `u_id`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `s1`, `s1text`, `s2`, `s2text`, `s3`, `s3text`, `s4`, `s4text`, `s5`, `s5text`, `comment`, `comment_special`, `e_date`) VALUES (NULL, '$_SESSION[id]', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$datet');";
        $query = mysqli_query($conn, $sql);
      }
      if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
              //if ($_FILES["fileupload"]["size"] > 5120000) {
                //redirect('../register63.php?action=uploadError2');
                //exit();
              //}
              $rand = rand(1, 1000000);
              $thumb = 'thumb' . $rand . '.' . "jpg";
              $e = 'thumb' . $rand . '.' . "jpg";
              $resize = resizeImage($_FILES['fileupload']['tmp_name'],$target_dir."/",$thumb,'1024');
              $strSQL = "UPDATE `evidence` SET `s5` = '$e', `s5text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
              $objQuery = mysqli_query($conn, $strSQL);
              redirect('../register63.php?action=uploadSuccess');
      }elseif($FileType == 'pdf') {
            //if ($_FILES["fileupload"]["size"] > 5120000) {
              //redirect('../register63.php?action=uploadError2');
              //exit();
            //}
            $rand = rand(1, 1000000);
            $thumb = 'doc' . $rand . '.' . "pdf";
            $e = 'doc' . $rand . '.' . "pdf";
            move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_dir."/".$thumb);
            $strSQL = "UPDATE `evidence` SET `s5` = '$e', `s5text` = '$content' WHERE `u_id` = '$_SESSION[id]';";
            $objQuery = mysqli_query($conn, $strSQL);
            redirect('../register63.php?action=uploadSuccess');
      }else{
        redirect('../register63.php?action=uploadError3');
      }
  }else{
	redirect('../register63.php?action=uploadError');
  }
}