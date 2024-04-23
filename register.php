<?php
ob_start();
session_start();
if (isset($_SESSION['u']) && isset($_SESSION['p'])) {
    header("location:index.php");
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
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
                    <h2 class="pb-3">Register <span class="orange-text">Now</span></h2>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" id="fruitkha-contact" enctype="multipart/form-data" onSubmit="return valid_datas(this);">
                            <p><input type="text" placeholder="Name" name="uname" id="name"><br><span id="name-error" class="error-message"></span></p>
                            <p><input type="email" placeholder="Email" name="email" id="email"><br><span id="email-error" class="error-message"></span></p>
                            <p><input type="password" placeholder="Password" name="pwd" id="password"><br><span id="password-error" class="error-message"></span></p>
                            <p><input type="password" placeholder="Confirm Password" name="cpwd" id="cpassword"><br><span id="cpassword-error" class="error-message"></span></p>
                            <p>
                            <div class="upload-container">
                                <div class="upload-btn-wrapper">
                                    <button class="btn">Upload a Profile pic</button>
                                    <input type="file" name="myfile" id="file-input" onchange="previewFile()" />
                                </div>
                            </div>
                            <span id="file-error" class="error-message"></span>
                            </p>
                            <p><img id="file-preview" alt="File Preview" class="rounded-lg" style="max-width: 100px; max-height: 100px;" /></p>
                            <p>Already Have an Account? <a href="login.php">Login</a></p>
                            <p><input type="submit" value="Register" name="btn"></p>
                        </form>
                        <script src="/assets/js/jquery-1.11.3.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#file-input').change(function() {
                                    previewFile();
                                });

                                $('#myForm').submit(function(event) {
                                    if (!valid_datas(this)) {
                                        event.preventDefault();
                                    }
                                });
                            });

                            function previewFile() {
                                var preview = $('#file-preview');
                                var fileInput = $('#file-input')[0].files[0];
                                var reader = new FileReader();

                                reader.onloadend = function() {
                                    preview.attr('src', reader.result);
                                    preview.css('display', 'block');
                                };

                                if (fileInput) {
                                    reader.readAsDataURL(fileInput);
                                } else {
                                    preview.attr('src', '');
                                }
                            }

                            function valid_datas(form) {
                                var name = form.name.value.trim();
                                var email = form.email.value.trim();
                                var password = form.password.value.trim();
                                var cpassword = form.cpassword.value.trim();
                                var fileInput = $('#file-input');

                                $('input').css('border', '1px solid #ccc');
                                $('.error').text('');

                                if (name === '') {
                                    $(form.name).css('border', '1px solid red');
                                    $('#name-error').text('Please enter your name.');
                                    return false;
                                }

                                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                if (!emailRegex.test(email)) {
                                    $(form.email).css('border', '1px solid red');
                                    $('#email-error').text('Please enter a valid email address.');
                                    return false;
                                }

                                var passwordRegex = /^(?=.*[!@#$]).{8,}$/;
                                if (password === '' || !passwordRegex.test(password)) {
                                    $(form.password).css('border', '1px solid red');
                                    $('#password-error').text('Password should be at least 8 characters long and contain at least one special character (!, @, #, or $).');
                                    return false;
                                }

                                if (cpassword !== password) {
                                    $(form.cpassword).css('border', '1px solid red');
                                    $('#cpassword-error').text('Passwords do not match.');
                                    return false;
                                }

                                if (fileInput[0].files.length === 0) {
                                    $('#file-error').text('Please upload a profile pic.');
                                    return false;
                                }

                                var allowedFormats = ['jpg', 'jpeg', 'png'];
                                var fileName = fileInput[0].files[0].name.toLowerCase();
                                var fileFormat = fileName.split('.').pop();
                                if (!allowedFormats.includes(fileFormat)) {
                                    $('#file-error').text('File format not allowed. Please upload a jpg or png file.');
                                    return false;
                                }

                                return true;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->

    <?php include './include/footer.php' ?>
    <?php
    if (isset($_POST['btn'])) {
        $id = uniqid();
        $ue = $_POST['uname'];
        $ee = $_POST['email'];
        $pe = $_POST['pwd'];
        $cpe = $_POST['cpwd'];
        $user = "user";
        $fi = uniqid() . $_FILES['myfile']['name'];
        $token = uniqid();
        $addon_time = " +" . "30" . " minutes";
        $exp_time = date("H:i:s", strtotime(date("H:i:s") . $addon_time));
        $exp_date = date("Y-m-d");

        $check_email = "SELECT * FROM register WHERE email = '$ee'";
        $check_user = "SELECT * FROM register WHERE username = '$ue'";

        $result_check_email = mysqli_query($con, $check_email);
        $result_check_user = mysqli_query($con, $check_user);

        if ((mysqli_num_rows($result_check_email) > 0) || (mysqli_num_rows($result_check_user) > 0)) {
            if (mysqli_num_rows($result_check_email) > 0) {
                echo '<script type ="text/JavaScript">';
                echo 'document.getElementById("email-error").innerHTML = "This email id is already registered."';
                echo '</script>';
                exit();
            } elseif (mysqli_num_rows($result_check_user) > 0) {
                echo '<script type ="text/JavaScript">';
                echo 'document.getElementById("name-error").innerHTML = "This user name is already registered."';
                echo '</script>';
                exit();
            } elseif ((mysqli_num_rows($result_check_email) > 0) || (mysqli_num_rows($result_check_user) > 0)) {
                echo '<script type ="text/JavaScript">';
                echo 'document.getElementById("name-error").innerHTML = "This user name is already registered."';
                echo 'document.getElementById("email-error").innerHTML = "This email id is already registered."';
                echo '</script>';
                exit();
            }
        } else {
            if ($pe == $cpe) {

                move_uploaded_file($_FILES['myfile']['tmp_name'], "uploaded_image/" . $fi);

                $q1 = "INSERT INTO `temporary_register`(`temp_user_id`, `temp_username`, `temp_email`, `temp_password`, `temp_pic`, `temp_token`, `temp_user`, `exp_time`, `exp_date`) 
                VALUES ('$id','$ue', '$ee', '$pe', '$fi', '$token', '$user', '$exp_time', '$exp_date')";


                if (mysqli_query($con, $q1)) {

                    if ($ee != "") {
                        $tomail = $ee;

                        $q_user = "SELECT * FROM `register`  WHERE `email`='$tomail'";
                        $q_user_r = mysqli_query($con, $q_user);
                        if (mysqli_num_rows($q_user_r) != 1) {

                            $username = $ue;

                            require 'Mail/phpmailer/PHPMailerAutoload.php';

                            $mail = new PHPMailer;

                            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587;
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'tls';

                            $mail->Username = 'sdhaduk666@rku.ac.in';
                            $mail->Password = '7654321@Rku';

                            $mail->setFrom('sdhaduk666@rku.ac.in', 'Taste Eat');
                            $mail->addAddress($tomail);

                            $mail->isHTML(true);
                            $mail->Subject = "Urgent : Activate Your Account";
                            $mail->Body = "
                                <section style='margin:10px'>
                                    <h1 style='font-size: 30px;'>Hello,<small style='font-size: 20px;'> $username</small></h1>
                                    <p style='font-size: 18px;'>We are sending you this mail to activate your account in our website Taste Eat.</p>
                                    <small style='color: red;'>The activation link will expire after  <b><u> 30 Minutes. </u></b></small><br><br>
                                    
                                    <a href='http://localhost/main/activation.php?id=$id' style='background-color: #f18023; padding: 9px; text-decoration: none; color: #ffff; border-radius: 5px;'>Activate</a>
                                </section>
                        ";

                            if (!$mail->send()) {
                                echo 'error Email sending failed';
                            } else {
                                $_SESSION['toast_show'] = "true";
							    $_SESSION['toast_msg'] = "We have send you a activation mail to your email.";
                                header("location:login.php");
                            }
                        }
                    }

                }
            } else {
                echo " Password Is Not Match";
            }
        }
    }
    ?>