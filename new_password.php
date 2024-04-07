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
                    <form method="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
                        <p><input type="password" placeholder="Enter New Password..." name="pwd" id="pwd"></p>
                        <p><input type="text" placeholder="Conform Password..." name="cpwd" id="cpwd"></p>
                        <p>Back to Login? <a href="login.php">Login</a></p>
                        <p><input type="submit" name="change_pwd" value="Change Now !"></p>
                    </form>
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
                                        header("location:login.php");
                                    }
                                }
                            }
                        } else {
                            header("location:index.php");
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