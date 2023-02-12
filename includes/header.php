        <!-- begin #header -->
        <div id="header" class="header navbar-inverse">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand"><b>Yupparaj</b>
                    Information <small><?php echo $_SESSION['yearly']; ?></small></a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->
            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="./upload/user/<?php echo $fetid['t_pic']; ?>" alt="" />
                        <span class="d-none d-md-inline"><?php echo $fetid['t_title'] . $fetid['t_name']; ?></span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;" class="dropdown-item">แก้ไขรหัสผ่าน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./process/p_logout.php" class="dropdown-item">ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
            <!-- end header-nav -->
        </div>
        <!-- end #header -->