<?php
    include '_dbconnect.php';

        $quantity = $_GET['quantity'];
        $sql = "INSERT INTO `cart` (`item_no`, `quantity`, `timestamp`) VALUES ('$id', '$quantity', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo 'Unsuccessful due to --->'. mysqli_error($conn);
        }

        echo "Succcessfully added to cart";
        header("Location: /e-commerce");
?>