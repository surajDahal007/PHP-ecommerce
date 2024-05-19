<?php
    session_start();
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
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="What are you looking?" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<p class="mx-2 my-1 text-white">Hello '.$_SESSION['username'].'</p>'; 
                    echo'
                    <a href="partials/_handleLogout.php" type="button" class="btn btn-success mx-2">
                        Logout
                    </a>
                    <button class="btn border btn-warning fw-bold" type="button">Cart</button>
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
                        <input type="password" class="form-control" id="password" name="password">
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