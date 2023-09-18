<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body>
	<div class="main-top">
		<!-- header -->
		<?php include('navbar.php'); ?>
		<!-- //header -->

		<!-- banner slider -->
		<div id="homepage-slider" class="st-slider">

			<div class="images">
				<div class="images-inner">
					<div class="image-slide">
						<div class="banner-w3ls-1">
							<div class="container">
								<div class="slider-text-w3ls">
									<h3 class="banner-wthree-text"><span class="fa fa-dot-circle-o"></span>Your Journey
										Starts Here</h3>
									<h3 class="banner-wthree-text banner-wthree-text-2"><span class="fa fa-dot-circle-o"></span>Explore and
										Travel</h3>
									<!-- <h3 class="banner-wthree-text banner-wthree-text-3"><span class="fa fa-dot-circle-o"></span>Your Best Trip</h3> -->
									<!-- search -->
									<div class="search-w3layouts text-right">
										<p class="text-wh">You know where you want to go.<br> Now find the best way to
											get there and enjoy it.</p>
										<form action="<?php echo WEB_URL . 'login'; ?>" method="post" class="search-bottom-wthree d-flex mt-3">

											<input class="search" type="search" placeholder="Login here!..." required="" readonly>
											<button class="btn" type="submit"><span class="fa fa-sign-in"></span></button>
										</form>
									</div>
									<!-- //search -->
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
		<!-- //banner slider -->
	</div>

	<!-- copyright bottom -->
	<?php include('footer.php'); ?>
	<!-- //copyright bottom -->
</body>

</html>