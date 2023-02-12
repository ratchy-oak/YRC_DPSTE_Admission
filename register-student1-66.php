<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}
date_default_timezone_set('Asia/Bangkok');
$sqlid = "select u_id from `register` where u_id = '$_SESSION[id]'";
$resultid = mysqli_query($conn, $sqlid);
$numid = mysqli_num_rows($resultid);
if ($numid != 0) {
  header('Location: register66.php');
  exit();
}
$s_user = "SELECT * FROM users WHERE u_id=$_SESSION[id]";
$result_user = mysqli_query($conn, $s_user);
$fet_user = mysqli_fetch_array($result_user);

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
            <h1 class="h4 mb-2 text-gray-800">สมัครสอบคัดเลือกเข้าเรียนชั้นมัธยมศึกษาปีที่ 1 รอบโครงการเรียนดี</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ข้อมูล</h6>
              </div>
              <div class="card-body">
                <?php
                isset($_GET['action']) ? ($action = $_GET['action']) : ($action = '');
                if ($action == 'success') { ?>
                  <div class="alert alert-success fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>บันทึกข้อมูลสำเร็จ!</strong>
                  </div>
                <?php } elseif ($action == 'success2') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>ลบข้อมูลสำเร็จ!</strong>
                  </div>
                <?php } elseif ($action == 'success3') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>แก้ไขข้อมูลสำเร็จ!</strong>
                  </div>
                <?php } elseif ($action == 'error') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>บันทึกข้อมูลไม่สำเร็จ!</strong>
                  </div>
                <?php
                } elseif ($action == 'error2') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>มีการใช้รหัสใบสมัครในการสมัครแล้ว ไม่สามารถสมัครใหม่ได้!! ติดต่อเพจงานรับนักเรียน</strong>
                  </div>
                <?php
                } elseif ($action == 'error3') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>ไม่ได้เลือกแผนการเรียน หรือแผนการเรียนซ้ำกัน สมัครใหม่อีกครั้ง</strong>
                  </div>
                <?php
                } elseif ($action == 'error4') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>คะแนน O-NET ต้องเป็นตัวเลข เช่น 490.00, 500</strong>
                  </div>
                <?php
                } elseif ($action == 'error5') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>ไม่สามารถประมวลผลได้!!</strong>
                  </div>
                <?php
                }
                ?>
                <!-- begin col-6 -->
                <div class="col-xl-6">
                  <form action="./process/register1_66.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="register-form">
                    <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-form-label"><strong>เลขที่ใบสมัคร</strong> <span style="color: red;">*ทาง รร จะปั้มติดใบสมัคร</span></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="idregister" class="form-control mb-2" type="text" required>
                        <img src="img/Screenshot_65.png" alt="">
                      </div>
                      
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>คำนำหน้าชื่อ</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <select class="form-control" name="title" id="title-required" required>
                          <option value="">เลือกคำนำหน้าชื่อ</option>
                          <option value="เด็กชาย">เด็กชาย</option>
                          <option value="เด็กหญิง">เด็กหญิง</option>
                          <option value="นาย">นาย</option>
                          <option value="นางสาว">นางสาว</option>
                        </select>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>ชื่อ</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="name" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>นามสกุล</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="surname" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>โรงเรียน</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="school" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label">เบอร์โทรศัพท์นักเรียน <span style="color: red;">*เช่น 095-1234567 กรอก 1 หมายเลขเท่านั้น</span></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="telephone" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label">ชื่อ - สกุล ผู้ปกครอง</label>
                      <div class="col-md-12 col-sm-12">
                        <input name="parent" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label">เบอร์โทรศัพท์ <span style="color: red;">*เช่น 095-1234567 กรอก 1 หมายเลขเท่านั้น</span></span></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="telephone2" class="form-control" type="text" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>บ้านเลขที่</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="address" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>หมู่ที่</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="mu" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>ตำบล</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="tumbon" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-12 col-sm-12 col-form-label"><strong>อำเภอ</strong></label>
                      <div class="col-md-12 col-sm-12">
                        <input name="amphor" class="form-control" type="text" required>
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
                            <option value="<?php echo $fetprovince['province_name']; ?>"><?php echo $fetprovince['province_name']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <span style="color: red; font-weight: bold;">ข้อมูลผลการเรียน 2 ปีการศึกษา (ชั้น ป.4 และ ป.5)</span><br>
                      <label class="col-md-8 col-sm-8 col-form-label">ผลการเรียนเฉลี่ยรวมทุกรายวิชา</label>
                      <div class="col-md-8 col-sm-8">
                        <input name="grade1" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-8 col-sm-8 col-form-label">ผลการเรียนเฉลี่ยวิชาคณิตศาสตร์พื้นฐาน</label>
                      <div class="col-md-8 col-sm-8">
                        <input name="grade2" class="form-control" type="text" required>
                      </div>
                      <label class="col-md-8 col-sm-8 col-form-label">ผลการเรียนเฉลี่ยวิชาวิทยาศาสตร์และเทคโนโลยีพื้นฐาน</label>
                      <div class="col-md-8 col-sm-8">
                        <input name="grade3" class="form-control" type="text" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <span style="color: red; font-weight: bold;">*ให้ผู้สมัครเลือกลำดับแผนการเรียนที่ต้องการศึกษาต่อชั้น ม.1</span><br>
                      <span style="color: red;">*เรียงลำดับที่ต้องการจะเรียน มากที่สุด</span><br>
                      <label class="col-md-8 col-sm-8 col-form-label">แผนการเรียน ลำดับที่ 1</label>
                      <div class="col-md-8 col-sm-8">
                        <select class="form-control" name="group1" id="group1-required" required>
                          <option value="">เลือกแผนการเรียนลำดับที่ 1</option>
                          <option value="1">ห้องเรียนปกติ</option>
                          <option value="2">SMART YRC</option>
                        </select>
                      </div>
                      <label class="col-md-8 col-sm-8 col-form-label">แผนการเรียน ลำดับที่ 2</label>
                      <div class="col-md-8 col-sm-8">
                        <select class="form-control" name="group2">
                          <option value="">เลือกแผนการเรียนลำดับที่ 2</option>
                          <option value="1">ห้องเรียนปกติ</option>
                          <option value="2">SMART YRC</option>
                        </select>
                      </div>
                    </div>
                      <div class="col-md-12 col-sm-12">
                    <input type="checkbox" name="checkbox" id="" required> ตรวจสอบข้อมูลให้ถูกต้อง ก่อนบันทึกข้อมูล</label>
                      </div>
                      <br/>
                    <!-- <input type="hidden" id="level" name="level" value="1">
                    <button name="add_register" type="submit" class="btn btn-primary btn-sm">บันทึกข้อมูล</button> -->
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