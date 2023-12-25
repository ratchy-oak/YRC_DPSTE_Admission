<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

$sqlid = "select u_id from `register` where u_id = '$_SESSION[id]'";
$resultid = mysqli_query($conn, $sqlid);
$numid = mysqli_num_rows($resultid);
if ($numid != 0) {
    header('Location: register.php');
    exit();
}
$s_user = "SELECT * FROM users WHERE u_id=$_SESSION[id]";
$result_user = mysqli_query($conn, $s_user);
$fet_user = mysqli_fetch_array($result_user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: ระบบรับสมัครนักเรียนออนไลน์ โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่ ::</title>

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
                                <?php } elseif ($action == 'uploadError1') { ?>
                                    <div class="alert alert-danger fade show">
                                        <span class="close" data-dismiss="alert">×</span>
                                        <strong>รูปถ่าย ใช้ไฟล์นามสกุล .jpeg .jpg เท่านั้น!</strong>
                                    </div>
                                <?php
                                } elseif ($action == 'uploadError2') { ?>
                                    <div class="alert alert-danger fade show">
                                        <span class="close" data-dismiss="alert">×</span>
                                        <strong>บันทึกข้อมูลไม่สำเร็จ !!</strong>
                                    </div>
                                <?php
                                } elseif ($action == 'uploadError3') { ?>
                                    <div class="alert alert-danger fade show">
                                        <span class="close" data-dismiss="alert">×</span>
                                        <strong>บันทึกข้อมูลไม่สำเร็จ !!</strong>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- begin col-6 -->

                                <form method="POST" action="./process/add-application.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="col-xl-6">
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>คำนำหน้าชื่อ </strong><span style="color: red; font-weight: bold;">*</span></strong></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" name="title" id="title-required" required>
                                                    <option value="">เลือกคำนำหน้าชื่อ</option>
                                                    <option value="เด็กชาย">เด็กชาย</option>
                                                    <option value="เด็กหญิง">เด็กหญิง</option>
                                                    <option value="นาย">นาย</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                </select>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>ชื่อ </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="name" class="form-control" type="text" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>สกุล </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="surname" class="form-control" type="text" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>เลขประจำตัวประชาชน </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="idperson" class="form-control" type="tel" pattern="[0-9]{13}" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>บ้านเลขที่ </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="address" class="form-control" type="text" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>ถนน</strong></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="road" class="form-control" type="text">
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>ซอย</strong></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="soi" class="form-control" type="text">
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>หมู่ที่</strong></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="mu" class="form-control" type="text">
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>ตำบล/แขวง </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="tumbon" class="form-control" type="text" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>อำเภอ/เขต </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="amphor" class="form-control" type="text" required>
                                            </div>
                                            <?php
                                            $sqlprovince = "select province_id, province_name from `province`";
                                            $resultprovince = mysqli_query($conn, $sqlprovince);
                                            ?>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>จังหวัด </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" name="province" id="province-required" required>
                                                    <option value="" selected>เลือกจังหวัด</option>
                                                    <?php
                                                    while ($fetprovince = mysqli_fetch_array($resultprovince)) {
                                                    ?>
                                                        <option value="<?php echo $fetprovince['province_name']; ?>"><?php echo $fetprovince['province_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>รหัสไปรษณีย์ </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="zipcode" class="form-control" type="text" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>E-mail address </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="email" class="form-control" type="email" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>เบอร์โทรศัพท์มือถือ (นักเรียน) </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="telephone" class="form-control" type="text" required>
                                            </div>
                                            <label class="col-md-12 col-sm-12 col-form-label"><strong>เบอร์โทรศัพท์มือถือ (ผู้ปกครอง) </strong><span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input name="telephone2" class="form-control" type="tel" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label class="col-md-12 col-sm-12 col-form-label"><strong>โรงเรียน </strong><span style="color: red; font-weight: bold;">*</span></label>
                                                    <div class="col-md-12 col-sm-12">
                                                        <input name="school" class="form-control" type="text" required>
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
                                                                <option value="<?php echo $fetprovince['province_name']; ?>"><?php echo $fetprovince['province_name']; ?></option>
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
                                                <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนเฉลี่ยสะสมทุกรายวิชา 5 ภาคเรียน <span style="color: red; font-weight: bold;">*</span></label>
                                                <div class="col-md-3 col-sm-3">
                                                    <input name="grade1" class="form-control" type="text" required>
                                                </div>
                                                <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนเฉลี่ยสะสมรายวิชาคณิตศาสตร์พื้นฐาน 5 ภาคเรียน <span style="color: red; font-weight: bold;">*</span></label>
                                                <div class="col-md-3 col-sm-3">
                                                    <input name="grade2" class="form-control" type="text" required>
                                                </div>
                                                <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนเฉลี่ยสะสมรายวิชาวิทยาศาสตร์และเทคโนโลยีพื้นฐาน 5 ภาคเรียน <span style="color: red; font-weight: bold;">*</span></label>
                                                <div class="col-md-3 col-sm-3">
                                                    <input name="grade3" class="form-control" type="text" required>
                                                </div>
                                                <label class="col-md-12 col-sm-12 col-form-label">ผลการเรียนเฉลี่ยสะสมรายวิชาภาษาอังกฤษพื้นฐาน 5 ภาคเรียน <span style="color: red; font-weight: bold;">*</span></label>
                                                <div class="col-md-3 col-sm-3">
                                                    <input name="grade4" class="form-control" type="text" required>
                                                </div>
                                                <div class="mt-3">
                                                    <span style="color: red; font-weight: bold;">ตามประกาศผลการสอบคัดเลือกนักเรียนเข้าโครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ระดับมัธยมศึกษาตอนปลาย ประจำปีการศึกษา 2567 รอบที่ 1</span><br>
                                                    <label class="col-md-12 col-sm-12 col-form-label">รายชื่อข้าพเจ้าอยู่ลำดับที่ <span style="color: red; font-weight: bold;">*</span></label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input name="sequence" class="form-control" type="text" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label class="col-md-12 col-sm-12 col-form-label"><strong>แนบใบสมัคร <span style="color: red; font-weight: bold;">* ไฟล์รูปแบบ .pdf หรือ .jpeg หรือ .png</span></strong></label>
                                                <div class="container">
                                                    <input type="file" name="application_paper" accept="file_extension" required>
                                                </div>
                                                <label class="col-md-12 col-sm-12 col-form-label"><strong>แนบสำเนาบัตรประชาชนพร้อมรับรองสำเนา <span style="color: red; font-weight: bold;">* ไฟล์รูปแบบ .pdf หรือ .jpeg หรือ .png</span></strong></label>
                                                <div class="container">
                                                    <input type="file" name="id_card" accept="file_extension" required>
                                                </div>
                                                <label class="col-md-12 col-sm-12 col-form-label"><strong>รูปถ่ายสีในรูปเครื่องแบบนักเรียน <span style="color: red; font-weight: bold;">* ไฟล์รูปแบบ .jpeg หรือ .png</span></strong></label>
                                                <div class="container">
                                                    <input type="file" name="blue_pic" accept="file_extension" required>
                                                </div>
                                                <label class="col-md-12 col-sm-12 col-form-label"><strong>เอกสารแสดงผลการเรียน 5 ภาคเรียน <span style="color: red; font-weight: bold;">* ใส่ได้หลายไฟล์ ไฟล์รูปแบบ .pdf หรือ .jpeg หรือ .png</span></strong></label>
                                                <div class="container">
                                                    <input type="file" id="grade_pic" name="grade_pic[]" multiple="multiple" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <input type="checkbox" name="checkbox" id="" required> ตรวจสอบข้อมูลให้ถูกต้อง ก่อนบันทึกข้อมูล <span style="color: red; font-weight: bold;">*</span></label>
                                            <div class="mt-3">
                                                <button type="submit" name="approve_application" class="btn" style="background-color: #F13596;color: white;">ยืนยันการสมัครคัดเลือก</button>
                                            </div>
                                        </div>
                                    </div>
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
                        <span>Copyright &copy; 2024 Yupparaj Wittayalai School</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>