<?php include './include/header.php' ?>
<?php $id = $_GET['id']; ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>See more Details</p>
					<h1>Single Product</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->
<?php
$q2 = "SELECT * FROM `items` WHERE `item_id`='$id'";
$qr2 = mysqli_query($con, $q2);
if (mysqli_num_rows($qr2) == 1) {
	$roww = mysqli_fetch_assoc($qr2);
	$Ctr =  $roww['category'];
?>
	<!-- single product -->
	<div class="single-product mt-150 mb-100">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="uploaded_image/<?php echo $roww['item_image']; ?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $roww['item_name']; ?></h3>
						<p class="single-product-pricing"><span>Per Item</span> $<?php echo $roww['price']; ?></p>
						<p><?php echo $roww['description']; ?></p>
						<div class="single-product-form">
							<form action="index.php">
								<input type="number" id="qn" value="0" min="0" max="12" onblur="getQuantity()" onchange="totle()">
								<script>
									document.getElementById("qn").addEventListener("keydown", e => e.keyCode != 38 && e.keyCode != 40 && e.preventDefault());
								</script>
							</form>
							<?php
							if (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) { ?>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary custom-button" data-toggle="modal" data-target="#exampleModal<?php echo $id; ?>">
									<i class="fas fa-shopping-cart"></i> Buy
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel"><?php echo $roww['item_name']; ?> <b><i> Buy Now 🍔!</i></b></h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form method="post">
												<div class="modal-body">
													<div class="input-group input-group-lg my-1">
														<div class="input-group-prepend">
															<span class="input-group-text" id="inputGroup-sizing-lg">Item Name</span>
														</div>
														<input type="text" name="i_name" class="form-control" value="<?php echo $roww['item_name']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled>
													</div>
													<div class="input-group input-group-lg my-1">
														<div class="input-group-prepend">
															<span class="input-group-text" id="inputGroup-sizing-lg">Quantity</span>
														</div>
														<input type="number" id="qnm" name="quantity" value="0" min="0" max="12" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" onchange="totleM()" onblur="changedQ()">
														<script>
															function getQuantity() {
																var quantity = document.getElementById("qn");

																document.getElementById("qnm").value = quantity.value;
															}

															function changedQ() {
																var quantityC = document.getElementById("qnm");

																document.getElementById("qn").value = quantityC.value;
															}
														</script>
													</div>
													<div class="input-group input-group-lg my-1">
														<div class="input-group-prepend">
															<span class="" id="inputGroup-sizing-lg"><button type="button" class="btn mx-2" onclick="getLocation()" style="height: 42px; width: 42px; font-size: 10px; padding: 0;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="Black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
																		<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
																		<circle cx="12" cy="10" r="3" />
																	</svg></button></span>
														</div>
														<input type="text" id="ll" name="address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
														<script>
															function getLocation() {
																if (navigator.geolocation) {
																	navigator.geolocation.getCurrentPosition(showMap, showError);
																} else {
																	alert("Geolocation is not supported by this browser.");
																}
																showPosition();
															}

															function showError(error) {
																switch (error.code) {
																	case error.PERMISSION_DENIED:
																		alert("User denied the request for geolocation.");
																		break;
																	case error.POSITION_UNAVAILABLE:
																		alert("Location information is unavailable.");
																		break;
																	case error.TIMEOUT:
																		alert("The request to get user location timed out.");
																		break;
																	case error.UNKNOWN_ERROR:
																		alert("An unknown error occurred.");
																		break;
																}
															}

															function showPosition() {
																navigator.geolocation.getCurrentPosition(showMap, error);

																var quantity = document.getElementById("qnm").value;
																var one_item_price = document.getElementById("oip").value;

																console.log(quantity * one_item_price);

																document.getElementById("tp").value = (quantity * one_item_price);
															}

															function showMap(position) {
																var mylatlong = position.coords.latitude + "," + position.coords.longitude;

																document.getElementById("ll").value = mylatlong;
															}
														</script>
													</div>
													<div class="input-group input-group-lg my-1">
														<div class="input-group-prepend">
															<span class="input-group-text" id="inputGroup-sizing-lg">One Item Price</span>
														</div>
														<input type="number" class="form-control" id="oip" value="<?php echo $roww['price']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled>
													</div>
													<div class="input-group input-group-lg my-1">
														<div class="input-group-prepend">
															<span class="input-group-text" id="inputGroup-sizing-lg">Totel Price</span>
														</div>
														<input type="text" class="form-control" id="tp" name="price" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled>
														<script>
															function totle() {
																var quantity = document.getElementById("qn").value;
																var one_item_price = document.getElementById("oip").value;

																console.log(quantity * one_item_price);

																document.getElementById("tp").value = (quantity * one_item_price);
															}

															function totleM() {
																var quantity = document.getElementById("qnm").value;
																var one_item_price = document.getElementById("oip").value;

																console.log(quantity * one_item_price);

																document.getElementById("tp").value = (quantity * one_item_price);
															}
														</script>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary custom-button" name="Buy_Now">Buy Now</button>
												</div>
											</form>
											<?php
											if (isset($_POST['Buy_Now'])) {
												$order_id = uniqid();
												$user_name = @$_SESSION['u'];
												$email = @$_SESSION['e'];
												$item_name = $roww['item_name'];
												$quantity = @$_POST['quantity'];
												$price =  ($roww['price'] * $quantity);
												$address =  "https://www.google.com/maps/place/" . @$_POST['address'];
												$order_date = date('Y-m-d');
												$payment_status = "Pending";

												$q_cancelation = "SELECT * FROM `cancelation_time`";
												$q_cancelation_r = mysqli_query($con, $q_cancelation);
												if (mysqli_num_rows($q_cancelation_r) == 1) {
													$cancelation_row = mysqli_fetch_assoc($q_cancelation_r);
													$addon_time = " +" . $cancelation_row['time'] . " minutes";

													$newTime = date("H:i:s", strtotime(date("H:i:s") . $addon_time));
												}

												$order_time = $newTime;

												if (@$_POST['address'] != "") {

													$order = "INSERT INTO `order` (`order_id`, `user_name`, `email`, `item_name`, `quantity`, `price`, `address`,`date`,`time`,`payment_status`)VALUES('$order_id', '$user_name', '$email', '$item_name', '$quantity', '$price', '$address', '$order_date', '$order_time','$payment_status')";

													$result1 = mysqli_query($con, $order);

													if ($result1) {
														header("location:checkout.php?id=$order_id");
													}
												}
											}
											?>
										</div>
									</div>
								</div>
							<?php } else { ?>
								<a href="login.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Buy</a>
							<?php }
							?>
							<!-- <a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Buy</a> -->
							<p class="my-4"><strong>Categories: </strong><?php echo $roww['category']; ?></p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
	</div>
	<!-- end single product -->

	<div class="review-container">
		<div class="container mb-100">
			<?php
			if (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) { ?>
				<center>
					<h4>Leave a Review:</h4>
				</center>
				<div id="full-stars-example-two">
					<center>
						<div class="rating-group mb-5">
							<input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
							<label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
							<input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio" data-toggle="modal" data-target="#rating<?php echo $id; ?>">
							<label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
							<input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio" data-toggle="modal" data-target="#rating<?php echo $id; ?>">
							<label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
							<input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio" data-toggle="modal" data-target="#rating<?php echo $id; ?>">
							<label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
							<input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio" data-toggle="modal" data-target="#rating<?php echo $id; ?>">
							<label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
							<input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio" data-toggle="modal" data-target="#rating<?php echo $id; ?>">
						</div>
					</center>

					<!-- Button trigger modal -->
					<!-- <button type="button" class="btn btn-primary custom-button" data-toggle="modal" data-target="#exampleModal">
								Comments
							</button> -->

					<!-- Modal -->
					<div class="modal fade" id="rating<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="post">
									<div class="modal-body">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<strong class="m-2">★</strong><input type="text" value="" name="rating" class="" style="width: 30px; border: 0;" readonly>
											</div>
											<textarea cols="100" rows="3" placeholder="Message" name="review_comment" id="review_comment"></textarea>

										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary custom-button" name="review" onclick="descriptionAcj()">Save</button>
										<script>
											function descriptionAcj() {
												const description = document.getElementById('review_comment').value;
												document.getElementById('review_comment').value = description.replace(/['"]/g, match => match === "'" ? "''" : '""');
											};
										</script>
									</div>
								</form>
								<script>
									const radioButtons = document.getElementsByName('rating3');

									radioButtons.forEach((button) => {
										button.addEventListener('click', (event) => {
											const target = event.target;
											document.getElementsByName('rating')[0].value = target.value;
										});
									});
								</script>
								<?php
								if (isset($_POST['review'])) {
									$review_id = uniqid();
									$user_name = @$_SESSION['u'];
									$email = @$_SESSION['e'];
									$item_name = $roww['item_name'];
									$rating = @$_POST['rating'];
									$description = @$_POST['review_comment'];


									$q_update_review = "SELECT * FROM `review` WHERE `user_name`='$user_name' AND `item_name`='$item_name'";
									$q_update_review_r = mysqli_query($con, $q_update_review);
									if (mysqli_num_rows($q_update_review_r) == 1) {
										$q_update_review_3 = "UPDATE `review` SET `review_id` = '$review_id', `user_name` = '$user_name', `email` = '$email', `item_name` = '$item_name', `rating` = '$rating', `description` = '$description' WHERE `user_name`='$user_name' AND `item_name`='$item_name'";
										$q_update_review_3_result = mysqli_query($con, $q_update_review_3);

										if ($q_update_review_3_result) {
										}
									} else {
										if ($description != "") {

											$review = "INSERT INTO `review` (`review_id`, `user_name`, `email`, `item_name`, `rating`, `description`)VALUES('$review_id', '$user_name', '$email', '$item_name', '$rating', '$description')";

											$result1 = mysqli_query($con, $review);

											if ($result1) {
												header("location:index3.php");
											}
										}
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<h4>Reviews & Comments:</h4>
			<?php
			$rev_itemname = $roww['item_name'];
			$q_review = "SELECT * FROM `review` WHERE `item_name`='$rev_itemname'";
			$q_review_r = mysqli_query($con, $q_review);
			if (mysqli_num_rows($q_review_r) > 0) {
				while ($rowww = mysqli_fetch_assoc($q_review_r)) {
					$rev_us_profile = $rowww['user_name'];
			?>
					<div class="row">
						<div class="col-md-12">
							<div class="media">
								<?php
								$q_us = "SELECT * FROM `register` WHERE `username`='$rev_us_profile'";
								$q_us_r = mysqli_query($con, $q_us);
								if (mysqli_num_rows($q_us_r) > 0) {
									while ($row_profile = mysqli_fetch_assoc($q_us_r)) {
								?>
										<img src="<?php $pic = $row_profile['profilepic'];
													$word = "https";
													$avatarUrl = (strpos($pic, $word) === false) ? "uploaded_image/" . $pic : $pic;
													echo $avatarUrl; ?>" class="mr-3 rounded-circle" alt="User Image" style="width: 50px; height: 50px;">
								<?php
									}
								}
								?>
								<div class="media-body">
									<h5 class="mt-0 mb-1"><?php echo $rowww['user_name']; ?></h5>
									<strong>
										<p class="position-absolute" style="padding-left: 12px; padding-top: 5px; color: #f28123;"><b><?php echo $rowww['rating']; ?></b></p><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#f28123" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
											<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
										</svg>
									</strong>
									<p><?php echo $rowww['description']; ?></p>
								</div>
							</div>
						</div>
					</div>

					<hr style="border-top: 1px solid rgba(0,0,0,.2);" class="my-5">
			<?php
				}
			}
			?>
		</div>

	</div>

<?php
}
?>

<?php
if (isset($_SESSION['u']) && isset($_SESSION['p']) && isset($_SESSION['use'])) { ?>
	<div class="container mb-100">
		<div class="col-lg-12 mb-5 mb-lg-0 my-5">
			<div class="form-title">
				<h2>Have you any issue?</h2>
				<p>Feel free to ask us anything! We're here to assist you. Your questions and concerns are important to us. Reach out, and we'll provide the information you need with a commitment to excellent service.</p>
			</div>
			<div id="form_status"></div>
			<div class="contact-form">
				<form method="post" id="fruitkha-contact">
					<p>
						<input type="text" placeholder="Name" name="issue_name" id="issue_name" value="<?php echo $_SESSION['u']; ?>" disabled>
						<input type="email" placeholder="Email" name="issue_email" id="issue_email" value="<?php echo $_SESSION['e']; ?>" disabled>
					</p>
					<p>
						<input type="date" placeholder="" name="issue_date" id="issue_date" value="<?php echo date('Y-m-d'); ?>" disabled>
						<input type="text" placeholder="Subject" name="issue_subject" id="issue_subject">
					</p>
					<p><textarea name="issue_message" id="issue_message" cols="30" rows="10" placeholder="Message"></textarea></p>
					<!-- <input type="hidden" name="token" value="FsWga4&@f6aw" /> -->
					<p><input type="submit" value="Submit" name="issue_btn" onclick="descriptionIssue()"></p>
				</form>
				<script>
					function descriptionIssue() {
						const descriptionIssuee = document.getElementById('issue_message').value;
						document.getElementById('issue_message').value = descriptionIssuee.replace(/['"]/g, match => match === "'" ? "''" : '""');
					};
				</script>
				<?php
				if (isset($_POST['issue_btn'])) {
					$issue_id = uniqid();
					$user_name = @$_SESSION['u'];
					$email = @$_SESSION['e'];
					$date = date('Y-m-d');
					$subject = @$_POST['issue_subject'];
					$description = @$_POST['issue_message'];


					if ($description != "") {

						$issue_q = "INSERT INTO `issue` (`issue_id`, `user_name`, `email`, `date`, `subject`, `description`)VALUES('$issue_id', '$user_name', '$email', '$date', '$subject', '$description')";

						$issue_q_r = mysqli_query($con, $issue_q);

						if ($issue_q_r) {
							header("location:index3.php");
						}
					}
				}
				?>
			</div>
		</div>
	</div>
<?php } ?>

<!-- more products -->
<div class="more-products mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Related</span> Products</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$q12 = "SELECT * FROM `items` WHERE `category`='$Ctr' ORDER BY RAND() LIMIT 3";
			$qr12 = mysqli_query($con, $q12);
			if (mysqli_num_rows($qr12) > 0) {
				while ($row = mysqli_fetch_assoc($qr12)) {

			?>
					<div class="col-lg-4 col-md-6 text-center <?php echo $row['category']; ?>">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.php?id=<?php echo $row['item_id']; ?>"><img src="uploaded_image/<?php echo $row['item_image']; ?>" alt="<?php echo $roww['item_name']; ?>"></a>
							</div>
							<h3><?php echo $row['item_name']; ?></h3>
							<p class="product-price"><span>Per Item</span> <?php echo $row['price']; ?>$ </p>
							<a href="single-product.php?id=<?php echo $row['item_id']; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Buy</a>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>
<!-- end more products -->

<?php include './include/footer.php' ?>