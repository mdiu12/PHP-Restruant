	<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$footer_about                = $row['footer_about'];
		$footer_copyright            = $row['footer_copyright'];
		$contact_address             = $row['contact_address'];
		$contact_email               = $row['contact_email'];
		$contact_phone               = $row['contact_phone'];
		$contact_fax                 = $row['contact_fax'];
		$total_recent_news_footer    = $row['total_recent_news_footer'];
		$total_popular_news_footer   = $row['total_popular_news_footer'];
		$total_recent_news_sidebar   = $row['total_recent_news_sidebar'];
		$total_popular_news_sidebar  = $row['total_popular_news_sidebar'];
	}
	?>

	<!-- Reservation Start -->
	<div class="reservation-v1">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<div class="left">
						<p>Our foods are delicious. Do not forget to make a reservation.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="right">
						<?php

						?>
						<a href="#">Make A Reservation</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Reservation End -->

	<!-- Footer Main Start -->
		<section class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3 col-lg-3 footer-col">
						<h3><?php echo lang('ABOUT_US'); ?></h3>
						<p>
							<?php echo nl2br($footer_about); ?>							
						</p>
					</div>
					<div class="col-sm-6 col-md-3 col-lg-3 footer-col">
						<h3><?php echo lang('RECENT_NEWS'); ?></h3>
						<div class="row">
							<div class="col-md-12">
								<ul>
									<?php
									$i=0;
									$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
									$statement->execute();
									$result = $statement->fetchAll();
									foreach ($result as $row) {
										$i++;
										if($i>$total_recent_news_footer) {break;}
										?>
										<li><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo $row['news_title']; ?></a></li>
										<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3 col-lg-3 footer-col">
						<h3><?php echo lang('POPULAR_NEWS'); ?></h3>
						<div class="row">
							<div class="col-md-12">
								<ul>
									<?php
									$i=0;
									$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY total_view DESC");
									$statement->execute();
									$result = $statement->fetchAll();
									foreach ($result as $row) {
										$i++;
										if($i>$total_recent_news_footer) {break;}
										?>
										<li><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo $row['news_title']; ?></a></li>
										<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3 col-lg-3 footer-col">
						<h3><?php echo lang('CONTACT_US'); ?></h3>

						<?php if($contact_address!=''): ?>
						<div class="contact-item">
							<div class="icon"><i class="fa fa-map-marker"></i></div>
							<div class="text"><?php echo nl2br($contact_address); ?></div>
						</div>
						<?php endif; ?>

						<?php if($contact_phone!=''): ?>
						<div class="contact-item">
							<div class="icon"><i class="fa fa-phone"></i></div>
							<div class="text"><?php echo $contact_phone; ?></div>
						</div>
						<?php endif; ?>
						
						<?php if($contact_fax!=''): ?>
						<div class="contact-item">
							<div class="icon"><i class="fa fa-fax"></i></div>
							<div class="text"><?php echo $contact_fax; ?></div>
						</div>
						<?php endif; ?>

						<?php if($contact_email!=''): ?>
						<div class="contact-item">
							<div class="icon"><i class="fa fa-envelope-o"></i></div>
							<div class="text"><?php echo $contact_email; ?></div>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</section>
		<!-- Footer Main End -->

		
		<!-- Footer Bottom Start -->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-6 copyright">
						<?php echo $footer_copyright; ?>
					</div>
					<div class="col-md-6 footer-menu">
						<ul>
							<?php
							// Showing the menu dynamically from the database
							$statement = $pdo->prepare("SELECT * FROM tbl_menu_footer ORDER BY menu_order ASC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
							foreach ($result as $row) 
							{
								echo '<li>';								
								if($row['menu_type']=='Category')
								{
									echo '
									<a href="'.BASE_URL.URL_CATEGORY.$row['category_or_page_slug'].'">
											'.$row['menu_name'].'
									</a>
									';
								}
								if($row['menu_type']=='Page')
								{
									echo '
									<a href="'.BASE_URL.URL_PAGE.$row['category_or_page_slug'].'">
											'.$row['menu_name'].'
									</a>
									';
								}
								if($row['menu_type']=='Other')
								{
									echo '<a href="'.$row['menu_url'].'">';
									echo '
											'.$row['menu_name'].'
										';
									echo '</a>';
								}
								echo '</li>';
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Bottom End -->



		<a href="#" class="scrollup">
			<i class="fa fa-angle-up"></i>
		</a>

	</div>

	
	<!-- Scripts -->
	<script src="<?php echo BASE_URL; ?>js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/jquery.slicknav.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/hoverIntent.js"></script>
	<script src="<?php echo BASE_URL; ?>js/superfish.js"></script>
	<script src="<?php echo BASE_URL; ?>js/owl.carousel.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/owl.animate.js"></script>
	<script src="<?php echo BASE_URL; ?>js/jquery.bxslider.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/jquery.mixitup.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/jquery.magnific-popup.min.js"></script>	
	<script src="<?php echo BASE_URL; ?>js/waypoints.min.js"></script> 
	<script src="<?php echo BASE_URL; ?>js/jquery.counterup.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/modernizr.min.js"></script>
	<script src="<?php echo BASE_URL; ?>js/custom.js"></script>
	
</body>
</html>