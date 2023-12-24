    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mt-3">ระบบรับสมัครนักเรียน<br><sup>ปีการศึกษา 2565 (ภายใน)</sup>
        </div>
      </a>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
        <i class="fas fa-home"></i>
          <span>หน้าแรก</span></a>
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
          <a class="nav-link" href="manage-confirm.php">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>ชำระเงิน</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-confirm2.php">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>ชำระเงิน (ตรวจสอบแล้ว)</span></a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="report_final.php">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>ตรวจสอบนักเรียนที่ลงทะเบียน</span></a>
        </li>
        <div class="sidebar-heading">
          การสมัคร ปีการศึกษา 2565
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
		<?php }?>

      <!-- Heading -->
      <div class="sidebar-heading">
        เมนู
      </div>
      <li class="nav-item">
        <a class="nav-link" href="student65.php">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>ขั้นตอนการรับระเบียบการ</span></a>
      </li>
            <?php
      $sqll = "SELECT `level` FROM `buy_register` WHERE `u_id` = '$_SESSION[id]' and `status` = '2' LIMIT 1";
  $queryl = mysqli_query($conn, $sqll);
  $numl = mysqli_num_rows($queryl);
  if($numl!=""){
  ?>
            <li class="nav-item">
        <a class="nav-link" href="register-student4-65.php?ck=<?php echo password_generate(20); ?>">
          <i class="fas fa-fw fa-school"></i>
          <span>สมัครสอบคัดเลือก</span></a>
      </li>
      <?php }?>
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