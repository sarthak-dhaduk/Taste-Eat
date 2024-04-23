<?php include './include/header.php' ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section-log-reg"></div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row" style="margin-top: -6rem;">
            <div class="col-lg-8">
                <h2 class="pb-3">Recover <span class="orange-text">Now...</span></h2>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" id="fruitkha-contact" onSubmit="return validatePassword()">
                        <p>
                            <input type="password" placeholder="Enter New Password..." name="pwd" id="pwd">
                        <div id="pwd-error" class="text-danger"></div>
                        </p>
                        <p>
                            <input type="password" placeholder="Confirm Password..." name="cpwd" id="cpwd">
                        <div id="cpwd-error" class="text-danger"></div>
                        </p>
                        <p>Back to Login? <a href="login.php">Login</a></p>
                        <p><input type="submit" name="change_pwd" value="Change Now !"></p>
                    </form>
                    <div id="error-message" class="alert alert-danger d-none"></div>
                    <?php
                    if (isset($_POST['change_pwd'])) {
                        if ($_GET['token'] != "") {
                            $token = $_GET['token'];

                            $q_user = "SELECT * FROM `register`  WHERE `token`='$token'";
                            $q_user_r = mysqli_query($con, $q_user);
                            if (mysqli_num_rows($q_user_r) == 1) {
                                $user_row = mysqli_fetch_assoc($q_user_r);
                                $pwd = $_POST['pwd'];
                                $cpwd = $_POST['cpwd'];
                                if ($pwd == $cpwd) {
                                    $q_edit_user_1 = "UPDATE `register` SET `password` = '$pwd'  WHERE `token`='$token'";
                                    $result_q_edit_user_1 = mysqli_query($con, $q_edit_user_1);

                                    if ($result_q_edit_user_1) {
                                        $_SESSION['pass_change'] = true; // Set session variable to indicate email sent
                                        header("location:login.php");
                                    }
                                }
                            }
                        } else {
                            header("location:index.php");
                        }
                    }
                    ?>
                    <script>
                        function validatePassword() {
                            var pwd = document.getElementById('pwd').value;
                            var cpwd = document.getElementById('cpwd').value;
                            var pwdError = document.getElementById('pwd-error');
                            var cpwdError = document.getElementById('cpwd-error');
                            var errorMessage = document.getElementById('error-message');
                            var regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;

                            pwdError.innerHTML = "";
                            cpwdError.innerHTML = "";

                            if (pwd.trim() === '') {
                                pwdError.innerHTML = "Password is required.";
                                document.getElementById('pwd').style.borderColor = "red";
                            } else if (!regex.test(pwd)) {
                                pwdError.innerHTML = "Password must be at least 8 characters long and contain at least one uppercase letter and one special character.";
                                document.getElementById('pwd').style.borderColor = "red";
                            }
                            if (cpwd.trim() === '') {
                                cpwdError.innerHTML = "Confirm Password is required.";
                                document.getElementById('cpwd').style.borderColor = "red";
                            }
                            if (pwd !== cpwd) {
                                cpwdError.innerHTML = "Passwords do not match.";
                                document.getElementById('pwd').style.borderColor = "red";
                                document.getElementById('cpwd').style.borderColor = "red";
                            }
                            if (pwd.trim() === '' || cpwd.trim() === '' || pwd !== cpwd) {
                                errorMessage.innerHTML = "Please fix the errors above.";
                                return false;
                            } else {
                                document.getElementById('pwd').style.borderColor = "";
                                document.getElementById('cpwd').style.borderColor = "";
                                errorMessage.classList.add('d-none');
                                return true;
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->

<?php include './include/footer.php' ?>