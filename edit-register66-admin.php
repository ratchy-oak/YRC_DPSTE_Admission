<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../login.php');
  exit();
}
date_default_timezone_set('Asia/Bangkok');

$u_id = $_GET['u_id'];
$s_user = "SELECT * FROM users WHERE u_id=$u_id";
$result_user = mysqli_query($conn, $s_user);
$fet_user = mysqli_fetch_array($result_user);

$sqlid_re = "select * from `register` where u_id = '$u_id' limit 1";
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
            <h1 class="h4 mb-2 text-gray-800">สมัครคัดเลือกเข้าเรียนโครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ปีการศึกษา 2567</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">แก้ไขข้อมูล</h6>
              </div>
              <div class="card-body">
                <!-- begin col-6 -->

                <form action="./process/edit_register66_admin.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="register-form">
                  <div class="form-group">
                    <div class="col-xl-12">
                      <div class="col-xl-6">
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>คำนำหน้าชื่อ </strong><span style="color: red; font-weight: bold;">*</span></strong></label>
                        <div class="col-md-12 col-sm-12">
                          <select class="form-control" name="title" id="title-required" required>
                            <option value="เด็กชาย" <?php if ($fetid_re['title'] === "เด็กชาย") { ?>selected<?php } ?>>เด็กชาย</option>
                            <option value="เด็กหญิง" <?php if ($fetid_re['title'] === "เด็กหญิง") { ?>selected<?php } ?>>เด็กหญิง</option>
                            <option value="นาย" <?php if ($fetid_re['title'] === "นาย") { ?>selected<?php } ?>>นาย</option>
                            <option value="นางสาว" <?php if ($fetid_re['title'] === "นางสาว") { ?>selected<?php } ?>>นางสาว</option>
                          </select>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>ชื่อ </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="name" class="form-control" type="text" value="<?php echo $fetid_re['name']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>สกุล </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="surname" class="form-control" type="text" value="<?php echo $fetid_re['surname']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>เลขประจำตัวประชาชน </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="idperson" class="form-control" type="tel" pattern="[0-9]{13}" value="<?php echo $fetid_re['idperson']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>บ้านเลขที่ </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="address" class="form-control" type="text" value="<?php echo $fetid_re['address']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>ถนน</strong></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="road" class="form-control" type="text" value="<?php echo $fetid_re['road']; ?>">
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>ซอย</strong></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="soi" class="form-control" type="text" value="<?php echo $fetid_re['soi']; ?>">
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>หมู่ที่</strong></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="mu" class="form-control" type="text" value="<?php echo $fetid_re['mu']; ?>">
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>ตำบล/แขวง </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="tumbon" class="form-control" type="text" value="<?php echo $fetid_re['tumbon']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>อำเภอ/เขต </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="amphor" class="form-control" type="text" value="<?php echo $fetid_re['amphor']; ?>" required>
                        </div>
                        <?php
                        $sqlprovince = "select province_id, province_name from `province`";
                        $resultprovince = mysqli_query($conn, $sqlprovince);
                        ?>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>จังหวัด </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <select class="form-control" name="province" id="province-required" required>
                            <?php
                            while ($fetprovince = mysqli_fetch_array($resultprovince)) {
                            ?>

                              <option value="<?php echo $fetprovince['province_name']; ?>" <?php if ($fetid_re['province'] == $fetprovince['province_name']) { ?>selected<?php } ?>><?php echo $fetprovince['province_name']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>รหัสไปรษณีย์ </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="zipcode" class="form-control" type="text" value="<?php echo $fetid_re['zipcode']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>E-mail address </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="email" class="form-control" type="email" value="<?php echo $fetid_re['email']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>เบอร์โทรศัพท์มือถือ (นักเรียน) </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="telephone" class="form-control" type="text" value="<?php echo $fetid_re['telephone']; ?>" required>
                        </div>
                        <label class="col-md-12 col-sm-12 col-form-label"><strong>เบอร์โทรศัพท์มือถือ (ผู้ปกครอง) </strong><span style="color: red; font-weight: bold;">*</span></label>
                        <div class="col-md-12 col-sm-12">
                          <input name="telephone2" class="form-control" type="tel" value="<?php echo $fetid_re['telephone2']; ?>" required>
                        </div>
                      </div>
                      <div class="col-xl-12 mb-3">
                        <div class="row">
                          <div class="col-xl-6">
                            <label class="col-md-12 col-sm-12 col-form-label"><strong>โรงเรียน </strong><span style="color: red; font-weight: bold;">*</span></label>
                            <div class="col-md-12 col-sm-12">
                              <input name="school" class="form-control" type="text" value="<?php echo $fetid_re['school']; ?>" required>
                            </div>
                          </div>
                          <div class="col-xl-4">
                            <?php
                            $sqlprovince = "select province_id, province_name from `province`";
                            $resultprovince = mysqli_query($conn, $sqlprovince);
                            ?>
                            <label class="col-md-12 col-sm-12 col-form-label"><strong>จังหวัด </strong><span style="color: red; font-weight: bold;">*</span></label>
                            <div class="col-md-12 col-sm-12">
                              <select class="form-control" name="school_province" id="province-required" required>
                                <option value="" selected>เลือกจังหวัด</option>
                                <?php
                                while ($fetprovince = mysqli_fetch_array($resultprovince)) {
                                ?>

                                  <option value="<?php echo $fetprovince['province_name']; ?>" <?php if ($fetid_re['school_province'] == $fetprovince['province_name']) { ?>selected<?php } ?>><?php echo $fetprovince['province_name']; ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group">
                          <span style="color: red; font-weight: bold;">ผลการเรียนเฉลี่ยสะสม 5 ภาคเรียน (ชั้น ม.1 ม.2 และ ม.3 ภาคเรียนที่ 1)</span><br>
                          <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนสะสมทุกรายวิชา (5 ภาคเรียน) <span style="color: red; font-weight: bold;">*</span></label>
                          <div class="col-md-3 col-sm-3">
                            <input name="grade1" class="form-control" type="text" value="<?php echo $fetid_re['grade1']; ?>" required>
                          </div>
                          <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนสะสมรายวิชาพื้นฐานทุกรายวิชาของกลุ่มสาระการเรียนรู้คณิตศาสตร์ (5 ภาคเรียน) <span style="color: red; font-weight: bold;">*</span></label>
                          <div class="col-md-3 col-sm-3">
                            <input name="grade2" class="form-control" type="text" value="<?php echo $fetid_re['grade2']; ?>" required>
                          </div>
                          <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนสะสมรายวิชาพื้นฐานทุกรายวิชาของกลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยีพื้นฐาน (5 ภาคเรียน) <span style="color: red; font-weight: bold;">*</span></label>
                          <div class="col-md-3 col-sm-3">
                            <input name="grade3" class="form-control" type="text" value="<?php echo $fetid_re['grade3']; ?>" required>
                          </div>
                          <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนสะสมรายวิชาพื้นฐานทุกรายวิชาของกลุ่มสาระการเรียนรู้ภาษาต่างประเทศ (ภาษาอังกฤษ) (5 ภาคเรียน) <span style="color: red; font-weight: bold;">*</span></label>
                          <div class="col-md-3 col-sm-3">
                            <input name="grade4" class="form-control" type="text" value="<?php echo $fetid_re['grade4']; ?>" required>
                          </div>
                          <br />
                          <div class="mb-3">
                              <span style="color: red; font-weight: bold;">ตามประกาศผลการสอบคัดเลือกนักเรียนเข้าโครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ระดับมัธยมศึกษาตอนปลาย ประจำปีการศึกษา 2567 รอบที่ 1</span><br>
                              <label class="col-md-12 col-sm-12 col-form-label">รายชื่อข้าพเจ้าอยู่ลำดับที่ <span style="color: red; font-weight: bold;">*</span></label>
                              <div class="col-md-3 col-sm-3">
                                  <input name="sequence" class="form-control" type="text" value="<?php echo $fetid_re['sequence']; ?>" required>
                              </div>
                          </div>
                          <?php
                          if ($fetid_re['evi_1'] != "") { ?>
                            <label class="col-md-10 col-sm-10 col-form-label">รูปใบสมัครเดิม</label>
                            <a href="upload/<?php echo $u_id; ?>/<?php echo $fetid_re['evi_1']; ?>" class="btn btn-success" target="_blank"><?php echo $fetid_re['evi_1']; ?></a><br />
                          <?php } ?>
                          <label class="col-md-12 col-sm-12 col-form-label"><strong>แนบใบสมัคร <span style="color: red; font-weight: bold;">* ถ้าไม่เปลี่ยนแปลง ไม่ต้องอัพโหลดใหม่ ไฟล์รูปแบบ .pdf หรือ .jpeg หรือ .png</span></strong></label>

                          <div class="container">
                            <input type="file" name="application_paper" accept="file_extension">
                          </div>
                          <?php
                          if ($fetid_re['evi_2'] != "") { ?>
                            <label class="col-md-10 col-sm-10 col-form-label">สำเนาบัตรประชาชนเดิม</label>
                            <a href="upload/<?php echo $u_id; ?>/<?php echo $fetid_re['evi_2']; ?>" class="btn btn-success" target="_blank"><?php echo $fetid_re['evi_2']; ?></a><br />
                          <?php } ?>
                          <label class="col-md-12 col-sm-12 col-form-label"><strong>แนบสำเนาบัตรประชาชนพร้อมรับรองสำเนา <span style="color: red; font-weight: bold;">* ถ้าไม่เปลี่ยนแปลง ไม่ต้องอัพโหลดใหม่ ไฟล์รูปแบบ .pdf หรือ .jpeg หรือ .png</span></strong></label>

                          <div class="container">
                            <input type="file" name="id_card" accept="file_extension">
                          </div>
                          <?php
                          if ($fetid_re['evi_3'] != "") { ?>
                            <label class="col-md-10 col-sm-10 col-form-label">รูปถ่ายสีในรูปเครื่องแบบนักเรียนเดิม</label>
                            <a href="upload/<?php echo $u_id; ?>/<?php echo $fetid_re['evi_3']; ?>" class="btn btn-success" target="_blank"><?php echo $fetid_re['evi_3']; ?></a><br />
                          <?php } ?>
                          <label class="col-md-12 col-sm-12 col-form-label"><strong>รูปถ่ายสีในรูปเครื่องแบบนักเรียน <span style="color: red; font-weight: bold;">* ถ้าไม่เปลี่ยนแปลง ไม่ต้องอัพโหลดใหม่ ไฟล์รูปแบบ .jpeg หรือ .png</span></strong></label>

                          <div class="container">
                            <input type="file" name="blue_pic" accept="file_extension">
                          </div>

                          <?php
                          $evi_4 = explode("#", $fetid_re['evi_4']);
                          $i = 0;
                          foreach ($evi_4 as $e4) {
                            ++$i;
                            if ($e4) {
                          ?>
                              <label class="col-md-10 col-sm-10 col-form-label">เอกสารแสดงผลการเรียน 5 ภาคเรียนเดิม #<?php echo $i; ?></label>
                              <a href="upload/<?php echo $u_id; ?>/<?php echo $e4; ?>" class="mt-1 btn btn-success" target="_blank"><?php echo $e4; ?></a><br />
                          <?php }
                          } ?>
                          <label class="col-md-12 col-sm-12 col-form-label"><strong>เอกสารแสดงผลการเรียน 5 ภาคเรียน <span style="color: red; font-weight: bold;">* ถ้าไม่เปลี่ยนแปลง ไม่ต้องอัพโหลดใหม่ ใส่ได้หลายไฟล์ ไฟล์รูปแบบ .pdf หรือ .jpeg หรือ .png</span></strong></label>
                          <div class="container">
                            <input type="file" id="grade_pic" name="grade_pic[]" multiple="multiple">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <input type="checkbox" name="checkbox" id="" required> ตรวจสอบข้อมูลให้ถูกต้อง ก่อนแก้ไขข้อมูล</label>
                      </div>
                      <br />
                      <input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
                      <button name="edit_register_admin" type="submit" class="btn btn-primary btn-sm">แก้ไขข้อมูล</button>
                    </div>
                </form>


              </div>
            </div>

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; 2024 Yupparaj Wittayalai School</span>
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