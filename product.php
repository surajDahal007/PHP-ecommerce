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
        $id = $_GET['id'];

        $sql = "SELECT * FROM `items` WHERE `item_no` = $id";
        $result = mysqli_query($conn, $sql);

        echo '
            <div class="container py-4">
            <div class="p-5 mb-4 bg-body-tertiary border rounded-3">
        ';


        if ($row = mysqli_fetch_assoc($result)) {
            echo '
                <div class="container-fluid py-5">
                    <img src="'. $row['image'] .'" height="350" class="rounded float-end" alt="item image">
                    <h1 class="display-5 fw-bold">'. $row['item_name'] .'</h1>

                    <p class="fw-bold fst-italic text-primary">'. $row['item_category'] .'</p>                        <p class="fw-bold">Price - $'. $row['item_price'] .'</p>
                    <p class="col-md-8 fs-4">'. $row['item_description'] .'</p>
                </div>
            ';
        }

        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '

            <div class="d-flex justify-content-between">
                <form action="partials/_addToCart.php" method="post">
                    <input type="hidden" name="hidden_id" id="item_name" value="'. $row['item_no'] .'">
                    <input type="hidden" name="hidden_name" id="item_name" value="'. $row['item_name'] .'">
                    <input type="hidden" name="hidden_price" id="item_price" value="'. $row['item_price'] .'">
                    <input type="number" name="quantity" id="quantity" placeholder="Quantity">
        
                    <button type="submit" class="btn btn-outline-success">
                        Add to Cart
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check"
                            viewBox="0 0 16 16">
                            <path
                                d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                            <path
                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg>
                    </button>
                </form>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mx-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Buy Now
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill " viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                    </svg>
                </button>
            </div>
            ';
        }
        else {
            echo '
                <div class="alert alert-danger fw-bold" role="alert">
                    Please Login to buy items.
                </div>
            ';
        } 

        echo '   
            </div>
        </div>'
        ;
    ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">BUY NOW</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This feature coming soon, stay tuned.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        if (!empty($_SESSION['cart'])) {
            $total = 0;

            foreach ($_SESSION['cart'] as $key => $value) {
                echo $value['item_name'];
                echo $value['item_quantity'];
                echo $value['item_price'];
                echo 'total - '. $value['item_price']*$value['item_quantity'];

            }
        }
    ?>


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