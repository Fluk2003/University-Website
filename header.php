<?php session_start(); ?>

<header id="header" class="header sticky-top">

  <div class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="d-none d-md-flex align-items-center">
        <i class="bi bi-clock me-1"></i>วันจันทร์ - วันอาทิตย์ เวลา 08:30 น. - 16:30 น. (ยกเว้นวันหยุดนักขัตฤกษ์)
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone me-1"></i> 0-4221-1040-59 ต่อ 1752-1755 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php
        echo isset($_SESSION["admin"]) ? "<i class='bi bi-person-fill'></i>&nbsp;&nbsp;<a class='text-white' href='admin.php' >เข้าสู่ระบบแอดมิน</a>" : "";
        ?>
      </div>
    </div>
  </div><!-- End Top Bar -->

  <div class="branding d-flex align-items-center">

    <div class="container position-relative d-flex align-items-center justify-content-end">
      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/สำนักงานน.png" width="350px" height="90px" alt="">
        <!-- Uncomment the line below if you also wish to use a text logo -->
        <!-- <h5 class="sitename">สำนักส่งเสริมวิชาการและงานทะเบียน <br> มหาวิทยาลัยราชภัฏอุดรธานี</h5>  -->
      </a>


      <!-- Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <!-- <li><a href="#hero" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#departments">Departments</a></li>
            <li><a href="#doctors">Doctors</a></li> -->

          <!-- เกี่ยวกับเรา -->
          <li class="dropdown"><a href="#"><span>เกี่ยวกับเรา</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <!-- <li><a href="#">ประวัติของหน่วยงาน</a></li> -->
              <li><a href="history.php">ประวัติของหน่วยงาน</a></li>
              <!-- <li><a href="#">โครงสร้างองค์กร</a></li> -->
              <li class="dropdown"><a href="#"><span>โครงสร้างองค์กร</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="structure.php">แผนภาพองค์กร</a></li>
                  <li><a href="person.php">บุคลากร</a></li>
                </ul>
              </li>
              <!-- <li><a href="#">บุคลากร</a></li> -->
              <!-- <li><a href="#">Dropdown 4</a></li> -->
            </ul>
          </li>

          <!-- ข่าวประกาศ -->
          <li class="dropdown"><a href="#"><span>ประชาสัมพันธ์</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="news.php">ข่าวประกาศ</a></li>
              <li><a href="#">กิจกรรม</a></li>
              <li><a href="rules.php">ข้อบังคับ</a></li>
              <li><a href="#">ประกาศ</a></li>
              <li><a href="#">ระเบียบ</a></li>
            </ul>
          </li>

          <!-- งานรับเข้านักศึกษา -->
          <li class="dropdown"><a href="#"><span>งานรับเข้านักศึกษา</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">สมัครเรียน </a></li>
              <li><a href="#">ประกาศผลสอบ</a></li>
              <li><a href="#">รายงานตัว </a></li>
              <li><a href="#">ค่าเทอม</a></li>
            </ul>
          </li>

          <!-- งานหลักสูตร -->
          <li class="dropdown"><a href="#"><span>งานหลักสูตร</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="https://student.udru.ac.th/curriculum/index.php" target="_blank">ระบบสารสนเทศหลักสูตร</a></li>
              <li class="dropdown"><a href="#"><span>คู่มือการจัดทำหลักสูตร</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">ระดับประกาศนียบัตร</a></li>
                  <li><a href="#">ระดับปริญญาตรี</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>การจัดทำ มคอ.</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="https://reg.udru.ac.th/website/document/course/tqf-manual-2557.pdf" target="_blank">คู่มือการจัดทำ มคอ.</a></li>
                  <li><a href="https://portal7.udru.ac.th/web/hmrservice2/index.php" target="_blank">ระบบสารสนเทศการจัดทำ <br> มคอ.</a></li>
                  <li><a href="http://checo.mhesi.go.th/" target="_blank">ระบบรับทราบหลักสูตร <br> (CHECO)</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <!-- งานทะเบียน -->
          <li class="dropdown"><a href="#"><span>งานทะเบียน</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">ปฏิทินการศึกษา</a></li>
              <li><a href="https://student.udru.ac.th/std_service6/index.php" target="_blank">ระบบบริการนักศึกษา</a></li>
              <li class="dropdown"><a href="#"><span>คู่มือนักศึกษา</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">ระดับปริญญาตรี</a></li>
                  <li><a href="#">ระดับบัณฑิตศึกษา</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>แบบฟอร์มคำร้อง<i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">ขอเอกสารทางการศึกษา</a></li>
                  <li><a href="#">ขอเปลี่ยนแปลงข้อมูล <br> ส่วนตัว</a></li>
                  <li><a href="#">ขอเพิ่มวิชาเรียน</a></li>
                  <li><a href="#">ขอถอนวิชาเรียน</a></li>
                  <li><a href="#">ขอแจ้งรายวิชา<br>ลงทะเบียนเรียนซ้ำ</a></li>
                  <li><a href="#">ขอทำบัตรนักศึกษา</a></li>
                  <li><a href="#">แบบฟอร์มขอย้าย <br> สาขาวิชา</a></li>
                  <li><a href="#">ใบมอบฉันทะ</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>คู่มือการขอเอกสาร <br> สำคัญทางการศึกษา</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">การขอใบรายงาน <br> ผลการศึกษา</a></li>
                </ul>
              </li>
              <li><a href="#">คู่มือระบบบริการนักศึกษา</a></li>
              <li><a href="#">ตรวจสอบรายชื่อผู้สำเร็จ <br> การศึกษา</a></li>
            </ul>
          </li>

          <!-- งานบริการอาจารย์ -->
          <li class="dropdown"><a href="#"><span>งานบริการอาจารย์</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">สมัครเรียน </a></li>
              <li><a href="#">ประกาศผลสอบ</a></li>
              <li><a href="#">รายงานตัวนักศึกษา</a></li>
              <li><a href="#">คู่มืออาจารย์ที่ปรึกษา</a></li>
            </ul>
          </li>

          <!-- สถิติ -->
          <li class="dropdown"><a href="#"><span>สถิติ</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">สถิติการให้บริการ <br> เอกสารทางการศึกษา</a></li>
              <li class="dropdown"><a href="#"><span>สถิติสารสนเทศ <br> ความพึงพอใจ</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">การให้บริการงานทะเบียน</a></li>
                  <li><a href="#">การให้บริการงานส่งเสริม <br> วิชาการ</a></li>
                  <li><a href="#">งานหลักสูตรและมาตรฐาน <br> หลักสูตร</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>ผลการประเมินความ<br>พึงพอใจของ <br> สำนักฯ</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">ผลการประเมินความพึงพอใจ</a></li>
                  <li><a href="#">ผลการประเมินความพึงพอใจ <br> ประสิทธิภาพ</a></li>
                </ul>
              </li>
              <li><a href="#">รายงานตัว</a></li>
            </ul>
          </li>
          <!-- <li><a style="background-color: #34495e; border-radius: 5px;  color: white ; height: 1px; padding: 18px 10px;" href="forms/login.php">เข้าสู่ระบบ</a></li> -->
          <li><a href="admin/login.php" style="padding-right: 15px;"><?php echo isset($_SESSION["admin"]) ? 'ออกจากระบบ' : 'เข้าสู่ระบบ'; ?></a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <!-- <a class="cta-btn" href="index.html#appointment">Make an Appointment</a> -->
    </div>
  </div>
</header>