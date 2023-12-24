<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: login.php');
  exit();
}
date_default_timezone_set('Asia/Bangkok');

$s_id = $_GET['s_id'];
$sqlid_re = "select * from `register` where u_id = '$s_id' limit 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
$num_re = mysqli_num_rows($resultid_re);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่" />
  <meta name="author" content="โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่" />

  <title>
    :: ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่ ::
  </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;500&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("includes/sidebar.php");
    // if($num_code == 0){
    //   header('Location: index.php');
    //   exit();
    // }
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <?php include("includes/top_bar.php"); ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h4 mb-2 text-gray-800">สมัครสอบคัดเลือกเข้าเรียนชั้นมัธยมศึกษาปีที่ 1 (รอบโครงการเรียนดี)</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">แก้ไขข้อมูล</h6>
              </div>
              <div class="card-body">
                <!-- begin col-6 -->
                <div class="col-xl-6">
                  <form action="./process/edit_register1_66_admin.php" method="post" class="form-horizontal" name="register-form">
                    <?php
                    $sqlprovince = "select province_id, province_name from `province`";
                    $resultprovince = mysqli_query($conn, $sqlprovince);
                    ?>
<div class="form-group">
                    
                    <label class="col-md-8 col-sm-8 col-form-label"><strong>เลขที่ใบสมัคร</strong> <span style="color: red;">*แก้ไขแจ้งเพจงานรับนักเรียน</span></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="idregister" class="form-control" type="text" value="<?php echo $fetid_re['idregister']; ?>" readonly required>
                      </div>
                      <label class="col-md-4 col-sm-4 col-form-label">
                    <img src="img/Screenshot_65.png" alt="">
                    </label>
                    <label class="col-md-12 col-sm-12 col-form-label"><strong>คำนำหน้าชื่อ</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <select class="form-control" name="title" id="title-required" required>
                          <option value="">เลือกคำนำหน้าชื่อ</option>
                          <option value="เด็กชาย" <?php if($fetid_re['title'] === "เด็กชาย"){?>selected<?php }?>>เด็กชาย</option>
                          <option value="เด็กหญิง" <?php if($fetid_re['title'] === "เด็กหญิง"){?>selected<?php }?>>เด็กหญิง</option>
                          <option value="นาย" <?php if($fetid_re['title'] === "นาย"){?>selected<?php }?>>นาย</option>
                          <option value="นางสาว" <?php if($fetid_re['title'] === "นางสาว"){?>selected<?php }?>>นางสาว</option>
                        </select>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>ชื่อ</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="name" class="form-control" type="text" value="<?php echo $fetid_re['name']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>นามสกุล</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="surname" class="form-control" type="text" value="<?php echo $fetid_re['surname']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>โรงเรียน</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="school" class="form-control" type="text" value="<?php echo $fetid_re['school']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label">เบอร์โทรศัพท์นักเรียน <span style="color: red;">*เช่น 095-1234567 กรอก 1 หมายเลขเท่านั้น</span></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="telephone" class="form-control" type="text" value="<?php echo $fetid_re['telephone']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label">ชื่อ - สกุล ผู้ปกครอง</label>
                      <div class="col-md-12 col-sm-12">
                        <input name="parent" class="form-control" type="text" value="<?php echo $fetid_re['parent']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label">เบอร์โทรศัพท์ <span style="color: red;">*เช่น 095-1234567 กรอก 1 หมายเลขเท่านั้น</span></span></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="telephone2" class="form-control" type="text" value="<?php echo $fetid_re['telephone2']; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>บ้านเลขที่</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="address" class="form-control" type="text" value="<?php echo $fetid_re['address']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>หมู่ที่</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="mu" class="form-control" type="text" value="<?php echo $fetid_re['mu']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>ตำบล</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="tumbon" class="form-control" type="text" value="<?php echo $fetid_re['tumbon']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>อำเภอ</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="amphor" class="form-control" type="text" value="<?php echo $fetid_re['amphor']; ?>" required>
                      </div>
                    <?php
                    $sqlprovince = "select province_id, province_name from `province`";
                    $resultprovince = mysqli_query($conn, $sqlprovince);
                    ?>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>จังหวัด</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <select class="form-control" name="province" id="province-required" required>
                          <?php
                          while ($fetprovince = mysqli_fetch_array($resultprovince)) {
                          ?>

                            <option value="<?php echo $fetprovince['province_name']; ?>" <?php if ($fetid_re['province'] == $fetprovince['province_name']) {?>selected<?php }?>><?php echo $fetprovince['province_name']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                    <span style="color: red; font-weight: bold;">ข้อมูลผลการเรียน 2 ปีการศึกษา (ชั้น ป.4 และ ป.5)</span><br>
                      <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนเฉลี่ยรวมทุกรายวิชา</label>
                      <div class="col-md-12 col-sm-12">
                        <input name="grade1" class="form-control" type="text" value="<?php echo $fetid_re['grade1']; ?>" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนเฉลี่ยวิชาคณิตศาสตร์พื้นฐาน</label>
                      <div class="col-md-12 col-sm-12">
                        <input name="grade2" class="form-control" type="text" value="<?php echo $fetid_re['grade2']; ?>" required>
                      </div>

                      <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนเฉลี่ยวิชาวิทยาศาสตร์และเทคโนโลยีพื้นฐาน</label>
                      <div class="col-md-12 col-sm-12">
                        <input name="grade3" class="form-control" type="text" value="<?php echo $fetid_re['grade3']; ?>" required>
                      </div>
                      <br/>
                      <span style="color: red; font-weight: bold;">*ให้ผู้สมัครเลือกลำดับแผนการเรียนที่ต้องการศึกษาต่อชั้น ม.1</span><br>
                      <label class="col-md-4 col-sm-4 col-form-label">แผนการเรียน ลำดับที่ 1</label>
                      <div class="col-md-8 col-sm-8">
                      <select class="form-control" name="group1" required>
                          <option value="1" <?php if($fetid_re['group1'] === "1"){?>selected<?php }?>>ห้องเรียนปกติ</option>
                          <option value="2" <?php if($fetid_re['group1'] === "2"){?>selected<?php }?>>SMART YRC</option>
                        </select>
                      </div>
                      <label class="col-md-4 col-sm-4 col-form-label">แผนการเรียน ลำดับที่ 2</label>
                      <div class="col-md-8 col-sm-8">
                      <select class="form-control" name="group2">
                      <option value="" <?php if($fetid_re['group2'] === "0"){?>selected<?php }?>>ลำดับที่ 2</option>
                          <option value="1" <?php if($fetid_re['group2'] === "1"){?>selected<?php }?>>ห้องเรียนปกติ</option>
                          <option value="2" <?php if($fetid_re['group2'] === "2"){?>selected<?php }?>>SMART YRC</option>
                        </select>
                      </div>
                      <br/>
                    <div class="col-md-12 col-sm-12">
                    <input type="checkbox" name="checkbox" id="" required> ตรวจสอบข้อมูลให้ถูกต้อง ก่อนแก้ไขข้อมูล</label>
                      </div>
                      <br/>
                      <input type="hidden" name="s_id" value="<?php echo $fetid_re['u_id'];?>">
                    <button name="edit_register4a" type="submit" class="btn btn-primary btn-sm">แก้ไขข้อมูล</button>
                  </form>

                </div>
              </div>
            </div>

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; 2022 Yupparaj Wittayalai School</span>
              </div>
            </div>
          </footer>
          <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>