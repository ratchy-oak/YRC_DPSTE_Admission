<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if(isset($_POST['add_confirm4'])){
    $s_id = $_POST['s_id'];
    $folderPath = "../upload_confirm/";
    $name = $_POST['name'];
    $selectBox = $_POST['selectBox'];
    $datet = $_POST['listyear']."-".$_POST['listmonth']."-".$_POST['listdate'];
    $timet = $_POST['listh'].".".$_POST['listm'];
    // เงินบำรุงการศึกษา
    $selectBox2 = $_POST['selectBox2'];
    // เงินค่าหนังสือยุพราชฯ 100 ปี
    $selectBox3 = $_POST['selectBox3'];
    // เงินค่าบำรุงสมาคมครูและผู้ปกครอง
    $selectBox4 = $_POST['selectBox4'];
    // เงินบริจาค
    if($_POST['donate']!=""){
        $donate = $_POST['donate'];
    }else{
        $donate = 0;
    }
    $telephone = $_POST['telephone'];
    $date = date("Y-m-d H:i:s");
        if ($_FILES['fileupload1']['name'] != "") {
            $file1 = $_FILES["fileupload1"]["tmp_name"];
            $sourceProperties1 = getimagesize($file1);
            $ext1 = pathinfo($_FILES['fileupload1']['name'], PATHINFO_EXTENSION);
            $imageType1 = $sourceProperties1[2];
            $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $shfl = str_shuffle($comb);
            $thumb1 = substr($shfl, 0, 8);
            switch ($imageType1) {
                case IMAGETYPE_PNG:
                    $imageResourceId1 = imagecreatefrompng($file1); 
                    $targetLayer1 = imageResize($imageResourceId1,$sourceProperties1[0],$sourceProperties1[1]);
                    //imagepng($targetLayer1,$folderPath. $thumb1. "_thump1.". $ext1);
                    break;
                case IMAGETYPE_JPEG:
                    $imageResourceId1 = imagecreatefromjpeg($file1); 
                    $targetLayer1 = imageResize($imageResourceId1,$sourceProperties1[0],$sourceProperties1[1]);
                    //imagejpeg($targetLayer1,$folderPath. $thumb1. "_thump1.". $ext1);
                    break;
                default:
                    flash('Message', 'หลักฐานบัตรประจำตัวประชาชน เอกสารไม่ใช่รูปภาพ นามสกุล .jpeg, .png กรุณาอัพโหลดใหม่อีกครั้ง', 'alert alert-danger');
                    redirect('../confirm-m4.php');
                    break;
            }
            move_uploaded_file($file1, $folderPath. $thumb1. "_origin.". $ext1);
            $thumb1n = $thumb1. "_origin.". $ext1;
        }
        if ($_FILES['fileupload2']['name'] != "") {
            $file2 = $_FILES["fileupload2"]["tmp_name"];
            $sourceProperties2 = getimagesize($file2);
            $ext2 = pathinfo($_FILES['fileupload2']['name'], PATHINFO_EXTENSION);
            $imageType2 = $sourceProperties2[2];
            $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $shfl = str_shuffle($comb);
            $thumb2 = substr($shfl, 0, 8);
            switch ($imageType2) {
                case IMAGETYPE_PNG:
                    $imageResourceId2 = imagecreatefrompng($file2); 
                    $targetLayer2 = imageResize($imageResourceId2,$sourceProperties2[0],$sourceProperties2[1]);
                    //imagepng($targetLayer2,$folderPath. $thumb2. "_thump2.". $ext2);
                    break;
                case IMAGETYPE_JPEG:
                    $imageResourceId2 = imagecreatefromjpeg($file2); 
                    $targetLayer2 = imageResize($imageResourceId2,$sourceProperties2[0],$sourceProperties2[1]);
                    //imagejpeg($targetLayer2,$folderPath. $thumb2. "_thump2.". $ext2);
                    break;
                default:
                    flash('Message', 'หลักฐานบัตรประจำตัวสอบ เอกสารไม่ใช่รูปภาพ นามสกุล .jpeg, .png กรุณาอัพโหลดใหม่อีกครั้ง', 'alert alert-danger');
                    redirect('../confirm-m4.php');
                    break;
            }
            move_uploaded_file($file2, $folderPath. $thumb2. "_origin.". $ext2);
            $thumb2n = $thumb2. "_origin.". $ext2;
        }
        if ($_FILES['fileupload3']['name'] != "") {
            $file3 = $_FILES["fileupload3"]["tmp_name"];
            $sourceProperties3 = getimagesize($file3);
            $ext3 = pathinfo($_FILES['fileupload3']['name'], PATHINFO_EXTENSION);
            $imageType3 = $sourceProperties3[2];
            $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $shfl = str_shuffle($comb);
            $thumb3 = substr($shfl, 0, 8);
            switch ($imageType3) {
                case IMAGETYPE_PNG:
                    $imageResourceId3 = imagecreatefrompng($file3); 
                    $targetLayer3 = imageResize($imageResourceId3,$sourceProperties3[0],$sourceProperties3[1]);
                    //imagepng($targetLayer3,$folderPath. $thumb3. "_thump3.". $ext3);
                    break;
                case IMAGETYPE_JPEG:
                    $imageResourceId3 = imagecreatefromjpeg($file3); 
                    $targetLayer3 = imageResize($imageResourceId3,$sourceProperties3[0],$sourceProperties3[1]);
                    //imagejpeg($targetLayer3,$folderPath. $thumb3. "_thump3.". $ext3);
                    break;
                default:
                    flash('Message', 'หลักฐานการโอนเงิน เอกสารไม่ใช่รูปภาพ นามสกุล .jpeg, .png กรุณาอัพโหลดใหม่อีกครั้ง', 'alert alert-danger');
                    redirect('../confirm-m4.php');
                    break;
            }
            move_uploaded_file($file3, $folderPath. $thumb3. "_origin.". $ext3);
            $thumb3n = $thumb3. "_origin.". $ext3;
        }

        $sql = "INSERT INTO `report` (`re_id`, `u_id`, `re_idcard`, `re_exam`, `re_money`, `re_transfer`, `re_bank`, `re_date_t`, `re_time_t`, `re_check1`, `re_yrc1000`, `re_yrcalumni`, `re_donate`, `re_telephone`, `re_check`, `re_comment`, `re_date`) VALUES (NULL, '$_SESSION[id]', '$thumb1n', '$thumb2n', '$thumb3n', '$name', '$selectBox', '$datet', '$timet', '$selectBox2', '$selectBox3', '$selectBox4', '$donate', '$telephone', '0', '', '$date');";
        $objQuery = mysqli_query($conn, $sql);
        if($objQuery){
            flash('Message', 'บันทึกข้อมูลเรียบร้อย รอคณะกรรมการตรวจสอบข้อมูล', 'alert alert-success');
            redirect('../confirm-m4.php');
        }else{
            flash('Message', 'เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้', 'alert alert-danger');
            redirect('../confirm-m4.php');
        }

}

if(isset($_GET['action4'])){
    $sql_c1 = "SELECT re_id FROM report WHERE u_id = '$_SESSION[id]' and re_check = '0' ";
    $query_c1 = mysqli_query($conn, $sql_c1);
    $num_c1 = mysqli_num_rows($query_c1);
    if($num_c1 != ""){
        $sql = "DELETE FROM `report` WHERE `u_id` = '$_SESSION[id]' LIMIT 1";
        $objQuery = mysqli_query($conn, $sql);
        if($objQuery){
            flash('Message', 'ลบข้อมูลเรียบร้อย', 'alert alert-success');
            redirect('../confirm-m4.php');
        }
    }else{
        flash('Message', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้', 'alert alert-danger');
        redirect('../confirm-m4.php');
    }
}
