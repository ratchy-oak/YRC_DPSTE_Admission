    <?php
    $sql_c4 = "SELECT re_id, re_telephone, re_check, re_comment FROM report WHERE u_id = '$_SESSION[id]'";
    $query_c4 = mysqli_query($conn, $sql_c4);
    $num_c4 = mysqli_num_rows($query_c4);
    $fet_c4 = mysqli_fetch_array($query_c4);
    ?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mt-3">ระบบรับสมัครนักเรียน<br><sup>ปีการศึกษา 2566 (ภายใน)</sup>
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
          <a class="nav-link" href="manage-confirm-m4.php">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>ตรวจสอบการชำระเงิน ม.4</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-confirm-m4-final.php">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>ชำระเงิน ม.4 (ตรวจสอบแล้ว)</span></a>
        </li>
      <?php } ?>

      <!-- Heading -->
      <div class="sidebar-heading">
        เมนู
      </div>
      <?php
      $sqll = "SELECT `s_id` FROM `register` WHERE `u_id` = '$_SESSION[id]' and `s_check` = '1' LIMIT 1";
      $queryl = mysqli_query($conn, $sqll);
      $numl = mysqli_num_rows($queryl);
      $fetl = mysqli_fetch_array($queryl);
      if ($numl != "") {
      ?>
        <li class="nav-item">
        <a class="nav-link" href="confirm-m4.php">
            <i class="fas fa-money-check-alt"></i>
            <span>รายงานตัวและแจ้งชำระเงิน</span></a>
        </li>
        <?php
          if($num_c4 != 0 and $fet_c4['re_check']=='1'){?>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSfozQN8s-ATb7_0E1fFO0T3Wa5xZEV7pcpIfHFSXQ1sFANRng/viewform?usp=sf_link">
            <i class="fas fa-address-card"></i>
            <span>ขึ้นทะเบียนการเป็นนักเรียน</span></a>
        </li>
      <?php 
          }    
    } ?>
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