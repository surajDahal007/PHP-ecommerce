<?php
    include '_dbconnect.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM `cart` WHERE `user_id` = $user_id";
    $result = mysqli_query($conn,$sql);

    // if (condition) {
    //     # code...
    // }
    session_destroy();
    header("Location: /e-commerce");
?>