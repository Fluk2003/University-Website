<?php

require_once 'configs/connect.php';

// Initialize an array to hold the person data
$personList = [];

try {
    // Query the database to fetch persons, ensuring person_id = 1 stays on top
    $stmt = $conn->prepare("
        SELECT person_id, person_name, person_email, person_role, person_pic 
        FROM person 
        ORDER BY (CASE WHEN person_id = 1 THEN 0 ELSE 1 END), person_id ASC
    ");
    $stmt->execute();

    // Fetch all results into the $personList array
    $personList = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <!-- include header.php -->
    <?php include 'header.php'; ?>

    <main class="main">
        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">บุคลากร</h1>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li class="current">บุคลากร</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">
            <div class="container" data-aos="fade-up">
                <h2 class="text-center mt-3">บุคลากรสำนักส่งเสริมวิชาการและงานทะเบียน</h2>
                <center>
                    <section id="doctors" class="doctors section light-background">
                        <div class="container">
                            <div class="row gy-4 d-flex justify-content-center align-items-center">
                                <!-- Display person with person_id = 1 on top -->
                                <?php if (!empty($personList)): ?>
                                    <div class="col-3 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                        <div class="team-member">
                                            <div class="member-img">
                                                <img src="<?php echo $personList[0]['person_pic']; ?>" class="img-fluid" alt="">
                                            </div>
                                            <div class="member-info">
                                                <h4><?php echo $personList[0]['person_name']; ?></h4>
                                                <span><?php echo $personList[0]['person_role']; ?></span>
                                                <p><?php echo $personList[0]['person_email']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Display other persons in a 3-column grid -->
                                    <div class="col-12">
                                        <div class="row gy-4">
                                            <?php for ($i = 1; $i < count($personList); $i++): ?>
                                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                                    <div class="team-member">
                                                        <div class="member-img">
                                                            <img src="<?php echo $personList[$i]['person_pic']; ?>" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="member-info">
                                                            <h4><?php echo $personList[$i]['person_name']; ?></h4>
                                                            <span><?php echo $personList[$i]['person_role']; ?></span>
                                                            <p><?php echo $personList[$i]['person_email']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </center>
            </div>
        </section>
        <!-- /Starter Section Section -->
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
