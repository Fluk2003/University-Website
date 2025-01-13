<?php
session_start() ;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../configs/connect.php';

    if(isset($_POST["login"])) {
        // echo "login success" ;

        $username = htmlspecialchars($_POST["username"] );
        $password = htmlspecialchars($_POST["password"]) ;

        $queryLogin = $conn->prepare("SELECT * FROM admin WHERE admin_username = :username AND admin_password = :password ") ;
        $queryLogin->bindParam(":username" , $username );
        $queryLogin->bindParam(":password" , $password) ;
        $queryLogin->execute() ;

        if($queryLogin->rowCount() > 0) {
            $_SESSION["admin"] = $username ;
            header("location: ../admin.php");
        }else {
            echo "not have an account";
        }

    }
}


?>