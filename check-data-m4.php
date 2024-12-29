<?php
include './connection/config.inc.php';
include './includes/function.php';
if (!isset($_SESSION['loggedin']) and $_SESSION['permission'] != '2') {
  header('Location: ../login.php');
  exit();
}
$sid = $_GET['s_id'];
$sqlid_re = "select * from `register` where u_id = '$sid' LIMIT 1";
$resultid_re = mysqli_query($conn, $sqlid_re);
$fetid_re = mysqli_fetch_array($resultid_re);
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
            <h1 class="h3 mb-2 text-gray-800">ข้อมูลการสมัครคัดเลือกเข้าเรียนโครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ปีการศึกษา 2568<br />ของ <?php echo $fetid_re['title'] . $fetid_re['name'] . "&nbsp;&nbsp;&nbsp;" . $fetid_re['surname']; ?></h1>
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
                  <div class="alert alert-success fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>แก้ไขข้อมูลสำเร็จ!</strong>
                  </div>
                <?php } elseif ($action == 'error') { ?>
                  <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <strong>บันทึกข้อมูลไม่สำเร็จ!</strong>
                  </div>
                <?php
                } ?>
                <?php
                if ($fetid_re['comment'] != "") {
                ?>
                  <div class="alert alert-danger fade show">
                    <strong><u>แจ้งเตือนการอัพโหลดเอกสาร</u></strong>
                    <p style="margin-top: 5px;">
                      <?php
                      echo $fetid_re['comment'];
                      ?>
                    </p>
                  </div>
                <?php } elseif ($fetid_re['s_check'] == "1") { ?>
                  <div class="alert alert-success fade show">
                    <strong><u>แจ้งเตือนการอัพโหลดเอกสาร</u></strong>
                    <p style="margin-top: 5px;">
                      <?php
                      echo "เอกสารครบถ้วน การสมัครสมบูรณ์<br>";
                      echo "<a href='https://www.facebook.com/DPST.DPSTE.YRC' target='_blank' style='color: blue;'><b>เพจโครงการพสวท. และ พสวท. สู่ความเป็นเลิศ ศูนย์โรงเรียนยุพราชวิทยาลัย</b></a>";
                      ?>
                    </p>
                  </div>
                <?php
                }
                ?>
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ข้อมูลผู้สม้คร</th>
                        <th>เอกสารหลักฐาน</th>
                        <th>ยืนยันการสมัคร</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="20%">
                          <!-- <?php if ($fetid_re['s_check'] == "1") { ?>
                            <a class="nav-link" href="print4-66-admin.php?idstudent=<?php echo $fetid_re['idregister']; ?>">
                              <button class="btn btn-success" style="color: white;">
                                <span>พิมพ์บัตรประจำตัวสอบ</span>
                              </button>
                            </a>
                          <?php } ?> -->
                          <span class="text-primary"><u style="font-size: 0.9rem; font-weight: bold;">วันที่สมัคร:</u> <?php echo convert_date_func($fetid_re['datet'], "digit", "datetime"); ?></span><br>
                          <!-- <span class="text-primary"><u style="font-size: 0.9rem; font-weight: bold;">เลขประจำตัวสอบ:</u> <?php echo ($fetid_re['s_check'] == '0' && $fetid_re['idregister'] == '0') ? "-" : $fetid_re['idregister']; ?></span><br> -->
                          <span style="color: green;"><u style="font-size: 0.9rem; font-weight: bold;">ข้อมูลส่วนตัว</u></span>
                          <p style="font-size: 0.9rem; padding-top:6px; margin:0;"><?php echo $fetid_re['title'] . $fetid_re['name'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $fetid_re['surname']; ?></p>
                          <p style="font-size: 0.9rem; padding-top:6px; margin:0;">โรงเรียน: <?php echo $fetid_re['school']; ?></p>
                          <br>
                          <span style="color: green;"><u style="font-weight: bold;">แผนการเรียน</u></span>
                          <p style="padding-top:6px; margin:0;">โครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ)<br />ศูนย์โรงเรียนยุพราชวิทยาลัย
                            <br />
                            <br />
                            <span style="color: green;"><u style="font-weight: bold;">ผลการเรียนเฉลี่ยสะสม 5 ภาคเรียน<br />(ชั้น ม.1 ม.2 และ ม.3 ภาคเรียนที่ 1)</u></span>
                            <br>
                          <p style="padding-top:6px; margin:0;">ผลการเรียนเฉลี่ยสะสมทุกรายวิชา: <?php echo $fetid_re['grade1']; ?></p>
                          <p style="padding-top:6px; margin:0;">ผลการเรียนเฉลี่ยสะสมรายวิชาพื้นฐานทุกรายวิชาของกลุ่มสาระการเรียนรู้คณิตศาสตร์: <?php echo $fetid_re['grade2']; ?></p>
                          <p style="padding-top:6px; margin:0;">ผลการเรียนเฉลี่ยสะสมรายวิชาพื้นฐานทุกรายวิชาของกลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี: <?php echo $fetid_re['grade3']; ?></p>
                          <p style="padding-top:6px; margin:0;">ผลการเรียนเฉลี่ยสะสมรายวิชาพื้นฐานทุกรายวิชาของกลุ่มสาระการเรียนรู้ภาษาต่างประเทศ (ภาษาอังกฤษ): <?php echo $fetid_re['grade4']; ?></p>
                          <br />
                            <span style="color: green;"><u style="font-weight: bold;">ตามประกาศผลการสอบคัดเลือกนักเรียนเข้าโครงการห้องเรียน พสวท. (สู่ความเป็นเลิศ) ระดับมัธยมศึกษาตอนปลาย ประจำปีการศึกษา 2568 รอบที่ 1</u></span>
                            <br>
                            <p style="padding-top:6px; margin:0;">รายชื่อข้าพเจ้าอยู่ลำดับที่: <?php echo $fetid_re['sequence']; ?></p>
                          <br>


                          <span style="font-size: 0.9rem; color: green; font-weight: bold;">โทรศัพท์ที่ติดต่อได้</span>
                          <p style="font-size: 0.9rem; padding-top:6px; margin:0;">โทรศัพท์นักเรียน: <?php echo $fetid_re['telephone']; ?></p>
                          <p style="font-size: 0.9rem; padding-top:6px; margin:0;">โทรศัพท์ผู้ปกครอง: <?php echo $fetid_re['telephone2']; ?></p><br>
                          <p><strong>แจ้งข้อความ:</strong></p>
                          <form action="./process/add_comment1.php" method="post" name="comment-form">

                            <textarea name="content" id="editor" class="editor"><?php echo $fetid_re['comment']; ?></textarea>
                            <br>
                            <input type="hidden" id="s_id" name="s_id" value="<?php echo $sid; ?>">
                            <button name="add_comment" type="submit" class="btn btn-primary btn-sm">บันทึก</button>
                          </form>
                        </td>
                        <td>
                          <span style="color: green;"><u style="font-weight: bold;">หลักฐานการสมัคร</u><br>
                            <p style="color: green; font-size: 0.95rem;" class="mb-1">&#128181; <b>เปิดระบบ วันศุกร์ที่ 20 ธันวาคม พ.ศ. 2567 เวลา 08.30 น.</b><br />
                            <p style="color: red; font-size: 0.95rem;" class="mb-1">&#128181; <b>ปิดระบบ วันศุกร์ที่ 10 มกราคม พ.ศ. 2568 เวลา 16.30 น.</b></p>
                            <table class="table table-bordered" width="100%" cellspacing="0">
                              <tr>
                                <td width="200">
                                  รูปถ่ายสีในรูปเครื่องแบบนักเรียน<br>
                                </td>
                                <td>
                                  <?php
                                  if ($fetid_re['evi_3'] != "0") { ?>
                                    <a href="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_3']; ?>" target="_blank"><img width="150" class="img-fluid" src="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_3']; ?>" alt=""></a>
                                  <?php } ?>
                                </td>
                                </form>
                              </tr>
                              <tr>
                                <td>
                                  ใบสมัคร:<br>
                                </td>
                                <td>
                                  <?php
                                  if ($fetid_re['evi_1'] != "0") {
                                    $FileType = strtolower(pathinfo($fetid_re['evi_1'], PATHINFO_EXTENSION));
                                    //echo $FileType;
                                    if ($FileType != "pdf") {
                                  ?>
                                      <a href="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_1']; ?>" target="_blank"><img class="img-fluid" src="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_1']; ?>" alt=""></a>
                                    <?php } else { ?>
                                      <div class="embed-responsive" style="padding-bottom: 141.42%;">
                                        <object class="embed-responsive-item" data="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_1']; ?>" type="application/pdf" internalinstanceid="9" title="">
                                        </object>
                                    <?php }
                                  } ?>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  สำเนาบัตรประชาชนพร้อมรับรองสำเนา:<br>
                                </td>
                                <td>
                                  <?php
                                  if ($fetid_re['evi_2'] != "0") {

                                    $FileType = strtolower(pathinfo($fetid_re['evi_2'], PATHINFO_EXTENSION));
                                    //echo $FileType;
                                    if ($FileType != "pdf") {
                                  ?>
                                      <a href="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_2']; ?>" target="_blank"><img class="img-fluid" src="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_2']; ?>" alt=""></a>
                                    <?php } else { ?>
                                      <div class="embed-responsive" style="padding-bottom: 141.42%;">
                                        <object class="embed-responsive-item" data="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $fetid_re['evi_2']; ?>" type="application/pdf" internalinstanceid="9" title="">
                                        </object>
                                      </div>

                                  <?php }
                                  } ?>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  เอกสารแสดงผลการเรียน 5 ภาคเรียน<br>
                                </td>
                                <td>
                                <ul style="margin:0; padding: 0; list-style-type: none;">
                                  <?php
                                  if ($fetid_re['evi_4'] != "0") {
                                    $f6 = explode("#", $fetid_re['evi_4']);
                                    //print_r($f6);
                                    foreach ($f6 as $row) {
                                      if ($row) {
                                        $f6ck = explode(".", $row);
                                        //echo $FileType;
                                        //echo $row;
                                        //exit();
                                        if ($f6ck[1] != "pdf") {
                                  ?>
                                          <li>
                                            <a href="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $row; ?>" target="_blank"><img class="img-fluid" src="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $row; ?>" alt=""></a>
                                          </li>
                                        <?php } else { ?>
                                          <div class="embed-responsive" style="margin: 10px 0; padding-bottom: 141.42%;">
                                            <object class="embed-responsive-item" data="upload/<?php echo $fetid_re['u_id']; ?>/<?php echo $row; ?>" type="application/pdf" internalinstanceid="9" title="">
                                            </object>
                                          </div>
                                  <?php
                                        }
                                      }
                                    }
                                  }
                                  ?>
                                </ul>
                                </td>
                              </tr>
                            </table>
                        </td>
                        <td>
                          <a href="edit-register66-admin.php?u_id=<?php echo $fetid_re['u_id']; ?>&edit=<?php echo password_generate(7); ?>" class="btn btn-primary btn-sm mb-1">แก้ไข</a>
                          <form action="./process/add_check1.php" method="post" enctype="multipart/form-data" name="comment-form">
                            <input type="hidden" id="u_id" name="u_id" value="<?php echo $fetid_re['u_id']; ?>">
                            <?php if ($fetid_re['s_check'] == "0") {
                              echo "<button name='add_check1' type='submit' class='btn btn-primary btn-sm'>บันทึกข้อมูล</button>";
                            } else {
                              echo "<button name='add_check1' type='submit' class='btn btn-danger btn-sm'>ยกเลิก</button>";
                            } ?>
                          </form>
                        </td>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; 2025 Yupparaj Wittayalai School</span>
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
      <script src="./build/ckeditor.js"></script>
      <script>
        ClassicEditor
          .create(document.querySelector('.editor'), {

            toolbar: {
              items: [
                '|',
                'bold',
                'italic',
                'bulletedList',
                'numberedList',
                '|',
                'indent',
                'outdent',
                '|',
                'undo',
                'redo'
              ]
            },
            language: 'en',
            licenseKey: '',

          })
          .then(editor => {
            window.editor = editor;




          })
          .catch(error => {
            console.error('Oops, something gone wrong!');
            console.error('Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:');
            console.warn('Build id: bpvwb2hgfji4-3svbmcjhh4pc');
            console.error(error);
          });
      </script>
</body>

</html>