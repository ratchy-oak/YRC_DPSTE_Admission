<?php
include './connection/config.inc.php';
if (isset($_SESSION['loggedin'])) {
  session_unset();
  session_destroy();
}
//เช็คเปิดปิด ระบบ login
$sql_se = "select se_value from settings where se_id = '1' ";
$result_se = mysqli_query($conn, $sql_se);
$fet_se = mysqli_fetch_array($result_se);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่"
    />
    <meta name="author" content="โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่" />

    <title>
      :: ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่ ::
    </title>

    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;500&display=swap"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />
  </head>

  <body class="bg-gray-200">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-pink-900 mb-2">
                        ลืมรหัสผ่าน?
                      </h1>
                      <p class="mb-4">
                        ลืมรหัสผ่าน สามารถใส่ username ได้ลงทะเบียนไว้
                        เพื่อทำการรีเซ็ตรหัสผ่าน
                      </p>
                    </div>
                    <?php
                     if($fet_se['se_value'] == '1'){
              isset($_GET['action']) ? ($action = $_GET['action']) : ($action = '');
              if ($action == 'error1') { ?>
              <div class="small alert alert-danger fade show">
                <span class="close" data-dismiss="alert">×</span>
                <strong>เกิดข้อผิดพลาด!</strong><br />
                กรุณากรอก Username อีกครั้ง
              </div>
              <?php }elseif($action == 'error2') { ?>
              <div class="small alert alert-danger fade show">
                <span class="close" data-dismiss="alert">×</span>
                <strong>เกิดข้อผิดพลาด!</strong><br />
                ไม่พบ username นี้ในระบบ
              </div>
              <?php }elseif($action == 'error3') { ?>
              <div class="small alert alert-danger fade show">
                <span class="close" data-dismiss="alert">×</span>
                <strong>เกิดข้อผิดพลาด!</strong><br />
                Username ถูกใช้ลงทะเบียนแล้ว
              </div>
              <?php }elseif($action == 'error4') { ?>
              <div class="small alert alert-danger fade show">
                <span class="close" data-dismiss="alert">×</span>
                <strong>เกิดข้อผิดพลาด!</strong><br />
                รหัสผ่านไม่เหมือนกัน
              </div>
              <?php }elseif($action == 'error'){?>
              <div class="small alert alert-danger fade show">
                <span class="close" data-dismiss="alert">×</span>
                <strong>เกิดข้อผิดพลาด!</strong><br />
                ไม่สามารถบันทึกข้อมูลได้
              </div>
              <?php }?>
                    <form action="process/check_user.php" method="post">
                      <div class="form-group">
                        <input
                          name="username"
                          type="text"
                          class="form-control form-control-user"
                          id="InputUser"
                          placeholder="username"
                          required
                        />
                      </div>

                      <button
                      name="check_user"
                        class="btn btn-primary btn-user btn-block"
                        type="submit"
                        value="Submit"
                      ><i class="fas fa-search"></i> 
                        ตรวจสอบข้อมูล
                      </button>
                    </form>
                    <?php
                     }
                     ?>
                    <hr />
                    <div class="text-center">
                    <a class="btn btn-success btn-user btn-block mt-1" href="login.php"><i class="fas fa-home"></i> กลับหน้าแรก</a>
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
