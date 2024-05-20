<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        include '_dbconnect.php';

        $id = $_POST['hidden_id'];
        $name = $_POST['hidden_name'];
        $price = $_POST['hidden_price'];
        $quantity = $_POST['quantity'];
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO `cart` (`user_id`, `item_name`, `quantity`, `price`, `timestamp`) VALUES ('$user_id', '$name', '$quantity', '$price', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $_SESSION['cart_item'] += $quantity;
        echo '<script>Item added to Cart</script>';

        // header("Location: /e-commerce/product.php?id=$id");
        header("Location: /e-commerce/?itemsuccess");
    }
    
?>