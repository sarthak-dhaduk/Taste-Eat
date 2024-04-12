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
						<p><input type="email" placeholder="Email" name="email" id="email"></p>
						<p>Back to Login? <a href="login.php">Login</a></p>
						<p><input type="submit" name="mail_send" value="SEND"></p>
					</form>
					<?php
					if (isset($_POST['mail_send'])) {
						if ($_POST['email'] != "") {
							$tomail = @$_POST['email'];

							$q_user = "SELECT * FROM `register`  WHERE `email`='$tomail'";
							$q_user_r = mysqli_query($con, $q_user);
							if (mysqli_num_rows($q_user_r) == 1) {
								$user_row = mysqli_fetch_assoc($q_user_r);
								$token = $user_row['token'];
								$username = $user_row['username'];

								require 'Mail/phpmailer/PHPMailerAutoload.php';

								$mail = new PHPMailer;

								$mail->SMTPDebug = SMTP::DEBUG_SERVER;
								$mail->isSMTP();
								$mail->Host = 'smtp.gmail.com';
								$mail->Port = 587;
								$mail->SMTPAuth = true;
								$mail->SMTPSecure = 'tls';

								$mail->Username = 'sdhaduk666@rku.ac.in';
								$mail->Password = '*****';

								$mail->setFrom('sdhaduk666@rku.ac.in', 'Password Reset');
								$mail->addAddress($tomail);

								$mail->isHTML(true);
								$mail->Subject = "Recover your password";
								$mail->Body = "
									<section style='margin:10px'>
										<h1 style='font-size: 30px;'>Hello,<small style='font-size: 20px;'> $username</small></h1>
										<p style='font-size: 18px;'>We are sending you this mail to recover your account in our website Taste Eat.</p>
										<a href='http://localhost/main/new_password.php?token=$token' style='background-color: #f18023; padding: 9px; text-decoration: none; color: #ffff; border-radius: 5px;'>Recover Now !</a>
									</section>
							";

								if (!$mail->send()) {
									echo 'error Email sending failed';
								} else {
									header("location:login.php");
								}
							}
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