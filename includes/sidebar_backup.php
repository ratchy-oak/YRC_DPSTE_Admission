        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <div class="cover with-shadow"></div>
                        <div class="image">
                            <img src="./upload/user/<?php echo $fetid['t_pic']; ?>" alt="" />
                        </div>
                        <div class="info">
                            <strong><?php echo $fetid['t_title'] . $fetid['t_name']; ?></strong>
                            <small>ครู <?php echo ($fetid['t_standing'] != "" ? "วิทยฐานะ " . $fetid['t_standing'] : "วิทยฐานะ -"); ?></small>
                        </div>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-header">สารสนเทศ</li>
                    <?php
                    if ($u_permission[0] == '1') {
                    ?>
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fa fa-th-large"></i>
                                <span>ผู้ดูแลระบบ</span>
                            </a>
                            <ul class="sub-menu">
                                <li style="border-bottom: 1px dashed #ccc;"><a href="manage-users.php">บริหารจัดการผู้ใช้</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="manage-permission.php">จัดการสิทธิ์การใช้งาน</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="year.php">เพิ่มปีการศึกษา</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="#">รายงาน</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    if ($u_permission[1] == '2') {
                    ?>
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fas fa-address-card"></i>
                                <span>ข้อมูลส่วนตัว</span>
                            </a>
                            <ul class="sub-menu">
                                <li style="border-bottom: 1px dashed #ccc;"><a href="personal-information.php">ข้อมูลทั่วไป <i class="fa fa-paper-plane text-theme"></i></a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    if ($u_permission[2] == '3') {
                    ?>
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fas fa-clock"></i>
                                <span>ชั่วโมงการปฏิบัติงาน</span>
                            </a>
                            <ul class="sub-menu">
                                <li style="border-bottom: 1px dashed #ccc;"><a href="teacher.php">ปฏิบัติหน้าที่ครูที่ปรึกษา</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="teach.php">ชั่วโมงสอนตามตารางสอน</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="support.php">งานสนับสนุนการเรียนรู้</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="respond.php">งานตอบสนองนโยบายและจุดเน้น</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="report1.php">สรุปชั่วโมงปฏิบัติงานที่ได้รับมอบหมาย</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    if ($u_permission[3] == '4') {
                    ?>
                        <li>
                            <a href="plc.php">
                                <i class="fa fa-calendar"></i>
                                <span>PLC</span>
                            </a>
                        </li>
                    <?php
                    }
                    if ($u_permission[4] == '5') {
                    ?>
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>การจัดกิจกรรมการเรียนการสอน</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="media.php">ผลิตสื่อ / นวัตกรรม</a></li>
                                <li><a href="classroom-research.php">ทำวิจัยในชั้นเรียน</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    if ($u_permission[5] == '6') {
                    ?>
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fas fa-binoculars"></i>
                                <span>แหล่งเรียนรู้</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="learning1.php">แหล่งเรียนรู้ภายในฯ</a></li>
                                <li><a href="learning2.php">แหล่งเรียนรู้ภายนอกฯ</a></li>
                                <li><a href="lecturer.php">เชิญวิทยากรภายนอก</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    if ($u_permission[6] == '7') {
                    ?>
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fas fa-user-check"></i>
                                <span>การพัฒนาตนเอง</span>
                            </a>
                            <ul class="sub-menu">
                                <li style="border-bottom: 1px dashed #ccc;"><a href="self-development.php">การพัฒนาตนเอง</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="teacher-portfolio.php">ผลงานครู</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="student-portfolio.php">ผลงานนักเรียน</a></li>
                                <li style="border-bottom: 1px dashed #ccc;"><a href="lecturer2.php">การได้เชิญเป็นวิทยากร</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-header">SAR : การประเมินตนเอง</li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-star"></i>
                            <span>มาตรฐานที่ 1 คุณภาพผู้เรียน</span>
                        </a>
                        <ul class="sub-menu">
                            <li style="border-bottom: 1px dashed #ccc;"><a href="student.php">กรอกข้อมูลจำนวนนักเรียน</a></li>
                            <li style="border-bottom: 1px dashed #ccc;"><a href="student2.php">ผลการประเมินสมรรถนะสำคัญของผู้เรียน</a></li>
                            <li style="border-bottom: 1px dashed #ccc;"><a href="sar1.php">ตัวบ่งชี้ที่ 1.1</a></li>
                            <li style="border-bottom: 1px dashed #ccc;"><a href="sar2.php">ตัวบ่งชี้ที่ 1.2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="sar3.php">
                            <i class="fa fa-star"></i>
                            <span>มาตรฐานที่ 2 กระบวนการบริหารและการจัดการ</span>
                        </a>
                    </li>
                    <li>
                        <a href="sar4.php">
                            <i class="fa fa-star"></i>
                            <span>มาตรฐานที่ 3 กระบวนการจัดการเรียนการสอนที่เน้นผู้เรียนเป็นสำคัญ</span>
                        </a>
                    </li>
                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->

                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->