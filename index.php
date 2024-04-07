<?php include './include/header.php' ?>

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
<section class="cart-banner pt-100 pb-100">
	<div class="container">
		<div class="row clearfix">
			<!--Image Column-->
			<div class="image-column col-lg-6">
				<div class="image">
					<!-- <div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>10%</strong> <br> off per kg
                                </span>
                            </div>
                        </div> -->
					<img src="assets/img/a (2).jpg" alt="">
				</div>
			</div>
			<!--Content Column-->
			<div class="content-column col-lg-6">
				<h3><span class="orange-text">Deal</span> of the month</h3>
				<h4>Fries, Pizza and coca-cola</h4>
				<div class="text">Indulge in the ultimate flavor trio with our Deal of the Month! Crispy, golden fries paired with a mouthwatering pizza and a refreshing Coca-Cola—this unbeatable combination is crafted for those who appreciate the perfect harmony of taste.</div>
				<!--Countdown Timer-->
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
</section>
<!-- end cart banner section -->

<!-- testimonail-section -->
<!-- <div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
<!-- end testimonail-section -->

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

<!-- advertisement section -->
<!-- <div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 1999</p>
						<h2>We are <span class="orange-text">Fruitkha</span></h2>
						<p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
						<a href="about.php" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
<!-- end advertisement section -->



<!-- latest news -->
<!-- <div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> News</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php"><div class="latest-news-bg news-bg-1"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">You will vainly look for fruit on it in autumn.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php"><div class="latest-news-bg news-bg-2"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">A man's worth has its season, like tomato.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-latest-news">
						<a href="single-news.php"><div class="latest-news-bg news-bg-3"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.php">Good thoughts bear good fresh juicy fruit.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="news.php" class="boxed-btn">More News</a>
				</div>
			</div>
		</div>
	</div> -->
<!-- end latest news -->

<!-- logo carousel -->
<!-- <div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
<!-- end logo carousel -->
<?php include './include/footer.php' ?>