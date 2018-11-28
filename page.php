<?php
require_once('header.php');

// Preventing the direct access of this page.
if(!isset($_REQUEST['slug']))
{
	header('location: index.php');
	exit;
}
else
{
	// Check the page slug is valid or not.
	$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=? AND status=?");
	$statement->execute(array($_REQUEST['slug'],'Active'));
	$total = $statement->rowCount();
	if( $total == 0 )
	{
		header('location: index.php');
		exit;
	}
}

// Getting the detailed data of a page from page slug
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=?");
$statement->execute(array($_REQUEST['slug']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) 
{
	$page_name    = $row['page_name'];
	$page_slug    = $row['page_slug'];
	$page_content = $row['page_content'];
	$page_layout  = $row['page_layout'];
	$banner       = $row['banner'];
	$status       = $row['status'];
}

// If a page is not active, redirect the user while direct URL press
if($status == 'Inactive')
{
	header('location: index.php');
	exit;
}
?>
				
<!-- Banner Start -->
<section class="main-slider">
	<div class="slide-single slide-single-page" style="background-image: url(<?php echo BASE_URL; ?>uploads/<?php echo $banner; ?>)">
		<div class="overlay"></div>
		<div class="text text-page">
			<div class="this-item">
				<h2><?php echo $page_name; ?></h2>
			</div>
		</div>			
	</div>
</section>
<!-- Banner End -->


<?php if($page_layout == 'Full Width Page Layout'): ?>
<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="item">
					<?php echo $page_content; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if($page_layout == 'About Us Page Layout'): ?>

<div class="featured-box">
	<div class="container">
		<div class="row">
			<?php
			$statement = $pdo->prepare("SELECT * FROM tbl_service ORDER BY service_order ASC");
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
	$home_title_about = $row['home_title_about'];
	$home_subtitle_about = $row['home_subtitle_about'];
	$home_text_about = $row['home_text_about'];
	$home_photo_about = $row['home_photo_about'];
}
?>
<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
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
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="item">
					<img src="<?php echo BASE_URL; ?>uploads/<?php echo $home_photo_about; ?>" alt="About Photo">
				</div>
			</div>
		</div>
	</div>
</section>

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



<?php if($page_layout == 'Service Page Layout'): ?>

<div class="featured-box" style="background: #fff;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<?php
			$statement = $pdo->prepare("SELECT * FROM tbl_service ORDER BY service_order ASC");
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


<?php if($page_layout == 'Menu Style 1 Page Layout'): ?>
<section class="menu-v1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
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



<?php if($page_layout == 'Menu Style 2 Page Layout'): ?>
<section class="menu-v2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs col-md-12">
				<?php
				$i=0;
				$q = $pdo->prepare("SELECT * 
									FROM tbl_category_food_menu 
									ORDER BY category_order ASC");
				$q->execute();
				$res = $q->fetchAll();
				foreach ($res as $row) {
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
					$res = $q->fetchAll();
					foreach ($res as $row) {
						$i++;
						?><div class="tab-pane fade <?php if($i==1){echo 'active in';} ?>" id="tab<?php echo $i; ?>"><div class="item"><?php
						
						$r = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE category_id=? ORDER BY food_menu_order ASC");
						$r->execute([$row['category_id']]);
						$res1 = $r->fetchAll();
						foreach ($res1 as $row1) {
							?>
							<div class="col-md-3 col-sm-6">
								<div class="inner">
									<div class="photo">
										<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row1['food_menu_photo']; ?>" alt="<?php echo $row1['food_menu_name']; ?>">
									</div>
									<div class="desc">
										<h3><?php echo $row1['food_menu_name']; ?></h3>
										<h4><?php echo nl2br($row1['food_menu_description']); ?></h4>
										<div class="price">
											<?php echo $row1['food_menu_price']; ?>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?></div></div><?php
					}
					?>
				</div>				
				
			</div>
		</div>
	</div>
</section>
<?php endif; ?>




<?php if($page_layout == 'Menu Style 3 Page Layout'): ?>
<section class="menu-v3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="menu-grid">
					<?php
					$i=0;
					$q = $pdo->prepare("SELECT * FROM tbl_category_food_menu ORDER BY category_order ASC");
					$q->execute();
					$res = $q->fetchAll();
					foreach ($res as $row) {
						$i++;
						?><h2><?php echo $row['category_name']; ?></h2><div class="menu-grid-item"><div class="item"><?php
						
						$r = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE category_id=? ORDER BY food_menu_order ASC");
						$r->execute([$row['category_id']]);
						$res1 = $r->fetchAll();
						foreach ($res1 as $row1) {
							?>
							<div class="col-md-3 col-sm-6">
								<div class="inner">
									<div class="photo">
										<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row1['food_menu_photo']; ?>" alt="<?php echo $row1['food_menu_name']; ?>">
									</div>
									<div class="desc">
										<h3><?php echo $row1['food_menu_name']; ?></h3>
										<h4><?php echo nl2br($row1['food_menu_description']); ?></h4>
										<div class="price">
											<?php echo $row1['food_menu_price']; ?>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?></div></div><?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if($page_layout == 'Menu Style 4 Page Layout'): ?>
<section class="menu-v4">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="menu-grid">
					<?php
					$i=0;
					$q = $pdo->prepare("SELECT * FROM tbl_category_food_menu ORDER BY category_order ASC");
					$q->execute();
					$result = $q->fetchAll();
					foreach ($result as $row) {
						$i++;
						?><h2><?php echo $row['category_name']; ?></h2><div class="menu-grid-item"><div class="item"><?php
						
						$r = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE category_id=? ORDER BY food_menu_order ASC");
						$r->execute([$row['category_id']]);
						$result1 = $r->fetchAll();
						foreach ($result1 as $row1) {
							?>
							<div class="col-md-3 col-sm-6 inner">
								<div class="photo">
									<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row1['food_menu_photo']; ?>" alt="<?php echo $row1['food_menu_name']; ?>">
								</div>
								<div class="desc">
									<h3><?php echo $row1['food_menu_name']; ?></h3>
									<h4><?php echo nl2br($row1['food_menu_description']); ?></h4>
									<div class="price">
										<?php echo $row1['food_menu_price']; ?>
									</div>
								</div>
							</div>
							<?php
						}
						?></div></div><?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if($page_layout == 'Photo Gallery Page Layout'): ?>
<section class="gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="gallery-grid">
					<div class="gallery-grid-item">
						<div class="item">

							<?php
							$q = $pdo->prepare("
										SELECT * 
										FROM tbl_photo
										ORDER BY photo_id DESC
									");
							$q->execute();
							$res = $q->fetchAll();
							foreach ($res as $row) {
								?>
								<div class="col-md-4 col-sm-6 gallery-i">
									<div class="inner">
										<div class="photo" style="background-image:url(<?php echo BASE_URL ?>uploads/<?php echo $row['photo_name']; ?>);">
										</div>
										<div class="desc">
											<h4>
												<a class="gallery-photo" href="<?php echo BASE_URL ?>uploads/<?php echo $row['photo_name']; ?>" alt="menu-item" title="<?php echo $row['photo_caption']; ?>"><i class="fa fa-search-plus"></i></a>
											</h4>
										</div>				
									</div>					
								</div>
								<?php
							}
							?>
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>



<?php if($page_layout == 'Chef Page Layout'): ?>
<section class="chef">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- Teacher Container Start -->
				<div class="chef-inner">
					
					<?php
					$q = $pdo->prepare("
								SELECT * 
								FROM tbl_chef t1
								JOIN tbl_designation t2
								ON t1.designation_id = t2.designation_id
								ORDER BY t1.chef_order ASC
							");
					$q->execute();
					$res = $q->fetchAll();
					foreach ($res as $row) {
						?>
						<div class="col-sm-6 col-md-3 item">
							<div class="inner">
								<div class="thumb">
									<img src="<?php echo BASE_URL; ?>uploads/<?php echo $row['photo']; ?>" alt="">
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
				<!-- Teacher Container End -->

			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if($page_layout == 'News Page Layout'): ?>
<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-9">				
				<!-- Blog Classic Start -->
				<div class="blog-grid">
					<div class="row">
						<div class="col-md-12">


							<?php
							$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
							$statement->execute();
							$total = $statement->rowCount();
							?>

							<?php if(!$total): ?>
							<p style="color:red;">Sorry! No News is found.</p>
							<?php else: ?>

							<?php
							/* ===================== Pagination Code Starts ================== */
							$adjacents = 10;	
							
							$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
							$statement->execute();
							$total_pages = $statement->rowCount();
							
							$targetpage = $_SERVER['PHP_SELF'];
							$limit = 5;                                 
							$page = @$_GET['page'];
							if($page) 
								$start = ($page - 1) * $limit;          
							else
								$start = 0;	
							

							$statement = $pdo->prepare("SELECT
													   t1.news_title,
							                           t1.news_slug,
							                           t1.news_content,
							                           t1.news_short_content,
							                           t1.news_date,
							                           t1.photo,
							                           t1.category_id,

							                           t2.category_id,
							                           t2.category_name,
							                           t2.category_slug
							                           FROM tbl_news t1
							                           JOIN tbl_category t2
							                           ON t1.category_id = t2.category_id 		                           
							                           ORDER BY t1.news_id 
							                           LIMIT $start, $limit");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							
							
							$s1 = $_REQUEST['slug'];
									
							if ($page == 0) $page = 1;                  
							$prev = $page - 1;                          
							$next = $page + 1;                          
							$lastpage = ceil($total_pages/$limit);      
							$lpm1 = $lastpage - 1;   
							$pagination = "";
							if($lastpage > 1)
							{   
								$pagination .= "<div class=\"pagination\">";
								if ($page > 1) 
									$pagination.= "<a href=\"$targetpage?slug=$s1&page=$prev\">&#171; previous</a>";
								else
									$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
								if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
								{   
									for ($counter = 1; $counter <= $lastpage; $counter++)
									{
										if ($counter == $page)
											$pagination.= "<span class=\"current\">$counter</span>";
										else
											$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
									}
								}
								elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
								{
									if($page < 1 + ($adjacents * 2))        
									{
										for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
										{
											if ($counter == $page)
												$pagination.= "<span class=\"current\">$counter</span>";
											else
												$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
										}
										$pagination.= "...";
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lpm1\">$lpm1</a>";
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lastpage\">$lastpage</a>";       
									}
									elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
									{
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=1\">1</a>";
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=2\">2</a>";
										$pagination.= "...";
										for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
										{
											if ($counter == $page)
												$pagination.= "<span class=\"current\">$counter</span>";
											else
												$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
										}
										$pagination.= "...";
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lpm1\">$lpm1</a>";
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lastpage\">$lastpage</a>";       
									}
									else
									{
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=1\">1</a>";
										$pagination.= "<a href=\"$targetpage?slug=$s1&page=2\">2</a>";
										$pagination.= "...";
										for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
										{
											if ($counter == $page)
												$pagination.= "<span class=\"current\">$counter</span>";
											else
												$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
										}
									}
								}
								if ($page < $counter - 1) 
									$pagination.= "<a href=\"$targetpage?slug=$s1&page=$next\">next &#187;</a>";
								else
									$pagination.= "<span class=\"disabled\">next &#187;</span>";
								$pagination.= "</div>\n";       
							}
							/* ===================== Pagination Code Ends ================== */
							?>
							
							<?php
							foreach ($result as $row) {
								?>
								<div class="post-item">
									<div class="row">

										<?php if($row['photo']!=''): ?>
										<div class="col-md-4">
											<div class="image-holder">
												<img class="img-responsive" src="<?php echo BASE_URL; ?>uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['news_title']; ?>">
											</div>
										</div>
										<?php endif; ?>

										<div class="<?php if($row['photo']!='') {echo 'col-md-8';} else {echo 'col-md-12';} ?>">
											<div class="text">
												<h3><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo $row['news_title']; ?></a></h3>
												<ul class="status">
													<li><i class="fa fa-tag"></i><?php echo lang('CATEGORY'); ?>: <a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></li>
													<li><i class="fa fa-calendar"></i><?php echo lang('DATE'); ?>: <?php echo $row['news_date']; ?></a></li>
												</ul>
												<p>
													<?php echo nl2br($row['news_short_content']); ?>
												</p>
												<p class="button">
													<a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo lang('READ_MORE'); ?></a>
												</p>
											</div>
										</div>
									</div>										
									
								</div>
								<?php
							}
							?>
							<?php endif; ?>
						</div>

						<div class="col-md-12">
							<?php if($total): ?>
							<?php echo $pagination; ?>
							<?php endif; ?>
						</div>

					</div>
				</div>
				<!-- Blog Classic End -->
			</div>
			<div class="col-md-3">
				<?php require_once('sidebar.php'); ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if($page_layout == 'FAQ Page Layout'): ?>
<section class="faq">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
				$i=0;
				$j=0;
				$statement = $pdo->prepare("SELECT * FROM tbl_faq_category ORDER BY faq_category_id ASC");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
				foreach ($result as $row) {
					$i++;
					?>
					<h1><?php echo $row['faq_category_name']; ?></h1>
					<div class="panel-group" id="accordion<?php echo $i; ?>" role="tablist" aria-multiselectable="true">
						<?php
						$statement1 = $pdo->prepare("SELECT * FROM tbl_faq WHERE faq_category_id=?");
						$statement1->execute(array($row['faq_category_id']));
						$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result1 as $row1) {
							$j++;
							?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading1">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?php echo $i; ?>" href="#collapse<?php echo $j; ?>" aria-expanded="false" aria-controls="collapse<?php echo $j; ?>">
											<?php echo $row1['faq_title']; ?>
										</a>
									</h4>
									
								</div>
								<div id="collapse<?php echo $j; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
									<div class="panel-body">
										<?php echo $row1['faq_content']; ?>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<?php
				}
				?>				
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if($page_layout == 'Contact Us Page Layout'): ?>
<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_address = $row['contact_address'];
		$contact_email = $row['contact_email'];
		$contact_phone = $row['contact_phone'];
		$contact_map_iframe = $row['contact_map_iframe'];
	}
?>
<?php
// After form submit checking everything for email sending
if(isset($_POST['form_contact']))
{
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_form_email = $row['contact_form_email'];
		$contact_form_email_subject = $row['contact_form_email_subject'];
		$contact_form_email_thank_you_message = $row['contact_form_email_thank_you_message'];
	}

    $valid = 1;

    if(empty($_POST['visitor_name']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your name.\n';
    }

    if(empty($_POST['visitor_phone']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your phone number.\n';
    }


    if(empty($_POST['visitor_email']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your email address.\n';
    }
    else
    {
    	// Email validation check
        if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL))
        {
            $valid = 0;
            $error_message1 .= 'Please enter a valid email address.\n';
        }
    }

    if(empty($_POST['visitor_comment']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your comment.\n';
    }

    if($valid == 1)
    {
		
		$visitor_name = strip_tags($_POST['visitor_name']);
		$visitor_email = strip_tags($_POST['visitor_email']);
		$visitor_phone = strip_tags($_POST['visitor_phone']);
		$visitor_comment = strip_tags($_POST['visitor_comment']);

        // sending email
        $to_admin = $contact_form_email;
        $subject = $contact_form_email_subject;
		$message = '
<html><body>
<table>
<tr>
<td>Name</td>
<td>'.$visitor_name.'</td>
</tr>
<tr>
<td>Email</td>
<td>'.$visitor_email.'</td>
</tr>
<tr>
<td>Phone</td>
<td>'.$visitor_phone.'</td>
</tr>
<tr>
<td>Comment</td>
<td>'.nl2br($visitor_comment).'</td>
</tr>
</table>
</body></html>
';
		$headers = 'From: ' . $visitor_email . "\r\n" .
				   'Reply-To: ' . $visitor_email . "\r\n" .
				   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
				   "MIME-Version: 1.0\r\n" . 
				   "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// Sending email to admin				   
        mail($to_admin, $subject, $message, $headers); 
		
        $success_message1 = $contact_form_email_thank_you_message;

    }
}
?>
				
				<?php
				if($error_message1 != '') {
					echo "<script>alert('".$error_message1."')</script>";
				}
				if($success_message1 != '') {
					echo "<script>alert('".$success_message1."')</script>";
				}
				?>
<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div id="message-contact"></div>
				<form action="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" class="form-horizontal cform-1" method="post">
					
					<?php $csrf->echoInputField(); ?>

					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="<?php echo lang('NAME'); ?>" name="visitor_name">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" placeholder="<?php echo lang('EMAIL_ADDRESS'); ?>" name="visitor_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="<?php echo lang('PHONE'); ?>"  name="visitor_phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea name="visitor_comment" class="form-control" cols="30" rows="10" placeholder="<?php echo lang('MESSAGE'); ?>"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
	                    <div class="col-sm-12">
	                        <input type="submit" value="<?php echo lang('SEND_MESSAGE'); ?>" class="btn btn-success" name="form_contact">
	                    </div>
	                </div>
				</form>
			</div>
			<div class="col-md-4">

				<?php if($contact_address!=''): ?>
				<div class="item">
					<div class="icon">
						<i class="fa fa-map"></i>
					</div>
					<div class="text">
						<h3 class="white"><?php echo lang('ADDRESS'); ?></h3>
						<p>
							<?php echo nl2br($contact_address); ?>
						</p>
					</div>
				</div>
				<?php endif; ?>

				<?php if($contact_phone!=''): ?>
				<div class="item">
					<div class="icon">
						<i class="fa fa-phone"></i>
					</div>
					<div class="text">
						<h3 class="white"><?php echo lang('PHONE'); ?></h3>
						<p>
							<?php echo $contact_phone; ?>
						</p>
					</div>
				</div>
				<?php endif; ?>

				<?php if($contact_email!=''): ?>
				<div class="item">
					<div class="icon">
						<i class="fa fa-envelope"></i>
					</div>
					<div class="text">
						<h3 class="white"><?php echo lang('EMAIL'); ?></h3>
						<p>
							<?php echo $contact_email; ?>
						</p>
					</div>
				</div>
				<?php endif; ?>

			</div>
			
		</div>

		
		<div class="gap-small"></div>
		<div class="gap-small"></div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="heading-normal">
					<h2><?php echo lang('FIND_US_ON_MAP'); ?></h2>
				</div>
				<div class="google-map">
					<?php echo $contact_map_iframe; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if($page_layout == 'Reserve Table Page Layout'): ?>
<?php
// After form submit checking everything for email sending
if(isset($_POST['form_reservation']))
{
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$reservation_form_email = $row['reservation_form_email'];
		$reservation_form_email_subject = $row['reservation_form_email_subject'];
		$reservation_form_email_thank_you_message = $row['reservation_form_email_thank_you_message'];
	}

    $valid = 1;

    if(empty($_POST['visitor_first_name']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your first name.\n';
    }

    if(empty($_POST['visitor_last_name']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your last name.\n';
    }

    if(empty($_POST['visitor_email']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your email address.\n';
    }
    else
    {
    	// Email validation check
        if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL))
        {
            $valid = 0;
            $error_message1 .= 'Please enter a valid email address.\n';
        }
    }

    if(empty($_POST['visitor_phone']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your phone number.\n';
    }

    if(empty($_POST['visitor_date']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter reservation date.\n';
    }

    if(empty($_POST['visitor_time']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter reservation time.\n';
    }

    if(empty($_POST['visitor_comment']))
    {
        $valid = 0;
        $error_message1 .= 'Please enter your comment.\n';
    }

    if($valid == 1)
    {
		
		$visitor_first_name = strip_tags($_POST['visitor_first_name']);
		$visitor_last_name = strip_tags($_POST['visitor_last_name']);
		$visitor_email = strip_tags($_POST['visitor_email']);
		$visitor_phone = strip_tags($_POST['visitor_phone']);
		$visitor_date = strip_tags($_POST['visitor_date']);
		$visitor_time = strip_tags($_POST['visitor_time']);
		$visitor_comment = strip_tags($_POST['visitor_comment']);

        // sending email
        $to_admin = $reservation_form_email;
        $subject = $reservation_form_email_subject;
		$message = '
<html><body>
<table>
<tr>
<td>First Name</td>
<td>'.$visitor_first_name.'</td>
</tr>
<tr>
<td>Last Name</td>
<td>'.$visitor_last_name.'</td>
</tr>
<tr>
<td>Email</td>
<td>'.$visitor_email.'</td>
</tr>
<tr>
<td>Phone</td>
<td>'.$visitor_phone.'</td>
</tr>
<tr>
<td>Date</td>
<td>'.$visitor_date.'</td>
</tr>
<tr>
<td>Time</td>
<td>'.$visitor_time.'</td>
</tr>
<tr>
<td>Comment</td>
<td>'.nl2br($visitor_comment).'</td>
</tr>
</table>
</body></html>
';
		$headers = 'From: ' . $visitor_email . "\r\n" .
				   'Reply-To: ' . $visitor_email . "\r\n" .
				   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
				   "MIME-Version: 1.0\r\n" . 
				   "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// Sending email to admin				   
        mail($to_admin, $subject, $message, $headers); 
		
        $success_message1 = $reservation_form_email_thank_you_message;

    }
}
?>
				
				<?php
				if($error_message1 != '') {
					echo "<script>alert('".$error_message1."')</script>";
				}
				if($success_message1 != '') {
					echo "<script>alert('".$success_message1."')</script>";
				}
				?>
<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $page_content; ?>
			</div>
		</div>
		<div class="row">			
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form action="" class="form-horizontal cform-1" method="post">
					<?php $csrf->echoInputField(); ?>
					<div class="col-sm-6">
						<div class="form-group pr_10 xs_pr_0">
	                        <input type="text" class="form-control" placeholder="<?php echo lang('FIRST_NAME'); ?>" name="visitor_first_name">
	                    </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
	                        <input type="text" class="form-control" placeholder="<?php echo lang('LAST_NAME'); ?>" name="visitor_last_name">
	                    </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group pr_10 xs_pr_0">
	                        <input type="email" class="form-control" placeholder="<?php echo lang('EMAIL_ADDRESS'); ?>" name="visitor_email">
	                    </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
	                        <input type="text" class="form-control" placeholder="<?php echo lang('PHONE'); ?>" name="visitor_phone">
	                    </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group pr_10 xs_pr_0">
	                        <input type="text" class="form-control datepicker" placeholder="<?php echo lang('DATE'); ?>" name="visitor_date">
	                    </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
	                        <input type="text" class="form-control" placeholder="<?php echo lang('TIME'); ?>" name="visitor_time">
	                    </div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
	                        <textarea class="form-control" cols="30" rows="10" placeholder="<?php echo lang('MESSAGE'); ?>" name="visitor_comment"></textarea>
	                    </div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
	                        <input type="submit" value="<?php echo lang('RESERVATION_BUTTON'); ?>" class="btn btn-success" name="form_reservation">
	                    </div>
					</div>
				</form>
			</div>
			<div class="col-md-2"></div>
			
		</div>

		
	</div>
</section>

<?php endif; ?>

<?php require_once('footer.php'); ?>