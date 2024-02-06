<?php
include './connection/config.inc.php';
if (isset($_SESSION['loggedin'])) {
  session_unset();
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่" />
  <meta name="author" content="โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่" />

  <title>
    :: ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่ ::
  </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;500&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="img/dpstelogo.png" style="width: 100%" class="mb-3">
                    <h1 class="h4 text-pink-900">
                      <b>ระบบรับสมัครคัดเลือก<br />ชั้น ม.4 ประจำปีการศึกษา 2567<br />โครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ)<br />
                        ศูนย์โรงเรียนยุพราชวิทยาลัย
                      </b>
                      <br />
                      <b style="color: blue;">(รอบที่ 2)</b>
                    </h1>
                    <p style="color: green; font-size: 0.95rem;" class="mb-1">&#128181; <b>เปิดระบบ วันพุธที่ 7 กุมภาพันธ์ พ.ศ. 2567 เวลา 08.30 น.</b><br />
                    <p style="color: red; font-size: 0.95rem;" class="mb-1">&#128181; <b>ปิดระบบ วันอาทิตย์ที่ 11 กุมภาพันธ์ พ.ศ. 2567 เวลา 16.30 น.</b></p>
                    <br>
                    <a href="https://www.facebook.com/DPST.DPSTE.YRC" target="_blank" style="color: blue; font-size: 1rem;"><b>&#128073; เพจโครงการพสวท. และ พสวท. สู่ความเป็นเลิศ <br>ศูนย์โรงเรียนยุพราชวิทยาลัย</b></a>
                    <p class="mt-4"><b>เข้าสู่ระบบ</b></p>

                  </div>
                  <?php
                  isset($_GET['action']) ? ($action = $_GET['action']) : ($action = '');
                  if ($action == 'error') { ?>
                    <div class="small alert alert-danger fade show">
                      <span class="close" data-dismiss="alert">×</span>
                      <strong>เกิดข้อผิดพลาด!</strong><br />
                      เข้าสู่ระบบไม่สำเร็จ username หรือ password ไม่ถูกต้อง!!
                    </div>
                  <?php }
                  if ($action == 'success') { ?>
                    <div class="small alert alert-success fade show">
                      <span class="close" data-dismiss="alert">×</span>
                      <strong>ลงทะเบียน!</strong><br />
                      เรียบร้อย สามารถเข้าสู่ระบบได้!!
                    </div>
                  <?php }
                  if ($action == 'new-password-success') { ?>
                    <div class="small alert alert-success fade show">
                      <span class="close" data-dismiss="alert">×</span>
                      <strong>แก้ไขรหัสผ่าน!</strong><br />
                      เรียบร้อย สามารถเข้าสู่ระบบได้!!
                    </div>
                  <?php }
                  if ($action == 'error1') { ?>
                    <div class="small alert alert-warning fade show">
                      <span class="close" data-dismiss="alert">×</span>
                      <strong>เข้าสู่ระบบไม่สำเร็จ!</strong><br />
                      ติดต่อ ผู้ดูแลระบบ ได้ที่ เพจงานรับนักเรียนโรงเรียนยุพราชวิทยาลัย
                    </div>
                  <?php }
                  ?>
                  <!-- <div class="small alert alert-success fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>เปิดระบบพิมพ์บัตรประจำตัวสอบ</strong>
                  </div> -->
                  <form action="process/p_login.php" method="POST">
                    <div class="form-group">
                      <input type="tel" class="form-control form-control-user" id="InputUser" name="username" placeholder="เลขประจำตัวประชาชน" required />
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="InputPassword" name="pass" placeholder="รหัสผ่าน" required />
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" value="Submit">เข้าสู่ระบบ</button>
                  </form>
                  <hr />
                  <div class="text-center">
                    <a class="btn btn-warning btn-user btn-block" href="forgot-password.php"><i class="fas fa-key"></i> ลืมรหัสผ่าน</a>
                  </div>
                  <div class="text-center">
                    <a class="btn btn-success btn-user btn-block mt-1" href="register.php"><i class="fas fa-user-edit"></i> ลงทะเบียน</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>