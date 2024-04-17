<?php include './include/header.php' ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section-log-reg"></div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row" style="margin-top: -6rem;">
            <div class="col-lg-8">
                <h2 class="pb-3">Set Password <span class="orange-text">Now...</span></h2>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
                        <p><input type="password" placeholder="Enter New Password..." name="pwd" id="pwd"></p>
                        <p><input type="text" placeholder="Conform Password..." name="cpwd" id="cpwd"></p>
                        <p>Back to Login? <a href="login.php">Login</a></p>
                        <p><input type="submit" name="set_pwd" value="Set Now !"></p>
                    </form>
                    <?php
                    $email = $_GET['email'];

                    $q_user = "SELECT * FROM `register`  WHERE `email`='$email'";
                    $q_user_r = mysqli_query($con, $q_user);
                    if (mysqli_num_rows($q_user_r) == 1) {
                        $row = mysqli_fetch_assoc($q_user_r);

                        $_SESSION['u'] = $row['username'];
                        $_SESSION['e'] = $row['email'];
                        $_SESSION['p'] = $row['password'];
                        $_SESSION['use'] = $row['user'];
                        header("location:index.php");
                    }

                    if (isset($_POST['set_pwd'])) {
                        if (($_GET['email'] != "") && ($_GET['picture'] != "")) {
                            $first_name = $_GET['first'];
                            $last_name = $_GET['last'];
                            $email = $_GET['email'];
                            $picture = $_GET['picture'];

                            $ue = $first_name . $last_name;
                            $ee = $email;
                            $pwd = $_POST['pwd'];
                            $cpwd = $_POST['cpwd'];
                            $user = "user";
                            $fi = $picture;
                            $token = uniqid();

                            $q_user = "SELECT * FROM `register`  WHERE `email`='$email'";
                            $q_user_r = mysqli_query($con, $q_user);
                            if (mysqli_num_rows($q_user_r) == 0) {
                                if ($pwd == $cpwd) {

                                    $q_edit_user_1 = "INSERT INTO `register` (`username`, `email`, `password`, `user`, `profilepic`, `token`) VALUES ('$ue', '$ee', '$pwd', '$user', '$fi', '$token')";
                                    $result_q_edit_user_1 = mysqli_query($con, $q_edit_user_1);

                                    if ($result_q_edit_user_1) {
                                        $_SESSION['u'] = $ue;
                                        $_SESSION['e'] = $ee;
                                        $_SESSION['p'] = $pwd;
                                        $_SESSION['use'] = $user;
                                        header("location:index.php");
                                    }
                                }
                            } else {
                                $_SESSION['u'] = $ue;
                                $_SESSION['e'] = $ee;
                                $_SESSION['p'] = $pwd;
                                $_SESSION['use'] = $user;
                                header("location:index.php");
                            }
                        } else {
                            header("location:register.php");
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->

<?php include './include/footer.php' ?>