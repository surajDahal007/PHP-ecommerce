<?php
    $conn = mysqli_connect('localhost','root','','diary');

    if (!$conn) {
        die('Could not connect to database due to --->' .mysqli_connect_error());
    }

    // echo 'Connected successfully';
?>