<?php
include 'sweet_alert.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("location:index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'configs/connect.php';

    if (isset($_POST["newsUpload"])) {
        // หัวข้อข่าว
        $newsassignment_id = $_POST["newsassignment_id"];
        $news_name = $_POST["news_name"];
        $news_description = $_POST["news_description"];
        $news_time = $_POST["news_time"];
        $news_pic = $_FILES["news_pic"];

        // id input

        // ตั้งค่า Directory เก็บรูปภพปกข่าว
        $UPLOADDIR = "uploads/";
        if (!is_dir($UPLOADDIR)) {
            mkdir($UPLOADDIR, 0777, true);
        }

        // เช็ครูปภาพหน้าปกของข่าว
        if ($news_pic["error"] === 0) {
            $extension = pathinfo($news_pic["name"], PATHINFO_EXTENSION); //เอาไว้ตรวจสอบ นามสกุลไฟล์
            $allowedExtensions = ["jpg", "jpeg", "png", "gif"]; //นามสกุลไฟล์ที่อนุญาต

            if (in_array(strtolower($extension), $allowedExtensions)) {
                $name_pic = uniqid("regnews_", false) . "." . $extension;
                $uploadFile = $UPLOADDIR . $name_pic;

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
                            echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'เพิ่มข้อมูลสำเร็จ',
                                    text: '',
                                    confirmButtonText: 'ตกลง'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'newsAssignmentManagement.php';
                                    }
                                })</script>";
                        } else {
                            echo "<script> Swal.fire({
                                    icon: 'error',
                                    title: 'ไม่สามารถเพิ่มข้อมูลได้',
                                    text: 'กรุณาลองใหม่อีกครั้ง',
                                    confirmButtonText: 'ตกลง'
                                })</script>";
                        }
                    } catch (PDOException $error) {
                        echo "Error: " . $error->getMessage();
                    }
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to upload the image.',
                            confirmButtonText: 'Try Again'
                        });
                    </script>";
                }
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid File Type!',
                        text: 'Only JPG, JPEG, PNG, and GIF files are allowed.',
                        confirmButtonText: 'OK'
                     }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'newsAssignmentManagement.php';
                                    }
                                })</script>";
            }
        }

        // ส่วนเนื้อหา ที่เป็น text
        $content_desc = $_POST["content_desc"];
        $count_content_desc = count($content_desc); //นับจำนวน content_desc
        $content_id_text = $_POST["content_id_text"];

        if (isset($content_desc)) {
            $content_type = "text";

            for ($i = 0; $i < $count_content_desc; $i++) {
                try {
                    $query_content = $conn->prepare("INSERT INTO newsassignment_content(content_id,content_desc,content_type,newsassignment_id) VALUES(:content_id,:content_desc,:content_type,:newsassignment_id)");
                    $query_content->bindParam(":content_desc", $content_desc[$i]);
                    $query_content->bindParam(":content_id", $content_id_text[$i]);
                    $query_content->bindParam(":content_type", $content_type);
                    $query_content->bindParam(":newsassignment_id", $newsassignment_id);
                    $query_content->execute();

                    if ($query_content->rowCount() > 0) {
                        echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Image has been successfully uploaded.',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'newsAssignmentManagement.php';
                                    }
                                })</script>";
                    } else {
                        echo "Failed to insert pic desc<br>";
                    }
                } catch (PDOException $err) {
                    echo "Error : " . $err->getMessage();
                }
            }
        }

        // ส่วนของเนื้อหาที่เป็น รูปภาพ
        $content_pic = $_FILES["content_pic"];
        $content_id_pic = $_POST["content_id_pic"];
        $content_pic_name = $content_pic["name"];
        $count_content_pic_name = count($content_pic_name);

        if (isset($content_pic)) {
            $content_type = "img";
            for ($i = 0; $i < $count_content_pic_name; $i++) {
                if ($content_pic["error"][$i] === 0) {
                    $uploadDir = "uploads/";
                    $extension = pathinfo($content_pic_name[$i], PATHINFO_EXTENSION);
                    $allowedExtensions = ["jpg", "jpeg", "png", "gif", "pdf"];

                    if (in_array(strtolower($extension), $allowedExtensions)) {
                        $name_pic = uniqid("news_", true) . "." . $extension;
                        $uploadFile = $uploadDir . $name_pic;

                        if (move_uploaded_file($content_pic["tmp_name"][$i], $uploadFile)) {
                            try {
                                $query_content = $conn->prepare("INSERT INTO newsassignment_content(content_id,content_desc, content_type, newsassignment_id) VALUES(:content_id,:content_desc, :content_type, :newsassignment_id)");
                                $query_content->bindParam(":content_id", $content_id_pic[$i]);
                                $query_content->bindParam(":content_desc", $name_pic);
                                $query_content->bindParam(":content_type", $extension);
                                $query_content->bindParam(":newsassignment_id", $newsassignment_id);
                                $query_content->execute();
                            } catch (PDOException $err) {
                                echo "Error: " . $err->getMessage();
                            }
                        } else {
                            echo "Failed to upload file: " . $content_pic["name"][$i] . "<br>";
                        }
                    } else {
                        echo "Invalid file type: " . $extension . "<br>";
                    }
                } else {
                    echo "Error with file: " . $content_pic["name"][$i] . "<br>";
                }
            }
        }
    }
}
