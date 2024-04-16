<?php
ob_start();
session_start();
?>
<?php include_once 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Taste - Eat</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon2.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- razopay checkout js -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

    <!--PreLoader-->
    <!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php">
                                <img src="assets/img/logo2.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <!-- <li><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="404.php">404 page</a></li>
                                        <li><a href="checkout.php">Check Out</a></li>
                                        
                                    </ul>
                                </li> -->
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="shop.php">Menu</a></li>
                                <li>
                                    <?php
                                    if ((isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) || (isset($_SESSION['ue']) && isset($_SESSION['pe']) && isset($_SESSION['user']))) {
                                    ?>
                                        <div class="header-icons mt-3">
                                            <form method="post">
                                                <div>
                                                    <button class="mobile-hide search-bar-icon button-like-link ml-2 float-left" style="background:transparent; border:0; color:#fff;" name="profile"><i class="fas fa-user"></i></button>
                                                    <button class="button-like-link ml-3 float-left" name="btn" onclick="handleLogoutClick()"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                    </div>
                                                <style>
                                                    .button-like-link {
                                                        display: inline-block;
                                                        background-color: transparent;
                                                        color: white;
                                                        font-weight: bold;
                                                        border: none;
                                                        cursor: pointer;
                                                    }

                                                    .button-like-link:hover {
                                                        color: #F28123;
                                                        /* Change text color on hover to #F28123 */
                                                    }
                                                </style>
                                                <!-- <button name="btn">Logout</a> -->
                                            </form>
                                            <?php
                                                if (isset($_POST['profile'])) {

                                                    if ($_SESSION['use'] == "admin") {
                                                        header("location:index2.php");
                                                    } elseif ($_SESSION['use'] == "user") {
                                                        header("location:index3.php");
                                                    } else {
                                                        header("location:index.php");
                                                    }
                                                }
                                                ?>
                                        </div>
                                        <?php
                                        if (isset($_POST['btn'])) {
                                            unset($_SESSION['u']);
                                            unset($_SESSION['p']);
                                            unset($_SESSION['use']);
                                            unset($_SESSION['e']);
                                            unset($_SESSION['ue']);
                                            unset($_SESSION['pe']);
                                            unset($_SESSION['user']);
                                            header("location:index.php");
                                        ?>
                                            <div class="header-icons">
                                                <a href="login.php">Login</a>
                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="header-icons">
                                            <a href="login.php">Login</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </li>
                            </ul>
                        </nav>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->