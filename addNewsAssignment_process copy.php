<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("location:index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["newsUpload"])) {
    require_once 'configs/connect.php';

    // ตรวจสอบโฟลเดอร์สำหรับการอัปโหลด
    $uploadDir = 'uploads/';
    

    // ส่วนหัวเรื่อง
    $newsassignment_id = $_POST["newsassignment_id"] ?? null;
    $news_name = htmlspecialchars($_POST["news_name"]);
    $news_description = htmlspecialchars($_POST["news_description"]);
    $news_time = htmlspecialchars($_POST["news_time"]);
    $news_pic = $_FILES["news_pic"] ?? null;

    // ส่วน content
    $content_desc = $_POST["content_desc"] ?? [];
    $count_content_desc = count($content_desc);

    // ตรวจสอบและอัปโหลดรูปภาพข่าว
    if ($news_pic && $news_pic["error"] === 0) {
        $extension = pathinfo($news_pic["name"], PATHINFO_EXTENSION);
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

        if (in_array(strtolower($extension), $allowedExtensions)) {
            $name_pic = uniqid("news_", true) . "." . $extension;
            $uploadFile = $uploadDir . $name_pic;

            if (move_uploaded_file($news_pic["tmp_name"], $uploadFile)) {
                try {
                    $sqlCreateNews = "INSERT INTO newsassignment(news_name, news_description, news_time, news_pic) 
                                      VALUES (:news_name, :news_description, :news_time, :news_pic)";
                    $queryCreateNews = $conn->prepare($sqlCreateNews);
                    $queryCreateNews->bindParam(":news_name", $news_name);
                    $queryCreateNews->bindParam(":news_description", $news_description);
                    $queryCreateNews->bindParam(":news_time", $news_time);
                    $queryCreateNews->bindParam(":news_pic", $name_pic);
                    $queryCreateNews->execute();

                    if ($queryCreateNews->rowCount() > 0) {
                        echo "News created successfully!";
                    } else {
                        echo "Failed to save news in database.";
                    }
                } catch (PDOException $error) {
                    echo "Error: " . $error->getMessage();
                }
            } else {
                echo "Failed to upload the image.";
            }
        } else {
            echo "Invalid file type.";
        }
    }

    // อัปโหลดรูป content
    if (isset($_FILES['content_pic']) && count($_FILES['content_pic']['name']) > 0) {
        for ($i = 0; $i < count($_FILES['content_pic']['name']); $i++) {
            $fileName = $_FILES['content_pic']['name'][$i];
            $fileTmpName = $_FILES['content_pic']['tmp_name'][$i];
            $fileError = $_FILES['content_pic']['error'][$i];

            if ($fileError === 0) {
                $fileNewsName = uniqid('', true) . '-' . basename($fileName);
                $fileDestination = $uploadDir . $fileNewsName;

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $queryAddNewsPic = $conn->prepare("INSERT INTO newsassignment_pic(pic_name, newsassignment_id) 
                                                       VALUES(:fileNewsName, :newsassignment_id)");
                    $queryAddNewsPic->bindParam(":fileNewsName", $fileNewsName);
                    $queryAddNewsPic->bindParam(":newsassignment_id", $newsassignment_id);
                    $queryAddNewsPic->execute();
                }
            }
        }
    }

    // เพิ่ม content description
    foreach ($content_desc as $desc) {
        try {
            $queryNewsContent = $conn->prepare("INSERT INTO newsassignment_content(content_desc, newsassignment_id, content_type) 
                                                VALUES(:content_desc, :newsassignment_id, 'text')");
            $queryNewsContent->bindParam(":content_desc", $desc);
            $queryNewsContent->bindParam(":newsassignment_id", $newsassignment_id);
            $queryNewsContent->execute();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
