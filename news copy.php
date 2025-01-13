<?php
session_start();
require_once 'configs/connect.php';

// Initialize an array to hold the news data
$newsList = [];

try {
    // Query the database to fetch news items
    $stmt = $conn->prepare("SELECT newsassignment_id, news_name, news_description, news_time, news_category, news_pic FROM newsassignment ORDER BY newsassignment_id DESC");
    $stmt->execute();
} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'titlebar.php'; ?>
</head>

<body class="starter-page-page">
    <?php include 'header.php'; ?>

    <main class="main">
        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">ข่าวประกาศ</h1>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li class="current">ข่าวประกาศ</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Page Title -->

        <!-- News Section -->
        <section id="news-section" class="news-section section light-background">
            <div class="container" data-aos="fade-up">
                <section id="doctors" class="doctors section light-background">

                    <div class="container section-title" data-aos="fade-up">
                        <h2>ข่าวประกาศล่าสุด</h2>
                        <p>รับข้อมูลประกาศสำคัญเกี่ยวกับการเรียนการสอนและการลงทะเบียนจากสำนักงานได้ที่นี่</p>
                    </div>

                    <div class="container ">

                        <div class="row gy-4">
                            <!-- looping  -->
                            <?php
                            $dir = "uploads/";
                            // Use while loop to fetch results
                            while ($fetchNewsAssignment = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch bringup " data-aos="fade-up" data-aos-delay="100">
                                    <div class="team-member">
                                        <div class="member-img">
                                            <img src="<?php echo $dir . $fetchNewsAssignment["news_pic"]; ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="member-info">
                                            <h4><?php echo $fetchNewsAssignment["news_name"] ?></h4>
                                            <span class="mb-2"><?php echo  $fetchNewsAssignment["news_time"]; ?></span>
                                            <span><a style="font-size: 15px;" href="news_deteail.php?newsassignment_id=<?php echo $fetchNewsAssignment["newsassignment_id"] ?>">อ่านรายละเอียดเพิ่มเติม</a></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <!-- End News Section -->
    </main>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>