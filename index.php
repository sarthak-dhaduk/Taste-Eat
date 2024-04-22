<?php include './include/header.php' ?>
<?php
if (!isset($_SESSION['u'])) {
    header("location:login.php");
    exit();
}

if (!isset($_SESSION['alert_shown'])) {
    ?>
    <div class="container mt-5">
        <h1>Welcome, <?php echo $_SESSION['u']; ?></h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toast = new bootstrap.Toast(document.getElementById('successToast'));
            toast.show();
        });
    </script>

    <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 p-3" id="successToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                You have successfully logged in!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <?php

    $_SESSION['alert_shown'] = true;
}
?>
<!-- hero area -->
<div class="hero-area hero-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 offset-lg-2 text-center">
				<div class="hero-text">
					<div class="hero-text-tablecell">
						<p class="subtitle">Fresh & Delight</p>
						<h1>Delicious Quick Snacks & Fast-Food</h1>
						<div class="hero-btns">
							<a href="shop.php" class="boxed-btn">Food Collection</a>
							<a href="contact.php" class="bordered-btn">Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end hero area -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="content">
						<h3>Free Shipping</h3>
						<p>When order over $75</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-phone-volume"></i>
					</div>
					<div class="content">
						<h3>24/7 Support</h3>
						<p>Get support all day</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-sync"></i>
					</div>
					<div class="content">
						<h3>Refund</h3>
						<p>Get refund within 3 days!</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Deliciously</span> Quick Choices</h3>
					<p>Experience the joy of instant gratification with our scrumptious fast-food menu. From classics to innovative delights, each item is a testament to swift and satisfying flavors. Order now!</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php
			$q_index_item = "SELECT * FROM `items` ORDER BY RAND() LIMIT 3;";
			$q_index_item_r = mysqli_query($con, $q_index_item);
			if (mysqli_num_rows($q_index_item_r) > 0) {
				while ($roww = mysqli_fetch_assoc($q_index_item_r)) {

			?>
					<div class="col-lg-4 col-md-6 text-center <?php echo $roww['category']; ?>">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.php?id=<?php echo $roww['item_id']; ?>"><img src="uploaded_image/<?php echo $roww['item_image']; ?>" alt="<?php echo $roww['item_name']; ?>"></a>
							</div>
							<h3><?php echo $roww['item_name']; ?></h3>
							<p class="product-price"><span>Per Item</span> <?php echo $roww['price']; ?>$ </p>
							<a href="single-product.php?id=<?php echo $roww['item_id']; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Buy</a>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>
<!-- end product section -->

<!-- cart banner section -->
<!-- <section class="cart-banner pt-100 pb-100">
	<div class="container">
		<div class="row clearfix">
			<div class="image-column col-lg-6">
				<div class="image">
					<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>10%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
					<img src="assets/img/a (2).jpg" alt="">
				</div>
			</div>
			<div class="content-column col-lg-6">
				<h3><span class="orange-text">Deal</span> of the month</h3>
				<h4>Fries, Pizza and coca-cola</h4>
				<div class="text">Indulge in the ultimate flavor trio with our Deal of the Month! Crispy, golden fries paired with a mouthwatering pizza and a refreshing Coca-Cola—this unbeatable combination is crafted for those who appreciate the perfect harmony of taste.</div>
				<div class="time-counter">
					<div class="time-countdown clearfix" data-countdown="2024/6/01">
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Days</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Hours</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Mins</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Secs</div>
						</div>
					</div>
				</div>
				<a href="cart.php" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Buy</a>
			</div>
		</div>
	</div>
</section> -->
<!-- end cart banner section -->

<!-- shop banner -->
<section class="shop-banner">
	<div class="container">
		<h3><?php $monthName = date('F');
			echo $monthName; ?> sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
		<div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
		<a href="shop.php" class="cart-btn btn-lg">Shop Now</a>
	</div>
</section>
<!-- end shop banner -->

<?php include './include/footer.php' ?>