<?php require_once('header.php'); ?>

<?php
$q = $pdo->prepare("
			SELECT * 
			FROM tbl_settings 
			WHERE id=1
			ORDER BY id ASC
		");
$q->execute();
$res = $q->fetchAll();
foreach ($res as $row) {
	$home_status_service = $row['home_status_service'];
	$home_title_about = $row['home_title_about'];
	$home_subtitle_about = $row['home_subtitle_about'];
	$home_text_about = $row['home_text_about'];
	$home_photo_about = $row['home_photo_about'];
	$home_status_about = $row['home_status_about'];
	$home_title_menu = $row['home_title_menu'];
	$home_subtitle_menu = $row['home_subtitle_menu'];
	$home_status_menu = $row['home_status_menu'];
	$home_status_testimonial = $row['home_status_testimonial'];
	$home_title_chef = $row['home_title_chef'];
	$home_subtitle_chef = $row['home_subtitle_chef'];
	$home_status_chef = $row['home_status_chef'];
}
?>
			
<!-- Slider Start -->
<section class="main-slider">
	<div class="slide-carousel owl-item">
		<?php
		$statement = $pdo->prepare("SELECT * FROM tbl_slider WHERE status=? ORDER BY slide_order ASC");
		$statement->execute(['Active']);
		$result = $statement->fetchAll();							
		foreach ($result as $row) {
			?>
			<div class="item" style="background-image:url(<?php echo BASE_URL; ?>uploads/<?php echo $row['photo']; ?>);">
				<div class="overlay"></div>
				<div class="text">
					<div class="this-item">
						<h2><?php echo $row['heading']; ?></h2>
					</div>
					<div class="this-item">
						<h3><?php echo $row['content']; ?></h3>
					</div>
					<div class="this-item">
						<p><a href="<?php echo $row['button_url']; ?>"><?php echo $row['button_text']; ?></a></p>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>
<!-- Slider End -->


<?php if($home_status_service == 1): ?>
<div class="featured-box">
	<div class="container">
		<div class="row">
			<?php
			$statement = $pdo->prepare("SELECT * FROM tbl_service WHERE show_on_home=? ORDER BY service_order ASC");
			$statement->execute(['Yes']);
			$result = $statement->fetchAll();
			foreach ($result as $row) {
				?>
				<div class="col-md-4 featured-box-single-item">
					<div class="icon">
						<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>">
					</div>
					<div class="text">
						<h2><?php echo $row['name']; ?></h2>
						<p><?php echo $row['description']; ?></p>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<?php endif; ?>



<?php if($home_status_about == 1): ?>
<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-7">
				<div class="item">
					
					<?php if($home_title_about!=''): ?>
					<h2><?php echo $home_title_about; ?></h2>
					<?php endif; ?>

					<?php if($home_subtitle_about!=''): ?>
					<h3><?php echo $home_subtitle_about; ?></h3>
					<?php endif; ?>

					<?php if($home_text_about!=''): ?>
					<p>
						<?php echo $home_text_about; ?>
					</p>
					<?php endif; ?>

				</div>
			</div>
			<div class="col-sm-6 col-md-5">
				<div class="item">
					<img src="<?php echo BASE_URL; ?>uploads/<?php echo $home_photo_about; ?>" alt="About Photo">
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>



<?php if($home_status_menu == 1): ?>
<section class="menu-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				
				<?php if($home_title_menu!=''): ?>
				<h2><?php echo $home_title_menu; ?></h2>
				<?php endif; ?>

				<?php if($home_subtitle_menu!=''): ?>
				<h3><?php echo $home_subtitle_menu; ?></h3>
				<?php endif; ?>
				
				<ul class="nav nav-tabs col-md-12">
				<?php
				$i=0;
				$statement = $pdo->prepare("SELECT * FROM tbl_category_food_menu ORDER BY category_order ASC");
				$statement->execute();
				$result = $statement->fetchAll();
				foreach ($result as $row) {
					$i++;
					?>
					<li class="<?php if($i==1){echo 'active';} ?>"><a href="#tab<?php echo $i; ?>" data-toggle="tab" aria-expanded="<?php if($i==1){echo 'true';}else{echo 'false';} ?>"><?php echo $row['category_name']; ?></a></li>
					<?php
				}
				?>
				</ul>				

				<div class="tab-content col-md-12">
					<?php
					$i=0;
					$q = $pdo->prepare("SELECT * FROM tbl_category_food_menu ORDER BY category_order ASC");
					$q->execute();
					$result = $q->fetchAll();
					foreach ($result as $row) {
						$i++;
						?><div class="tab-pane fade <?php if($i==1){echo 'active in';} ?>" id="tab<?php echo $i; ?>"><div class="item"><?php
						
						$r = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE category_id=? ORDER BY food_menu_order ASC");
						$r->execute([$row['category_id']]);
						$result1 = $r->fetchAll();
						foreach ($result1 as $row1) {
							?>
							<div class="inner">
								<div class="photo">
									<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row1['food_menu_photo']; ?>" alt="<?php echo $row1['food_menu_name']; ?>">
								</div>
								<div class="desc">
									<h3><?php echo $row1['food_menu_name']; ?></h3>
									<h4><?php echo nl2br($row1['food_menu_description']); ?></h4>
								</div>
								<div class="price">
									<?php echo $row1['food_menu_price']; ?>
								</div>
							</div>
							<?php
						}
						?></div></div><?php
					}
					?>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if($home_status_testimonial == 1): ?>
<section class="testimonial-v1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Testimonial Carousel Start -->
				<div class="testimonial-carousel">
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_testimonial ORDER BY testimonial_order ASC");
					$statement->execute();
					$result = $statement->fetchAll();							
					foreach ($result as $row) {
						?>
						<div class="item">
							<div class="testimonial-wrapper">								
								<div class="content">
									<div class="comment">
										<p>
											<?php echo nl2br($row['comment']); ?>
										</p>
										<div class="icon"></div>
									</div>
									<div class="author">
										<div class="photo">
											<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>">
										</div>
										<div class="text">
											<h3><?php echo $row['name']; ?></h3>
											<h4>
												<?php echo $row['designation']; ?>
												<?php if($row['company']!=''): ?>
												<span>(<?php echo $row['company']; ?>)</span>
												<?php endif; ?>
											</h4>
										</div>
									</div>										
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<!-- Testimonial Carousel End -->
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if($home_status_chef == 1): ?>
<section class="chef">
	<div class="container">
		<div class="row">
			<div class="heading">
				<?php if($home_title_chef!=''): ?>
				<h2><?php echo $home_title_chef; ?></h2>
				<?php endif; ?>

				<?php if($home_subtitle_chef!=''): ?>
				<h3><?php echo $home_subtitle_chef; ?></h3>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<!-- Chefs Container Start -->
				<div class="chef-inner">

					<?php
					$statement = $pdo->prepare("SELECT 
												
												t1.id,
												t1.name,
												t1.slug,
												t1.designation_id,
												t1.photo,
												t1.chef_order,
												t1.facebook,
												t1.twitter,
												t1.linkedin,
												t1.youtube,
												t1.google_plus,
												t1.instagram,
												t1.flickr,

												t2.designation_id,
												t2.designation_name

					                           FROM tbl_chef t1
					                           JOIN tbl_designation t2
					                           ON t1.designation_id = t2.designation_id
					                           WHERE t1.status = ?
					                           ORDER BY t1.chef_order ASC
					                           ");
					$statement->execute(['Active']);
					$result = $statement->fetchAll();							
					foreach ($result as $row) {
						?>
						<div class="col-sm-6 col-md-3 item">
							<div class="inner">
								<div class="thumb">
									<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>">
									<div class="overlay"></div>
									<div class="social-icons">
										<ul>
											<?php if($row['facebook']!=''): ?>
											<li><a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<?php endif; ?>

										<?php if($row['twitter']!=''): ?>
											<li><a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<?php endif; ?>

										<?php if($row['linkedin']!=''): ?>
											<li><a href="<?php echo $row['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										<?php endif; ?>

										<?php if($row['youtube']!=''): ?>
											<li><a href="<?php echo $row['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
										<?php endif; ?>

										<?php if($row['google_plus']!=''): ?>
											<li><a href="<?php echo $row['google_plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<?php endif; ?>

										<?php if($row['instagram']!=''): ?>
											<li><a href="<?php echo $row['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
										<?php endif; ?>

										<?php if($row['flickr']!=''): ?>
											<li><a href="<?php echo $row['flickr']; ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
										<?php endif; ?>
										</ul>
									</div>
								</div>
								<div class="text">
									<h3><a href="<?php echo BASE_URL.URL_CHEF.$row['slug']; ?>"><?php echo $row['name']; ?></a></h3>
									<h4><?php echo $row['designation_name']; ?></h4>
									<p class="button">
										<a href="<?php echo BASE_URL.URL_CHEF.$row['slug']; ?>"><?php echo lang('READ_MORE'); ?></a>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					
				</div>
				<!-- Chefs Container End -->

			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php require_once('footer.php'); ?>