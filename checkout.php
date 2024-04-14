<?php include './include/header.php' ?>

<?php
$id = $_GET['id'];
$KEY_API_945549 = "rzp_test_k364nkzcSun9MI";
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Check Out Product</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
	<?php
	$q_checkout = "SELECT * FROM `order` WHERE `order_id`='$id'";
	$q_checkout_r = mysqli_query($con, $q_checkout);
	if (mysqli_num_rows($q_checkout_r) == 1) {
		$row = mysqli_fetch_assoc($q_checkout_r);
		$itemname = $row['item_name'];
	?>
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Your order Details
										</button>
									</h5>
								</div>
								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<?php
									$q_checkout_item = "SELECT * FROM `items` WHERE `item_name`='$itemname'";
									$q_checkout_item_r = mysqli_query($con, $q_checkout_item);
									if (mysqli_num_rows($q_checkout_item_r) == 1) {
										$rowww = mysqli_fetch_assoc($q_checkout_item_r);
									?>
										<div class="card-body d-flex justify-content-center">
											<div class="card mb-3" style="max-width: 540px;">
												<div class="row g-0">
													<div class="col-md-4 p-4">
														<img src="uploaded_image/<?php echo $rowww['item_image']; ?>" class="img-fluid rounded-start" alt="">
													</div>
													<div class="col-md-8">
														<div class="card-body">
															<h5 class="card-title"><?php echo $row['item_name']; ?></h5>
															<p class="card-text"><?php echo $rowww['description']; ?></p>
															<ul class="list-group list-group-flush">
																<li class="list-group-item">Name : <?php echo $row['user_name']; ?></li>
																<li class="list-group-item">Email : <?php echo $row['email']; ?></li>
																<li class="list-group-item">Price of one <?php echo $row['item_name']; ?> : <?php echo $rowww['price']; ?> /- RS</li>
																<li class="list-group-item">Quantity : <?php echo $row['quantity']; ?></li>
															</ul>
															<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php

									}
									?>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Order Delivery Location
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
										<div class="shipping-address-form">
											<?php

											$locationString = $row['address'];

											$coordinatesPart = explode("/place/", $locationString)[1];

											$coordinates = explode(",", $coordinatesPart);

											$latitude = trim($coordinates[0]);
											$longitude = trim($coordinates[1]);

											?>
											<div class="embed-responsive embed-responsive-21by9">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.993955071081!2d<?php echo $longitude; ?>!3d<?php echo $latitude; ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959b4a660019ee9%3A0x3d6254f36ed0e794!2sRK%20University%20Main%20Campus!5e0!3m2!1sen!2sin!4v1708536177452!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							$q_checkout_cancellation_time = "SELECT * FROM `cancelation_time`";
							$q_checkout_cancellation_time_result = mysqli_query($con, $q_checkout_cancellation_time);
							if (mysqli_num_rows($q_checkout_cancellation_time_result) == 1) {
								$roww = mysqli_fetch_assoc($q_checkout_cancellation_time_result);
							?>
								<div class="card single-accordion">
									<div class="card-header" id="headingThree">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #ff0000;">
												Warning
												</svg>
											</button>
										</h5>
									</div>
									<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
										<div class="card-body">
											<div class="card-details">
												<p style="color: #ff0000;">You can cancel Your order within`<b> <?php echo $roww['time']; ?> Minutes </b>` But the payment was <u> Not Refundable!</u></p>
											</div>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Billing Details</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Food Item </td>
									<td><?php echo $row['price']; ?> /- RS</td>
								</tr>
								<tr>
									<td>Delivery Charges </td>
									<td>50 /- RS</td>
								</tr>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Total Amount</td>
									<td>
										<?php
										$total_amount = ($row['price'] + 50);
										 echo $total_amount; 
										 ?>
								</td>
								</tr>
							</tbody>
						</table>
						<form class="m-3" action="" method="POST">
							<script
								src="assets/js/checkout.js"
								data-key="<?php echo $KEY_API_945549; ?>"
								data-amount="<?php echo intval($total_amount*10000);?>"
								data-currency="INR"
								data-order_id="order_CgmcjRh9ti2lP7"
								data-buttontext="Pay Now"
								data-name="Taste Eat"
								data-description="A online food ordering website."
								data-image="https://taste-eat.free.nf/assets/img/favicon2.png"
								data-prefill.name="<?php echo $row['user_name']; ?>"
								data-prefill.email="<?php echo $row['email']; ?>"
								data-theme.color="#f28123"
							></script>
							<script>
							</script>
							<input type="hidden" custom="Hidden Element" name="hidden"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>
<!-- end check out section -->

<?php include './include/footer.php' ?>

<!-- substr(md5(uniqid(mt_rand(), true)), 0, 40); -->