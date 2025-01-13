<?php

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
    <style>
        .team-member {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .team-member:hover {
            cursor: pointer;
            transform: translateY(-10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .team-member .member-img img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .team-member .member-info {
            padding: 15px;
            background: #fff;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .team-member .member-info h4 {
            font-size: 1.25rem;
            font-weight: bold;
            margin: 10px 0;
        }

        .team-member .member-info span {
            display: block;
            margin: 5px 0;
        }

        .team-member .member-info a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .team-member .member-info a:hover {
            text-decoration: underline;
            color: #34495e;
        }
    </style>
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

                    <div class="container">
                        <div class="row gy-4">
                            <!-- Looping -->
                            <?php
                            $dir = "uploads/";
                            while ($fetchNewsAssignment = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch bringup" data-aos="fade-up" data-aos-delay="100">
                                    <div class="team-member">
                                        <div class="member-img">
                                            <img src="<?php echo $dir . $fetchNewsAssignment["news_pic"]; ?>" alt="">
                                        </div>
                                        <div class="member-info">
                                            <h4><?php echo $fetchNewsAssignment["news_name"] ?></h4>
                                            <span class="mb-2"><?php echo $fetchNewsAssignment["news_time"]; ?></span>
                                            <span>
                                                <a href="news_deteail.php?newsassignment_id=<?php echo $fetchNewsAssignment["newsassignment_id"] ?>">
                                                    อ่านรายละเอียดเพิ่มเติม
                                                </a>
                                            </span>
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
