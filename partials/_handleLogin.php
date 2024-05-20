<?php
    $showErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if ($numRows==1) {
            $row = mysqli_fetch_assoc($result);
          
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['first_name'];
                $_SESSION['userEmail'] = $email;
                $_SESSION['user_id'] = $row['sno']; 
                $_SESSION['cart_item'] = 0;

                    
                header("Location: /e-commerce/index.php?loginsuccess");
            }else {
                header("Location: /e-commerce/index.php?loginfailure");
                // password didn't match
            }
        }
        else {
            $showErr = "Email does not exist.";
            header("Location: /e-commerce/index.php?error=$showErr");

        }
     
    }
?>