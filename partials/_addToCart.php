<?php
    include '_dbconnect.php';
        
        $id = $_GET['id'];
        $sql = "INSERT INTO `cart` (`item_no`, `quantity`, `timestamp`) VALUES ('$id', '1', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo 'Unsuccessful due to --->'. mysqli_error($conn);
        }

        echo "Succcessfully added to cart";
        header("Location: /e-commerce/product.php?id=$id");
?>