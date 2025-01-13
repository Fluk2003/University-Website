<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once "configs/connect.php";

    if (isset($_GET["newsassignment_id"])) {
        $newsassignment_id = $_GET["newsassignment_id"];

        // ตรวจสอบว่ามีข้อมูลใน newsassignment_id
        if (!empty($newsassignment_id)) {

            $queryNews = $conn->prepare("SELECT * FROM newsassignment WHERE newsassignment_id = :newsassignment_id");
            $queryNews->bindParam(":newsassignment_id", $newsassignment_id);
            $queryNews->execute();
            if ($queryNews->rowCount() > 0) {
                $fetchNews = $queryNews->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "ไม่พบข้อมูลข่าวที่ระบุ";
            }

            $queryNewsContent = $conn->prepare("SELECT * FROM newsassignment as na 
                                                JOIN newsassignment_content as nac 
                                                ON na.newsassignment_id = nac.newsassignment_id
                                                WHERE nac.newsassignment_id = :newsassignment_id
                                                ORDER BY nac.newsassignment_id ASC");
            $queryNewsContent->bindParam(":newsassignment_id", $newsassignment_id);
            $queryNewsContent->execute();
        } else {
            echo "ID ของข่าวไม่ถูกต้อง";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "titlebar.php"; ?>
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
                            <h1 class="heading-title">
                                <?php echo isset($fetchNews["news_name"]) ? $fetchNews["news_name"] : "ไม่มีชื่อข่าว"; ?>
                            </h1>
                            <p class="mb-0">
                                ข่าวประกาศจากสำนักส่งเสริมวิชาการและงานทะเบียน มหาวิทยาลัยราชภัฏอุดรธานี
                                <?php echo isset($fetchNews["news_name"]) ? $fetchNews["news_name"] : "ไม่มีชื่อข่าว"; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="index.html">หน้าหลัก</a></li>
                        <li class="current">รายละเอียดข่าว <?php echo isset($fetchNews["news_name"]) ? $fetchNews["news_name"] : "ไม่มีชื่อข่าว"; ?></li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">
            <div class="container">
                <div class="row gy-4">
                    <?php $dir = "uploads/" ?>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <img src="<?php echo $dir . $fetchNews["news_pic"]; ?>" alt="" class="img-fluid services-img">
                        <!-- <h3>
                            <?php echo isset($fetchNews["news_name"]) ? $fetchNews["news_name"] : "ไม่มีรายละเอียด"; ?>
                        </h3>
                        <p>
                            <?php echo isset($fetchNews["content_desc"]) ? $fetchNews["content_desc"] : "ไม่มีคำอธิบาย"; ?>
                        </p> -->
                    </div>
                </div>
            </div>
        </section><!-- /Service Details Section -->

        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">
            <div class="container">
                <div class="mb-5">
                    <h4>เนื้อหาข่าว <?php echo $fetchNews["news_name"]; ?> </h4>
                </div>
                <div class="row gy-4">
                    <?php
                    $dir = "uploads/";

                    // ดึงข้อมูลทั้งหมดเป็น array

                    ?>
                    
                    <?php while ($newsContents = $queryNewsContent->fetch(PDO::FETCH_ASSOC)) { ?>
                        <?php
                        $allowedExtensions = ["jpg", "jpeg", "png", "gif", "pdf"];

                        // ตรวจสอบว่า content_type เป็นไฟล์ที่อยู่ใน allowedExtensions หรือไม่
                        $fileExtension = pathinfo($newsContents["content_desc"], PATHINFO_EXTENSION);

                        if (in_array(strtolower($fileExtension), $allowedExtensions)) { ?>
                            <img src="<?php echo $dir . $newsContents["content_desc"]; ?>" alt="<?php echo $newsContents["content_desc"]; ?>">
                        <?php } ?>

                        <?php if ($newsContents["content_type"] === "text") { ?>
                            <p style="font-size: 20px;"><?php echo  $newsContents["content_desc"]; ?></p>
                        <?php } ?>

                    <?php } ?>




                </div>
            </div>
        </section>


    </main>



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