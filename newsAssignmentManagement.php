<?php

// echo $_SESSION["admin"];
require_once 'configs/connect.php';
try {
    $selectIdNews = $conn->prepare("SELECT newsassignment_id FROM newsassignment ORDER BY newsassignment_id DESC LIMIT 1");
    $selectIdNews->execute();
    $fetID = $selectIdNews->fetch(PDO::FETCH_ASSOC);
    // echo $fetID["newsassignment_id"] + 1;
} catch (PDOException $err) {
    echo $err->getMessage();
}


try {
    $NewsContent = $conn->prepare("SELECT content_id FROM newsassignment_content ORDER BY content_id DESC LIMIT 1");
    $NewsContent->execute();
    $fetchContentID = $NewsContent->fetch(PDO::FETCH_ASSOC);
    // echo $fetID["newsassignment_id"] + 1;
} catch (PDOException $err) {
    echo $err->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "titlebar.php" ?>
    <style>
        .card,
        label {
            color: #34495e;
        }
    </style>
</head>

<body class="service-details-page">
    <?php include "header.php"; ?>
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
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="services-list">
                        <a href="#">หน้าหลักแอดมิน</a>
                        <a href="newsAssignmentManagement.php" class="active">จัดการข้อมูลเรื่องข่าวประกาศ</a>
                    </div>
                    <h4>จัดการข้อมูลเรื่องข่าวประกาศ</h4>
                    <p>สามารถเพิ่ม แก้ไข หรือลบข้อมูลข่าวประกาศในระบบได้ตามความต้องการเพื่อให้ข้อมูลข่าวสารที่เผยแพร่ถูกต้องและทันสมัยอยู่เสมอ</p>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form action="addNewsAssignment_process.php" method="post" enctype="multipart/form-data">
                        <!-- ส่วนหัวเรื่อง -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>ส่วนหัวเรื่อง</h5>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="newsassignment_id" value="<?php echo $fetID["newsassignment_id"] + 1 ?>">
                                <div class="mb-3">
                                    <label for="newsTitle" class="form-label">หัวข้อข่าวประกาศ</label>
                                    <input type="text" class="form-control" id="news_name" placeholder="กรอกหัวข้อข่าว" name="news_name">
                                </div>
                                <div class="mb-3">
                                    <label for="newsDescription" class="form-label">คำอธิบายข่าวประกาศ</label>
                                    <textarea class="form-control" id="news_description" rows="3" placeholder="กรอกคำอธิบายข่าว" name="news_description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="newsDate" class="form-label">วันที่เพิ่มข่าว</label>
                                    <input type="date" class="form-control" id="news_time" name="news_time">
                                </div>
                                <div class="mb-3">
                                    <label for="newsImage" class="form-label">รูปภาพข่าวประกาศ</label>
                                    <input accept=".png, .jpg, .jpeg, .gif" class="form-control" type="file" id="news_pic" name="news_pic">
                                </div>
                            </div>
                        </div>
                        <!-- ส่วนเนื้อหา -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>ส่วนเนื้อหา</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 d-flex gap-2">
                                    <button type="button" class="btn btn-secondary" id="addContentButton">
                                        <i class="bi bi-file-earmark-text"></i> เพิ่มข้อความ
                                    </button>
                                    <button type="button" class="btn btn-secondary" id="addImageButton">
                                        <i class="bi bi-image"></i> เพิ่มไฟล์
                                    </button>
                                    <!-- <button type="button" class="btn btn-secondary" id="addPdfButton">
                                            <i class="bi bi-file-earmark-pdf"></i> เพิ่มไฟล์ PDF
                                        </button> -->
                                </div>
                                <div id="contentContainer" class="my-4">
                                    <!-- ที่ว่างสำหรับ Textbox, รูปภาพ หรือไฟล์ PDF ใหม่ -->
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-3" style="background-color: #34495e; outline: #34495e; border: #34495e;" name="newsUpload">
                            <i class="bi bi-upload"></i> อัปโหลดข่าวประกาศ
                        </button>
                    </form>
                    <script>
                        // โค้ดเก่า

                        // const addContentButton = document.getElementById('addContentButton');
                        // const addImageButton = document.getElementById('addImageButton');
                        // const addPdfButton = document.getElementById('addPdfButton');
                        // const contentContainer = document.getElementById('contentContainer');
                        // // เพิ่ม Textbox สำหรับเนื้อหาเพิ่มเติม
                        // addContentButton.addEventListener('click', () => {
                        //     const newTextboxDiv = document.createElement('div');
                        //     newTextboxDiv.className = 'mb-3';

                        //     const newTextboxLabel = document.createElement('label');
                        //     newTextboxLabel.className = 'form-label';
                        //     newTextboxLabel.textContent = 'เนื้อหาเพิ่มเติม';

                        //     const newTextbox = document.createElement('textarea');
                        //     newTextbox.className = 'form-control';
                        //     newTextbox.rows = 3;
                        //     newTextbox.placeholder = 'กรอกเนื้อหาเพิ่มเติม';
                        //     newTextbox.name = 'content_desc[]'
                        //     newTextboxDiv.appendChild(newTextboxLabel);
                        //     newTextboxDiv.appendChild(newTextbox);
                        //     contentContainer.appendChild(newTextboxDiv);
                        // });

                        // // เพิ่มฟิลด์สำหรับอัปโหลดไฟล์
                        // addImageButton.addEventListener('click', () => {
                        //     const newFileDiv = document.createElement('div');
                        //     newFileDiv.className = 'mb-3';
                        //     const newFileLabel = document.createElement('label');
                        //     newFileLabel.className = 'form-label';
                        //     newFileLabel.textContent = 'อัปโหลดรูปภาพเพิ่มเติม';
                        //     const newFileInput = document.createElement('input');
                        //     newFileInput.type = 'file';
                        //     newFileInput.className = 'form-control';
                        //     newFileInput.accept = ".png, .jpg, .jpeg, .gif , .pdf ";
                        //     newFileInput.name = 'content_pic[]';
                        //     newFileDiv.appendChild(newFileLabel);
                        //     newFileDiv.appendChild(newFileInput);
                        //     contentContainer.appendChild(newFileDiv);
                        // });


                        // โค้ด ทดลอง
                        var nextContentId = <?php echo $fetchContentID["content_id"] + 1; ?>;

                        const addContentButton = document.getElementById('addContentButton');
                        const addImageButton = document.getElementById('addImageButton');
                        const contentContainer = document.getElementById('contentContainer');

                        // เพิ่ม Textbox พร้อม input hidden
                        addContentButton.addEventListener('click', () => {
                            const newTextboxDiv = document.createElement('div');
                            newTextboxDiv.className = 'mb-3';

                            const newTextboxLabel = document.createElement('label');
                            newTextboxLabel.className = 'form-label';
                            newTextboxLabel.textContent = 'เนื้อหาเพิ่มเติม';

                            const newTextbox = document.createElement('textarea');
                            newTextbox.className = 'form-control';
                            newTextbox.rows = 3;
                            newTextbox.placeholder = 'กรอกเนื้อหาเพิ่มเติม';
                            newTextbox.name = 'content_desc[]';

                            // สร้าง input hidden
                            const newHiddenInput = document.createElement('input');
                            newHiddenInput.type = 'text';
                            newHiddenInput.name = 'content_id_text[]';
                            newHiddenInput.value = nextContentId; // ใช้ค่าที่ได้จาก PHP

                            newTextboxDiv.appendChild(newTextboxLabel);
                            newTextboxDiv.appendChild(newTextbox);
                            newTextboxDiv.appendChild(newHiddenInput);
                            contentContainer.appendChild(newTextboxDiv);

                            // เพิ่มค่า nextContentId สำหรับฟิลด์ถัดไป
                            nextContentId++;
                        });

                        // เพิ่ม File input พร้อม input hidden
                        addImageButton.addEventListener('click', () => {
                        const newFileDiv = document.createElement('div');
                        newFileDiv.className = 'mb-3';

                        const newFileLabel = document.createElement('label');
                        newFileLabel.className = 'form-label';
                        newFileLabel.textContent = 'อัปโหลดรูปภาพเพิ่มเติม';

                        const newFileInput = document.createElement('input');
                        newFileInput.type = 'file';
                        newFileInput.className = 'form-control';
                        newFileInput.accept = ".png, .jpg, .jpeg, .gif , .pdf ";
                        newFileInput.name = 'content_pic[]';

                        // สร้าง input hidden
                        const newHiddenInput = document.createElement('input');
                        newHiddenInput.type = 'text';
                        newHiddenInput.name = 'content_id_pic[]';
                        newHiddenInput.value = nextContentId; // ฟิลด์ประเภทไฟล์

                        newFileDiv.appendChild(newFileLabel);
                        newFileDiv.appendChild(newFileInput);
                        newFileDiv.appendChild(newHiddenInput);
                        contentContainer.appendChild(newFileDiv);

                        // เพิ่มค่า nextContentId สำหรับฟิลด์ถัดไป
                        nextContentId++;
                        });
                    </script>
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