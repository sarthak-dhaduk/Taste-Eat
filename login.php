<?php
ob_start();
session_start();

if (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) {
    header("location:index.php");
}
if (isset($_GET['status']) && $_GET['status'] == "activated") {
    $_SESSION['toast_show'] = "false";
    $_SESSION['toast_msg'] = "Your account has been activated successfully.";
    $toastShow = isset($_SESSION['toast_show']);
}elseif (isset($_GET['status']) && $_GET['status'] == "set") {
    $_SESSION['toast_show'] = "false";
    $_SESSION['toast_msg'] = "Your password has been updated successfully.";
    $toastShow = isset($_SESSION['toast_show']);
}else{
    $toastShow = isset($_SESSION['toast_show']);
}
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

    <style>
        /* Custom CSS */
        .position-fixed-bottom-end {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 1rem;
            z-index: 100;
        }
    </style>
</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <div class="position-fixed-bottom-end">
        <div id="liveToast" class="toast <?= $toastShow ? 'show' : '' ?>" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header py-2" style="background-color: #07212e;">
                <img src="assets/img/favicon2.png" height="40" width="40" class="rounded mr-2" alt="Placeholder">
                <strong class="mr-auto" style="color: #F28123;">Taste Eat</strong>
                <small class="text-light pt-3 p-2">1 sec ago</small>
                <button type="button" class="close p-2 text-light" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?php if (isset($_SESSION['toast_msg'])) {
                    echo $_SESSION['toast_msg'];
                } ?>
                <?php
                if ($_SESSION['toast_show'] == "true") { ?>
                    <div class="mt-2 pt-2 border-top">
                        <a href="https://mail.google.com/" class="btn" target="_blank">Check Now</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

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
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="shop.php">Menu</a></li>
                                <li>
                                    <?php
                                    if ((isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) || (isset($_SESSION['ue']) && isset($_SESSION['pe']) && isset($_SESSION['user']))) {
                                    ?>
                                        <div class="header-icons">
                                            <form method="post">
                                                <button class="mobile-hide search-bar-icon button-like-link" style="background:transparent; border:0; color:#fff;" name="profile"><i class="fas fa-user"></i></button>
                                                <?php
                                                if (isset($_POST['profile'])) {

                                                    if ($_SESSION['use'] == "admin") {
                                                        header("location:index2.php");
                                                    } elseif ($_SESSION['use'] == "creater") {
                                                        header("location:admin_creater.php");
                                                    } elseif ($_SESSION['user'] == "creater") {
                                                        header("location:admin_creater.php");
                                                    } else {
                                                        header("location:admin_user.php");
                                                    }
                                                }
                                                ?>
                                                <a>
                                                    <button class="button-like-link" name="btn" onclick="handleLogoutClick()"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                                </a>
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
                                        </div>
                                        <?php
                                        if (isset($_POST['btn'])) {
                                            session_destroy();
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

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section-log-reg"></div>
    <!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row" style="margin-top: -6rem;">
                <div class="col-lg-8">
                    <h2 class="pb-3">Login <span class="orange-text">Here</span></h2>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form id="fruitkha-contact" method="post" action="login.php" onsubmit="return validateForm()">
                            <p><input type="email" placeholder="Enater Email Address..." name="email" id="email"></p>
                            <p><input type="password" placeholder="Enater Password..." name="pwd" id="password"></p>
                            <p><a href="forgetpsw.php">Forget Password ?</a></p>
                            <p>Don't Have any Account? <a href="register.php">Register</a></p>
                            <p><input type="submit" name="btn" value="Login"></p>
                        </form>

                        <script src="/assets/js/jquery-1.11.3.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#submit-btn').click(function(event) {
                                    if (!validateForm()) {
                                        event.preventDefault();
                                    }
                                });
                            });

                            function validateForm() {
                                var email = $('#email').val().trim();
                                var password = $('#password').val().trim();

                                // Clear previous error styles and messages
                                clearErrorStyles();

                                // Simple validation example
                                if (!email) {
                                    displayError('email', 'User Name is required.');
                                    return false;
                                }

                                if (!password) {
                                    displayError('password', 'Password is required.');
                                    return false;
                                }

                                // Clear previous error messages
                                clearErrorMessages();
                                return true;
                            }

                            function displayError(fieldName, message) {
                                $('#' + fieldName).addClass('error');
                                displayErrorMessage(fieldName, message);
                            }

                            function displayErrorMessage(fieldName, message) {
                                var errorMessage = $('<p class="error-message"></p>').text(message);
                                $('#' + fieldName).parent().append(errorMessage);
                            }

                            function clearErrorStyles() {
                                $('.error').removeClass('error');
                                clearErrorMessages();
                            }

                            function clearErrorMessages() {
                                $('.error-message').remove();
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->


    <?php include './include/footer.php' ?>
    <script>
        $(document).ready(function() {
            <?php if ($toastShow) : ?>
                setTimeout(function() {
                    $('.toast').toast('show');
                }, 500);
            <?php
                unset($_SESSION['toast_show'], $_SESSION['toast_msg']);
            endif;
            ?>
        });
    </script>
    <?php
    if (isset($_POST['btn'])) {
        $e = mysqli_real_escape_string($con, $_POST['email']);
        $p = mysqli_real_escape_string($con, $_POST['pwd']);

        $query = "SELECT * FROM `register` WHERE `email`='$e' AND `password`='$p'";
        $results = mysqli_query($con, $query);

        $query_of_status = "SELECT * FROM `register` WHERE `email`='$e' AND `password`='$p'";
        $results_of_status = mysqli_fetch_assoc(mysqli_query($con, $query_of_status));
        $use = $results_of_status['user'];
        $u = $results_of_status['username'];
        if (mysqli_num_rows($results) == 1) {

            $_SESSION['u'] = $u;
            $_SESSION['e'] = $e;
            $_SESSION['p'] = $p;
            $_SESSION['use'] = $use;
            if ($use == "admin") {
                header("location:index2.php");
            } else {
                header("location:index.php");
            }
        } else {
    ?>
            <script>
                function registration() {
                    alert("Error");
                }
            </script>
    <?php
        }
    }
    ?>