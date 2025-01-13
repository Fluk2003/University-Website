<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ออกจากระบบ</title>
</head>
<body>
    <script>
        const userConfirm = confirm("คุณต้องการออกจากระบบใช่ไหม") ;
        if(userConfirm == true) {
            window.location.href = 'logout_process.php' ;
        }else {
            window.history.back();
        }

    </script>
</body>
</html>

