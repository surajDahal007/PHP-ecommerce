<?php
    session_start();
    include '_dbconnect.php';
?>


<nav class="navbar navbar-expand-lg border-bottom bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/e-commerce">P-COMMERCE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/e-commerce">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/e-commerce/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/e-commerce/contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/e-commerce/developer.php">Developer</a>
                </li>
            </ul>

            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<p class="mx-2 my-1 text-white">Hello '.$_SESSION['username'].'</p>'; 
                    echo'
                    <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        Logout
                    </button>
                    
                    <a href="/e-commerce/cart.php" class="btn btn-warning fw-bold" type="button">
                        Cart '. $_SESSION['cart_item'] .'
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                        </svg>
                    </a>
                    ';
                }
                else {
                    echo '
                    <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#signupModal">
                        Signup
                    </button>
                    ';
                }
            ?>
        </div>
    </div>
</nav>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModal">Login in P-commerce</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/e-commerce/partials/_handleLogin.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModal">Signup in P-commerce</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form is here  -->
                <form action="/e-commerce/partials/_handleSignup.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logoutModal">Logout of P-commerce?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You can always log back in at any time.
                Make sure you purchase all items that you intended to.
                <div class="vstack gap-2 col-md-5 mx-auto my-4">
                    <a href="partials/_handleLogout.php" type="button" class="btn btn-success">
                        Logout
                    </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_GET['signupsuccess'])) {
        echo '
          <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Congratulations!</strong> You have signed up in P-commerce. You can now Login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
    }

    if (isset($_GET['loginsuccess'])) {
        echo '
        <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Welcome! </strong> LoggedIn Successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }

    if (isset($_GET['loginfailure'])) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error! </strong> Could not log you
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }

    if (isset($_GET['itemsuccess'])) {
        echo '
          <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Item added to Cart.</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
    }

    if (isset($_GET['itemremoved'])) {
        echo '
          <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Item successfully removed from Cart.</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
    }

    if (isset($_GET['allitemremoved'])) {
        echo '
          <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>All Items removed from Cart.</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
    }

    if (isset($_GET['error'])) {
        $err = $_GET['error'];

        echo '
        <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error! </strong>'. $err .'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
?>