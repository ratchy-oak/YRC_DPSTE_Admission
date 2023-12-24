<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: login.php');
  exit();
}
$sqlid_re = "select * from `register` where s_check = '1' order by id desc";
$resultid_re = mysqli_query($conn, $sqlid_re);
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

    <?php include("includes/sidebar.php"); ?>

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
            <h1 class="h4 mb-2 text-gray-800">ข้อมูลการสมัครคัดเลือกเข้าเรียนโครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ปีการศึกษา 2567 (ยืนยันข้อมูล)</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ข้อมูล</h6>
              </div>
              <div class="card-body">
                <?php
                isset($_GET['action2']) ? ($action2 = $_GET['action2']) : ($action2 = '');
                if ($action2 == 'success') { ?>
                  <div class="alert alert-success fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>บันทึกข้อมูลสำเร็จ!</strong>
                  </div>
                <?php } elseif ($action2 == 'error') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>บันทึกข้อมูลไม่สำเร็จ!</strong>
                  </div>
                <?php
                } elseif ($action2 == 'error2') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>ได้ซื้อระเบียบการไปแล้ว ยกเลิกการสั่งซื้อระเบียบการก่อนจะซื้อใหม่!</strong>
                  </div>
                <?php
                } elseif ($action2 == 'error4') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>ไม่พบข้อมูลการชำระเงิน</strong>
                  </div>
                <?php
                }
                ?>
                <a href="report_excel_m4.php" target="_blank" class="btn btn-primary btn-sm">export excel ม.4</a>
                <div class="table-responsive mt-2">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ที่</th>
                        <th>เลขประจำตัวสอบ</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>โรงเรียน</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>เบอร์โทรศัพท์ผู้ปกครอง</th>
                        <th>วันที่ยืนยัน</th>
                        <th>ตรวจสอบข้อมูล</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      while ($fetid_re = mysqli_fetch_array($resultid_re)) {
                        //หลักฐาน
                        $i++;
                      ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $fetid_re['idregister']; ?></td>
                          <td><?php echo $fetid_re['title'] . $fetid_re['name'] . "&nbsp;&nbsp;&nbsp;" . $fetid_re['surname']; ?>&nbsp;&nbsp;<?php if ($fetid_re['s_check'] == "1") { ?><a href="#" class="btn btn-success btn-sm">คุณสมบัติผ่าน</a><?php } ?></td>
                          <td><?php echo $fetid_re['school']; ?></td>
                          <td><?php echo $fetid_re['telephone']; ?></td>
                          <td><?php echo $fetid_re['telephone2']; ?></td>
                          <td>
                            <span class="text-primary"><?php echo convert_date_func($fetid_re['updated'], "digit", "datetime"); ?>
                          </td>
                          <td><a href="check-data-m4.php?s_id=<?php echo $fetid_re['u_id']; ?>" class="btn btn-warning btn-sm">ดูข้อมูล</a></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>