<?php include './include/header.php' ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Get 24/7 Support</p>
					<h1>Contact us</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="form-title">
					<h2>Have you any question?</h2>
					<p>Feel free to ask us anything! We're here to assist you. Your questions and concerns are important to us. Reach out, and we'll provide the information you need with a commitment to excellent service.</p>
				</div>
				<div id="form_status"></div>
				<div class="contact-form">
					<?php
					if (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) { ?>
						<form method="post" id="fruitkha-contact">
							<p>
								<input type="text" placeholder="Name" name="contact_name" id="contact_name" value="<?php echo $_SESSION['u']; ?>" disabled>
								<input type="email" placeholder="Email" name="contact_email" id="contact_email" value="<?php echo $_SESSION['e']; ?>" disabled>
							</p>
							<p>
								<input type="date" placeholder="" name="contact_date" id="contact_date" value="<?php echo date('Y-m-d'); ?>" disabled>
								<input type="text" placeholder="Subject" name="contact_subject" id="contact_subject">
							</p>
							<p><textarea name="contact_message" id="contact_message" cols="30" rows="10" placeholder="Message"></textarea></p>
							<!-- <input type="hidden" name="token" value="FsWga4&@f6aw" /> -->
							<p><input type="submit" value="Submit" name="contact_btn" onclick="descriptionAcj()"></p>
						</form>
					<?php } else { ?>
						<form id="fruitkha-contact">
							<p>
								<input type="text" placeholder="Name" name="contact_name" id="contact_name">
								<input type="email" placeholder="Email" name="contact_email" id="contact_email">
							</p>
							<p>
								<input type="date" placeholder="" name="contact_date" id="contact_date">
								<input type="text" placeholder="Subject" name="contact_subject" id="contact_subject">
							</p>
							<p><textarea name="contact_message" id="contact_message" cols="30" rows="10" placeholder="Message"></textarea></p>
							<!-- <input type="hidden" name="token" value="FsWga4&@f6aw" /> -->
							<p><a href="login.php" class="cart-btn">Submit</a></p>
							
						</form>
					<?php } ?>
					<script>
						function descriptionAcj() {
							const description = document.getElementById('contact_message').value;
							document.getElementById('contact_message').value = description.replace(/['"]/g, match => match === "'" ? "''" : '""');
						};
					</script>
					<?php
					if (isset($_POST['contact_btn'])) {
						$contact_id = uniqid();
						$user_name = @$_SESSION['u'];
						$email = @$_SESSION['e'];
						$date = date('Y-m-d');
						$subject = @$_POST['contact_subject'];
						$description = @$_POST['contact_message'];

						if ($description != "") {

							$contact_q = "INSERT INTO `contact_us` (`contact_id`, `user_name`, `email`, `date`, `subject`, `description`)VALUES('$contact_id', '$user_name', '$email', '$date', '$subject', '$description')";

							$contact_q_r = mysqli_query($con, $contact_q);

							if ($contact_q_r) {
							}
						}
					}
					?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-form-wrap">
					<div class="contact-form-box">
						<h4><i class="fas fa-map"></i> Shop Address</h4>
						<p>Bhavnagar Highway, Tramba, <br> Rajkot, Gujarat 360020. - <br> Bharat</p>
					</div>
					<div class="contact-form-box">
						<h4><i class="far fa-clock"></i> Shop Hours</h4>
						<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
					</div>
					<div class="contact-form-box">
						<h4><i class="fas fa-address-book"></i> Contact</h4>
						<p>Phone: +91 82000 20676 <br> Email: support@tasteeat.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
			</div>
		</div>
	</div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.993955071081!2d70.89827967474777!3d22.240308145068305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b4a660019ee9%3A0x3d6254f36ed0e794!2sRK%20University%20Main%20Campus!5e0!3m2!1sen!2sin!4v1708536177452!5m2!1sen!2sin" width="600" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	<!-- https://www.google.com/maps/dir/22.2432133,70.9023246/19.07283,72.88261/ -->
	<!-- https://www.google.com/maps/place/22.2363648,70.8968448 -->
</div>
<!-- end google map section -->


<?php include './include/footer.php' ?>