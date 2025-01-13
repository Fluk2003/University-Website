<?php


// echo $_SESSION["admin"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "titlebar.php" ?>
</head>

<body class="service-details-page">

  <?php session_start(); ?>

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="d-none d-md-flex align-items-center">
          <i class="bi bi-clock me-1"></i>วันจันทร์ - วันอาทิตย์ เวลา 08:30 น. - 16:30 น. (ยกเว้นวันหยุดนักขัตฤกษ์)
        </div>
        <div class="d-flex align-items-center">
          <i class="bi bi-phone me-1"></i> 0-4221-1040-59 ต่อ 1752-1755 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                <li><a href="#">ข่าวประกาศ</a></li>
                <li><a href="#">กิจกรรม</a></li>
                <li><a href="#">ข้อบังคับ</a></li>
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

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">ยินดีต้อนรับเข้าสู่ระบบแอดมิน</h1>
              <p class="mb-0">
                ระบบนี้ออกแบบมาเพื่อให้ผู้ดูแลระบบสามารถจัดการข้อมูลและตรวจสอบการทำงานของระบบได้อย่างมีประสิทธิภาพ
                โปรดเข้าสู่เมนูที่ต้องการเพื่อเริ่มการจัดการหรือดูรายงานที่เกี่ยวข้อง
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">หน้าหลัก</a></li>
            <li class="current">แอดมิน</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="services-list">
              <a href="#" class="active">หน้าหลักแอดมิน</a>
              <a href="newsAssignmentManagement.php">จัดการข้อมูลเรื่องข่าวประกาศ</a>
              <a href="rulesManagement.php">จัดการข้อมูลข้อบังคับ</a>
              <!-- <a href="#">Product Management</a>
              <a href="#">Graphic Design</a>
              <a href="#">Marketing</a> -->
            </div>

            <h4>หน้าหลักแอดมิน</h4>
            <p>ยินดีต้อนรับสู่หน้าหลักของผู้ดูแลระบบ ที่ซึ่งคุณสามารถจัดการและควบคุมฟีเจอร์ต่างๆ ของระบบได้อย่างมีประสิทธิภาพ เช่น การเพิ่มและแก้ไขข่าวประกาศ การจัดการข้อมูลผู้ใช้งาน และการตรวจสอบสถานะต่างๆ ของระบบผ่านเมนูที่ใช้งานง่าย</p>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/services.jpg" alt="" class="img-fluid services-img">
            <!-- <h3>Temporibus et in vero dicta aut eius lidero plastis trand lined voluptas dolorem ut voluptas</h3>
            <p>
              Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Aut eum totam accusantium voluptatem.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
            </ul>
            <p>
              Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.
            </p>
            <p>
              Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam aut consequuntur recusandae mollitia doloremque est architecto cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex repellendus eveniet velit sint quia sapiente cumque. Et ipsa perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum. Eaque iusto cupiditate et totam et quia dolorum in. Sunt molestiae ipsum at consequatur vero. Architecto ut pariatur autem ad non cumque nesciunt qui maxime. Sunt eum quia impedit dolore alias explicabo ea.
            </p> -->
          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

  </main>

  <?php include "footer.php" ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>