<?php
ob_start();
session_start();
include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");
include("admin/languages/en.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Getting the basic data for the website from database
$q = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$q->execute();
$result = $q->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
	$logo = $row['logo'];
	$favicon = $row['favicon'];
	$contact_email = $row['contact_email'];
	$contact_phone = $row['contact_phone'];
	$color_primary = $row['color_primary'];
	$color_secondary = $row['color_secondary'];
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

	<!-- Meta Tags -->	
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>


	<!-- Showing the SEO related meta tags data -->
	<?php
	
	// Getting the current page URL
	$cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

	if($cur_page == 'news.php')
	{
		$q = $pdo->prepare("SELECT * FROM tbl_news WHERE news_slug=?");
		$q->execute(array($_REQUEST['slug']));
		$result = $q->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) 
		{
		    $og_photo = $row['photo'];
		    $og_title = $row['news_title'];
		    $og_slug = $row['news_slug'];
			$og_description = substr(strip_tags($row['news_content']),0,200).'...';
			echo '<meta name="description" content="'.$row['meta_description'].'">';
			echo '<meta name="keywords" content="'.$row['meta_keyword'].'">';
			echo '<title>'.$row['meta_title'].'</title>';
		}
	}

	if($cur_page == 'page.php')
	{
		$q = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=?");
		$q->execute(array($_REQUEST['slug']));
		$result = $q->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) 
		{
			echo '<meta name="description" content="'.$row['meta_description'].'">';
			echo '<meta name="keywords" content="'.$row['meta_keyword'].'">';
			echo '<title>'.$row['meta_title'].'</title>';
		}
	}

	if($cur_page == 'category.php')
	{
		$q = $pdo->prepare("SELECT * FROM tbl_category WHERE category_slug=?");
		$q->execute(array($_REQUEST['slug']));
		$result = $q->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row)
		{
			echo '<meta name="description" content="'.$row['meta_description'].'">';
			echo '<meta name="keywords" content="'.$row['meta_keyword'].'">';
			echo '<title>'.$row['meta_title'].'</title>';
		}
	}

	if($cur_page == 'index.php')
	{
		$q = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
		$q->execute();
		$result = $q->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) 
		{
			echo '<meta name="description" content="'.$row['meta_description_home'].'">';
			echo '<meta name="keywords" content="'.$row['meta_keyword_home'].'">';
			echo '<title>'.$row['meta_title_home'].'</title>';
		}
	}
	?>
	
	<!-- Favicon -->
	<link href="<?php echo BASE_URL; ?>uploads/<?php echo $favicon; ?>" rel="shortcut icon" type="image/png">
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/slicknav.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/superfish.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/animate.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/jquery.bxslider.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/hover.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/spacing.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/responsive.css">
	
	<?php if($cur_page == 'news.php'): ?>
		<meta property="og:title" content="<?php echo $og_title; ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo BASE_URL.URL_NEWS.$og_slug; ?>">
		<meta property="og:description" content="<?php echo $og_description; ?>">
		<meta property="og:image" content="<?php echo BASE_URL; ?>assets/uploads/<?php echo $og_photo; ?>">
	<?php endif; ?>


	<style>
		<?php 
		$color_primary = '#'.$color_primary;
		$color_secondary = '#'.$color_secondary;
		?>



		
		/* Primary Colors */
		.sf-menu > li > a,
		.menu-v1 .desc h3,
		.menu-v1 .nav-tabs > li > a,
		.chef .text h3 a:hover,
		.blog h3 a {
			color: <?php echo $color_primary; ?>!important;
		}
		.top-bar,
		.slide-carousel .overlay,
		.testimonial-v1 .overlay,
		.testimonial-v1 .owl-nav .owl-prev i:hover, 
		.testimonial-v1 .owl-nav .owl-next i:hover,
		.chef .item .social-icons ul li a:hover,
		.chef .text p.button a,
		.reservation-v1 .right a:hover,
		.footer-main,
		.chefs-detail .chefs-single .text,
		.chefs-detail .chefs-single .social ul li a:hover,
		.blog p.button a,
		div.pagination span.current,
		div.pagination a:hover, 
		div.pagination a:active,
		.contact .cform-1 .btn-success:hover,
		.contact .item {
			background: <?php echo $color_primary; ?>!important;
		}
		.menu-v1 .nav-tabs > li.active > a, 
		.menu-v1 .nav-tabs > li.active > a:focus, 
		.menu-v1 .nav-tabs > li.active > a:hover {
			border-bottom-color: <?php echo $color_primary; ?>!important;
		}
		.menu-v1 .nav-tabs > li > a:hover,
		.chefs-detail .chefs-single .social ul li a:hover,
		.blog p.button a,
		div.pagination span.current,
		div.pagination a:hover, 
		div.pagination a:active,
		.contact .cform-1 .btn-success:hover {
			border-color: <?php echo $color_primary; ?>!important;
		}
		



		/* Secondary Colors */
		.about h2,
		.menu-v1 h2,
		.menu-v1 .price,
		.chef .heading h2,
		.chef .text h3 a,
		.chefs-detail .chefs-single .social ul li a,
		.chefs-detail .chefs-detail-tab .content h1, 
		.chefs-detail .chefs-detail-tab .content h2, 
		.chefs-detail .chefs-detail-tab .content h3, 
		.chefs-detail .chefs-detail-tab .content h4, 
		.chefs-detail .chefs-detail-tab .content h5, 
		.chefs-detail .chefs-detail-tab .content h6,
		.blog .text ul.status li,
		.blog .text ul.status li a,
		.sidebar .widget h4,
		.sidebar .widget ul li a:hover,
		.blog h3,
		.faq h1,
		.menu-v3 h2,
		.menu-v4 h2,
		.contact h1,
		.contact h2,
		.contact h3,
		.contact h4,
		.contact h5,
		.contact h6 {
			color: <?php echo $color_secondary; ?>!important;
		}
	
		.top-bar .top-social ul li a:hover,
		.sf-menu li li,
		.sf-menu li:hover li a,
		.sf-menu > li:last-child a,
		.slide-carousel .item .text p a,
		.testimonial-v1 .owl-nav .owl-prev i, 
		.testimonial-v1 .owl-nav .owl-next i,
		.chef .item .social-icons ul li a,
		.chef .text p.button a:hover,
		.reservation-v1,
		.footer-main h3:after,
		.scrollup i,
		.blog p.button a:hover,
		div.pagination a,
		.sidebar .widget-search button,
		.faq .panel-group .panel-heading a.collapsed:after,
		.faq .panel-group .panel-heading a:after,
		.contact .cform-1 .btn-success {
			background: <?php echo $color_secondary; ?>!important;
		}

		.slide-carousel .item .text p a,
		.menu-v1 .photo,
		.menu-v1 .desc,
		.menu-v1 .price,
		.chefs-detail .chefs-single .social ul li a,
		.blog p.button a:hover,
		div.pagination a,
		.sidebar .widget-search input,
		.sidebar .widget-search button,
		.contact .cform-1 .btn-success {
			border-color: <?php echo $color_secondary; ?>!important;
		}

		.slide-carousel .item .text p a:hover {
			background-color: transparent!important;
		}
		.footer-bottom {
			background: #333333!important;
		}
		.chefs-detail .chefs-single .social ul li a:hover,
		.sf-menu li li:hover a,
		.sf-menu > li:last-child a {
			color: #fff!important;
		}

		.contact .text h3.white {
		    color: #fff!important;
		}

	</style>

	<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script>

</head>
<body>

<?php
// Getting Facebook comment code from the database
$statement = $pdo->prepare("SELECT * FROM tbl_comment WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) 
{
	echo $row['code_body'];
}
?>
	
	<div id="preloader">
		<div id="status"></div>
	</div>
	
	<div class="page-wrapper">


		<!-- Top Bar Start -->
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 top-contact">
						<div class="list">
							<i class="fa fa-envelope"></i> <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
						</div>
						<div class="list">
							<i class="fa fa-phone"></i> <?php echo $contact_phone; ?>
						</div>
					</div>
					<div class="col-md-6 top-social">
						<ul>
							<?php
							// Getting and showing all the social media icon URL from the database
							$q = $pdo->prepare("SELECT * FROM tbl_social");
							$q->execute();
							$result = $q->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) 
							{
								if($row['social_url']!='')
								{
									echo '<li><a href="'.$row['social_url'].'"><i class="'.$row['social_icon'].'"></i></a></li>';
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Top Bar End -->


		<!-- Header Start -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-3 logo">
						<img src="<?php echo BASE_URL; ?>uploads/<?php echo $logo; ?>" alt="main logo">
					</div>
					<div class="col-md-9 nav-wrapper">

						<!-- Nav Start -->
						<div class="nav">
							<ul class="sf-menu" id="menu">

								<?php
								// Showing the menu dynamically from the database
								$q = $pdo->prepare("SELECT * FROM tbl_menu_main ORDER BY menu_order ASC");
								$q->execute();
								$result = $q->fetchAll(PDO::FETCH_ASSOC);							
								foreach ($result as $row) 
								{
									echo '<li>';
									if($row['menu_parent']==0)
									{
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
									}

									$r = $pdo->prepare("SELECT * FROM tbl_menu_main WHERE menu_parent=?");
									$r->execute(array($row['menu_id']));
									$total = $r->rowCount();
									if($total)
									{
										echo '<ul>';
										$result1 = $r->fetchAll(PDO::FETCH_ASSOC);							
										foreach ($result1 as $row1) 
										{
											echo '<li>';
											if($row1['menu_type']=='Category')
											{
												echo '<a href="'.BASE_URL.URL_CATEGORY.$row1['category_or_page_slug'].'">';
											}
											if($row1['menu_type']=='Page')
											{
												echo '<a href="'.BASE_URL.URL_PAGE.$row1['category_or_page_slug'].'">';
											}
											if($row1['menu_type']=='Other')
											{
												echo '<a href="'.$row1['menu_url'].'">';
											}											
											echo $row1['menu_name'];
											echo '</a>';
											echo '</li>';
										}
										echo '</ul>';
									}
									echo '</li>';
								}
								?>
							</ul>
						</div>
						<!-- Nav End -->

					</div>
				</div>
			</div>
		</header>
		<!-- Header End -->