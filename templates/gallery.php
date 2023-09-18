<!DOCTYPE html>
<html lang="zxx">

<!-- Header -->
<?php include('header.php'); ?>
<!-- //Header -->

<body>
	<div class="main-top">
		<!-- Navbar -->
		<?php include('navbar.php'); ?>
		<!-- //Navbar -->
	</div>

	<!-- gallery -->
	<div class="gallery py-5">
		<div class="container-fluid py-5">
			<div class="row news-grids no-gutters text-center mt-lg-2 mt-md-5">
				<div class="col-md-3 gal-img my-md-4">
					<a href="#gal1"><img src="<?php echo STATIC_ASSETS;?>images/g1.jpg" alt="Gallery Image" class="img-fluid"></a>
				</div>
				<div class="col-md-6">
					<div class="row no-gutters">
						<div class="col-md-6 gal-img">
							<a href="#gal2"><img src="<?php echo STATIC_ASSETS;?>images/g2.jpg" alt="Gallery Image" class="img-fluid"></a>
						</div>
						<div class="col-md-6 gal-img">
							<a href="#gal3"><img src="<?php echo STATIC_ASSETS;?>images/g3.jpg" alt="Gallery Image" class="img-fluid"></a>
						</div>
						<div class="col-md-6 gal-img">
							<a href="#gal4"><img src="<?php echo STATIC_ASSETS;?>images/g4.jpg" alt="Gallery Image" class="img-fluid"></a>
						</div>
						<div class="col-md-6 gal-img">
							<a href="#gal5"><img src="<?php echo STATIC_ASSETS;?>images/g5.jpg" alt="Gallery Image" class="img-fluid"></a>
						</div>
					</div>
				</div>
				<div class="col-md-3 gal-img my-md-4">
					<a href="#gal6"><img src="<?php echo STATIC_ASSETS;?>images/g6.jpg" alt="Gallery Image" class="img-fluid"></a>
				</div>
			</div>
			<!-- gallery popups -->
			<!-- popup-->
			<div id="gal1" class="pop-overlay animate">
				<div class="popup">
					<img src="<?php echo STATIC_ASSETS;?>images/g11.jpg" alt="Popup Image" class="img-fluid" />
					<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
						dolor.</p>
					<a class="close" href="#gallery">&times;</a>
				</div>
			</div>
			<!-- //popup -->
			<!-- popup-->
			<div id="gal2" class="pop-overlay animate">
				<div class="popup">
					<img src="<?php echo STATIC_ASSETS;?>images/g2.jpg" alt="Popup Image" class="img-fluid" />
					<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
						dolor.</p>
					<a class="close" href="#gallery">&times;</a>
				</div>
			</div>
			<!-- //popup -->
			<!-- popup-->
			<div id="gal3" class="pop-overlay animate">
				<div class="popup">
					<img src="<?php echo STATIC_ASSETS;?>images/g3.jpg" alt="Popup Image" class="img-fluid" />
					<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
						dolor.</p>
					<a class="close" href="#gallery">&times;</a>
				</div>
			</div>
			<!-- //popup3 -->
			<!-- popup-->
			<div id="gal4" class="pop-overlay animate">
				<div class="popup">
					<img src="<?php echo STATIC_ASSETS;?>images/g4.jpg" alt="Popup Image" class="img-fluid" />
					<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
						dolor.</p>
					<a class="close" href="#gallery">&times;</a>
				</div>
			</div>
			<!-- //popup -->
			<!-- popup-->
			<div id="gal5" class="pop-overlay animate">
				<div class="popup">
					<img src="<?php echo STATIC_ASSETS;?>images/g5.jpg" alt="Popup Image" class="img-fluid" />
					<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
						dolor.</p>
					<a class="close" href="#gallery">&times;</a>
				</div>
			</div>
			<!-- //popup -->
			<!-- popup-->
			<div id="gal6" class="pop-overlay animate">
				<div class="popup">
					<img src="<?php echo STATIC_ASSETS;?>images/g66.jpg" alt="Popup Image" class="img-fluid" />
					<p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
						dolor.</p>
					<a class="close" href="#gallery">&times;</a>
				</div>
			</div>
			<!-- //popup -->
			<!-- //gallery popups -->
		</div>
	</div>
	<!-- //gallery -->

	<!-- copyright bottom -->
	<?php include('footer.php'); ?>
	<!-- //copyright bottom -->

</body>

</html>