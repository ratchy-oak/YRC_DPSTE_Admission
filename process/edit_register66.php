<?php
include '../connection/config.inc.php';
include '../includes/function.php';

if (isset($_POST['edit_register'])) {
    $name_folder = $_SESSION['id'];
    if (file_exists("../upload/$name_folder")) {
        $target_dir = "../upload/$name_folder";
        $checkOK = 1;
    } else {
        $flgCreate = mkdir("../upload/$name_folder");
        $target_dir = "../upload/$name_folder";
        $checkOK = 1;
    }
    if ($checkOK) {
        //$idre = $_POST['idregister'];
        $title = $_POST['title']; //คำนำหน้าชื่อ
        $name = $_POST['name']; //ชื่อ
        $surname = $_POST['surname']; //นามสกุล
        $idperson = $_POST['idperson'];
        $school = $_POST['school'];
        $school_province = $_POST['school_province'];

        $address = $_POST['address'];

        if ($_POST['road'] != "") {
            $road = $_POST['road'];
        } else {
            $road = "-";
        }

        if ($_POST['soi'] != "") {
            $soi = $_POST['soi'];
        } else {
            $soi = "-";
        }

        if ($_POST['mu'] != "") {
            $mu = $_POST['mu'];
        } else {
            $mu = "-";
        }

        $tumbon = $_POST['tumbon'];
        $amphor = $_POST['amphor'];
        $province = $_POST['province'];
        $zipcode = $_POST['zipcode'];

        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $telephone2 = $_POST['telephone2']; //โทรศัพท์มือถือ

        $grade1 = $_POST['grade1'];
        $grade2 = $_POST['grade2'];
        $grade3 = $_POST['grade3'];
        $grade4 = $_POST['grade4'];
        //echo "checkOK";
        //1.แนบใบสมัคร
        if ($_FILES['application_paper']['name'] != "") {
            $target_file = basename($_FILES['application_paper']['name']);
            $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $rand = rand(1, 1000000);
            $thumb1 = 'thumb1' . $name_folder . 'r' . $rand . '.' . $FileType;
            if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
                //$resize = resizeImage($_FILES['application_paper']['tmp_name'], $target_dir . "/", $thumb1, '1024');
                move_uploaded_file($_FILES['application_paper']['tmp_name'], $target_dir . "/" . $thumb1);
            } elseif ($FileType == 'pdf') {
                //move_uploaded_file($_FILES['application_paper']['tmp_name'], $target_dir . "/", $thumb1);
                move_uploaded_file($_FILES['application_paper']['tmp_name'], $target_dir . "/" . $thumb1);
            }
            // if ($numid == 0) {
            $sql1 = "UPDATE `register` SET `evi_1` = '$thumb1' WHERE `u_id` = '$_SESSION[id]' LIMIT 1;";
            $query1 = mysqli_query($conn, $sql1);
            // if ($query1) {
            //     redirect('../register66.php?action=success3');
            // } else {
            //     redirect('../register66.php?action=error');
            // }
            // }
        }

        //2. แนบสำเนาบัตรประชาชน
        if ($_FILES['id_card']['name'] != "") {
            $target_file = basename($_FILES['id_card']['name']);
            $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $rand = rand(1, 1000000);
            $thumb2 = 'thumb2' . $name_folder . 'r' . $rand . '.' . $FileType;
            if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
                //$resize = resizeImage($_FILES['id_card']['tmp_name'], $target_dir . "/", $thumb2, '1024');
                move_uploaded_file($_FILES['id_card']['tmp_name'], $target_dir . "/" . $thumb2);
            } elseif ($FileType == 'pdf') {
                move_uploaded_file($_FILES['id_card']['tmp_name'], $target_dir . "/" . $thumb2);
            }
            // if ($numid == 0) {
            $sql2 = "UPDATE `register` SET `evi_2` = '$thumb2' WHERE `u_id` = '$_SESSION[id]' LIMIT 1;";
            $query2 = mysqli_query($conn, $sql2);
            // if ($query2) {
            //     redirect('../register66.php?action=success3');
            // } else {
            //     redirect('../register66.php?action=error');
            // }
            // }
        }

        //3. รูปถ่ายสีในรูปเครื่องแบบนักเรียน 
        if ($_FILES['blue_pic']['name'] != "") {
            $target_file = basename($_FILES['blue_pic']['name']);
            $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $rand = rand(1, 1000000);
            $thumb3 = 'thumb3' . $name_folder . 'r' . $rand . '.' . $FileType;
            if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {
                //$resize = resizeImage($_FILES['blue_pic']['tmp_name'], $target_dir . "/", $thumb3, '1024');
                move_uploaded_file($_FILES['blue_pic']['tmp_name'], $target_dir . "/" . $thumb3);
            } elseif ($FileType == 'pdf') {
                redirect('../register66.php?action=error2');
            }
            // if ($numid == 0) {
            $sql3 = "UPDATE `register` SET `evi_3` = '$thumb3' WHERE `u_id` = '$_SESSION[id]' LIMIT 1;";
            $query3 = mysqli_query($conn, $sql3);
            // if ($query3) {
            //     redirect('../register66.php?action=success3');
            // } else {
            //     redirect('../register66.php?action=error');
            // }
            // }
        }

        //4. เอกสารแสดงผลการเรียน 5 ภาคเรียน
        // $sqlid = "select evi_4 from `register` where u_id='$_SESSION[id]' LIMIT 1";
        // $resultid = mysqli_query($conn, $sqlid);
        // $fetid = mysqli_fetch_array($resultid);
        //print_r($_FILES['grade_pic']['name']);
        //exit();
        if ($_FILES['grade_pic']['name'][0] != "") {
            //print_r($_FILES['grade_pic']['tmp_name']);
            $pattern = '';
            //echo "exit";
            //exit();
            for ($i = 0; $i < count($_FILES["grade_pic"]["name"]); $i++) {
                $target_file = basename($_FILES['grade_pic']['name'][$i]);
                $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $rand = rand(1, 1000000);
                $thumb4 = 'thumb4' . $name_folder . 'r' . $rand . '.' . $FileType;
                if ($FileType == 'jpg' or $FileType == 'png' or $FileType == 'jpeg') {

                    //$resize = resizeImage($_FILES['grade_pic']['tmp_name'][$i], $target_dir . "/", $thumb4, '1024');
                    move_uploaded_file($_FILES['grade_pic']['tmp_name'][$i], $target_dir . "/" . $thumb4);
                    $pattern .= $thumb4 . "#";
                } elseif ($FileType == 'pdf') {

                    move_uploaded_file($_FILES['grade_pic']['tmp_name'][$i], $target_dir . "/" . $thumb4);

                    $pattern .= $thumb4 . "#";
                }
            }
            //echo $pattern;
            //exit();
            $sql4 = "UPDATE `register` SET `evi_4` = '$pattern' WHERE `u_id` = '$_SESSION[id]' LIMIT 1;";
            $query4 = mysqli_query($conn, $sql4);
            // if ($query4) {
            //     redirect('../register66.php?action=success3');
            // } else {
            //     redirect('../register66.php?action=error');
            // }
        }


        //if ($numid == 0) {
        $sql = "UPDATE `register` SET `title` = '$title', `name` = '$name', `surname` = '$surname', `idperson` = '$idperson', `school` = '$school', `school_province` = '$school_province', `telephone` = '$telephone', `telephone2` = '$telephone2', `address` = '$address', `mu` = '$mu', `road` = '$road', `soi` = '$soi', `tumbon` = '$tumbon', `amphor` = '$amphor', `province` = '$province', `zipcode` = '$zipcode', `email` = '$email', `grade1` = '$grade1', `grade2` = '$grade2', `grade3` = '$grade3', `grade4` = '$grade4' WHERE `u_id` = '$_SESSION[id]' LIMIT 1;";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            redirect('../register66.php?action=success3');
        } else {
            redirect('../register66.php?action=error');
        }
        //}
    } else {
        redirect('../register66.php?action=error');
    }
}
