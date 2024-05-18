<?php
    include '_dbconnect.php';

    $err="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // check whether email exist in db or not
        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $err = "This email is already in use. Choose another one.";
        }
        else {
            if ($password == $cpassword) {
                $hash = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `timestamp`) VALUES ('$fname', '$lname', '$email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
    
                if (!$result) {
                    $err = mysqli_error($conn);
                }
    
                header("Location: /e-commerce/index.php?signupsuccess");
                exit();
            }
            else {
                $err = 'Password didn\'t match';
            }
        }

        header("Location: /e-commerce/index.php?error=$err");
    }

?>