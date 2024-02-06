<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-text mt-5">ระบบรับสมัครนักเรียน<br>โครงการห้องเรียน พสวท.(สู่ความเป็นเลิศ)<br><b style="color: lightgreen">(รอบที่ 2)</b>
      <p style="color: yellow">ปีการศึกษา 2567</p>
    </div>
  </a>
  <br />
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-home"></i>
      <span>หน้าแรก</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-user"></i>
      <span><?php echo $_SESSION['user_']; ?></span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <?php
  if ($_SESSION['permission'] == "2") { ?>
    <!-- Heading -->
    <div class="sidebar-heading">
      ผู้ดูแลระบบ
    </div>
    <li class="nav-item">
      <a class="nav-link" href="manage-m4.php">
        <i class="fas fa-fw fa-user"></i>
        <span>สมัคร ม.4</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manage-m4-confirm.php">
        <i class="fas fa-fw fa-user-check"></i>
        <span>สมัคร ม.4 (ตรวจสอบแล้ว)</span></a>
    </li>
  <?php } else { ?>

    <!-- Heading -->
    <div class="sidebar-heading">
      เมนู
    </div>
    <li class="nav-item">
      <a target="_blnak" class="nav-link" href="https://drive.google.com/file/d/1oMtzg4isOw-yfxE0cZyIiVSJtiShvDNM/view?usp=sharing">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>ประกาศรับสมัคร</span></a>
    </li>
    <li class="nav-item">
      <a target="_blnak" class="nav-link" href="https://drive.google.com/file/d/1bJtdIG63KpIFDMjlXd-vhzikAApHnX7V/view?usp=sharing">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>ดาวน์โหลดใบสมัคร</span></a>
    </li>
    <li class="nav-item">
      <a target="_blnak" class="nav-link" href="https://drive.google.com/file/d/1OiKWDgVCV1i4X5zyHzFQ1IRdCmR6IrEy/view?usp=sharing">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>ตรวจสอบรายชื่อผู้มีสิทธิ์สมัครคัดเลือก</span></a>
    </li>
    <?php
    if ($_SESSION['permission'] != "2") {
      $sqll = "SELECT * FROM `register` WHERE `u_id` = '$_SESSION[id]' AND idregister != ''";
      $queryl = mysqli_query($conn, $sqll);
      $numl = mysqli_num_rows($queryl);
      $fetl = mysqli_fetch_array($queryl);
      if ($numl == 0) {
    ?>
     <li class="nav-item">
          <a class="nav-link" href="application-form.php">
          <!-- <a class="nav-link" href="pleasewait.php"> -->
            <button class="btn" style="background-color: #F13596;color: white;">
              <span>เข้าสู่ระบบรับสมัคร</span>
            </button>
          </a>
        </li>
      <?php
      } else {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="register66.php?ck=<?php echo password_generate(20); ?>">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>อัพโหลดหลักฐาน</span></a>
        </li>
      <?php } } } ?>
      <!-- if ($numl == 1 && $fetl['s_check'] == '1') {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="print4-66.php">
            <button class="btn btn-success" style="color: white;">
              <span>พิมพ์บัตรประจำตัวสอบ</span>
            </button>
          </a>
        </li>
    <li class="nav-item">
    <a class="nav-link" href="https://drive.google.com/drive/folders/199YOH_ImRpmLa0Ly-tl-diF2EL2o61lq?usp=share_link" target="_blank">
      <button class="btn btn-danger" style="color: white;">
        <span>รายชื่อผู้มีสิทธิ์สอบ</span>
      </button>
    </a>
  </li> -->
  <hr class="sidebar-divider d-none d-md-block">
  <li class="nav-item">
    <a class="nav-link" href="process/p_logout.php">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>ออกจากระบบ</span></a>
  </li>
  <br>
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>