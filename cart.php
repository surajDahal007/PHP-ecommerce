<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_header.php' ?>
    <?php
        $user_id = $_SESSION['user_id'];
        $count = 0;
        $total = 0;
    ?>

    <!-- cart portion  -->
    <div class="container">
    <h1 class="my-5">My Shopping Cart</h1>
        <table class="table table-hover py-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM `cart` where `user_id` = $user_id";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $total + ($row['price'] * $row['quantity']);
                    echo '
                        <tr>
                            <th scope="row">'. ++$count .'</th>
                            <td>'. $row['item_name'] .'</td>
                            <td>'.$row['quantity'].'</td>
                            <td>$ '.$row['price'].'</td>
                            <td>$ '.$row['price'] * $row['quantity'].'</td>
                            <td>
                                <button type="button" class="btn btn-info">Remove</button>
                            </td>
                        </tr>
                        ';
                    }
                    echo '
                        <tr >
                            <td class="fw-bold mx-5">Grant Total :  </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="fw-bold">$ '. $total .'</td>
                            <td>
                                <button type="button" class="btn btn-danger">Remove All Items</button>
                            </td>
                        </tr>'
                    ;
                ?>
            </tbody>
        </table>
    </div>


    <!-- Footer -->
    <?php include 'partials/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>