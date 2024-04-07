<?php include './include/header.php' ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Shop</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="product-filters">
					<ul>
						<li class="active" data-filter="*">All</li>
						<?php
						$q_category = "SELECT * FROM category";
						$q_category_r = mysqli_query($con, $q_category);
						if (mysqli_num_rows($q_category_r) > 0) {
							while ($row = mysqli_fetch_assoc($q_category_r)) {
						?>
								<li data-filter=".<?php echo $row['category']; ?>"><?php echo $row['category']; ?></li>
						<?php
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="row product-lists">
			<?php
			$q2 = "SELECT * FROM items";
			$qr2 = mysqli_query($con, $q2);
			if (mysqli_num_rows($qr2) > 0) {
				while ($roww = mysqli_fetch_assoc($qr2)) {

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

		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="pagination-wrap">
					<ul>
						<li><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a class="active" href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end products -->

<?php include './include/footer.php' ?>