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

    <!-- products  -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-4 mx-4">
        <!-- get & display item from table  -->

        <?php 
        $sql = "SELECT * FROM `items`";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)) {
            $name = $row['item_name'];
            $image = $row['image'];
            $id = $row['item_no'];
            $price = $row['item_price'];

            echo '
            <div class="col my-3 py-2">
            <div class="card shadow-sm">
                    <img src="'. $image .' " height="300" alt="">
                    <title>'. $name .'</title>
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                <div class="card-body">
                    <h5 class="card-text">'. $name .'</h5>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="/e-commerce/product.php?id='. $id .'" type="button" class="btn btn-outline-primary">View Product</a>
                        </div>
                        <div class="fst-italic">
                           $'. $price .' 
                        </div>
                    </div>
                </div>
            </div>
        </div>
            ';
        }

    ?>
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