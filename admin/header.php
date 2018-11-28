<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}

// Current Page Access Level check for all pages
$cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

if($_SESSION['user']['role']=='Admin') {
	if( $cur_page == 'user.php' || $cur_page == 'user-add.php' || $cur_page == 'user-edit.php' || $cur_page == 'user-delete.php' ) {
		header('location: index.php');
		exit;
	}
}

if($_SESSION['user']['role']=='Publisher') {
	if( $cur_page != 'index.php' 
	    && $cur_page != 'profile-edit.php' 
	    && $cur_page != 'subscriber.php' 
	    && $cur_page != 'news.php'
	    && $cur_page != 'news-add.php' 
	    && $cur_page != 'news-edit.php' 
	    && $cur_page != 'news-delete.php' 
	    && $cur_page != 'file.php'
		&& $cur_page != 'file-add.php' 
	    && $cur_page != 'file-edit.php' 
	    && $cur_page != 'file-delete.php' 
	    && $cur_page != 'photo.php'
		&& $cur_page != 'photo-add.php' 
	    && $cur_page != 'photo-edit.php' 
	    && $cur_page != 'photo-delete.php'
	    && $cur_page != 'video.php'
		&& $cur_page != 'video-add.php' 
	    && $cur_page != 'video-edit.php' 
	    && $cur_page != 'video-delete.php'
	) {
		header('location: index.php');
		exit;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rest - Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css">
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="index.php" class="logo">
				<span class="logo-lg">Admin Panel</span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Rest - Cafe and Restaurant Website CMS</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Logged in as: <span class="hidden-xs"><?php echo $_SESSION['user']['full_name']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="profile-edit.php" class="btn btn-default btn-flat">Edit Profile</a>
									</div>
									<div>
										<a href="logout.php" class="btn btn-default btn-flat">Log out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>

  		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>

  		<aside class="main-sidebar">
    		<section class="sidebar">
      
      			<ul class="sidebar-menu">

			        <li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
			          <a href="index.php">
			            <i class="fa fa-laptop"></i> <span>Dashboard</span>
			          </a>
			        </li>


					<?php if($_SESSION['user']['role'] == 'Super Admin'): ?>
			        <li class="treeview <?php if( ($cur_page == 'user-add.php')||($cur_page == 'user.php')||($cur_page == 'user-edit.php') ) {echo 'active';} ?>">
			          <a href="user.php">
			            <i class="fa fa-user-plus"></i> <span>User</span>
			          </a>
			        </li>
			    	<?php endif; ?>

					

					<?php 
						if($_SESSION['user']['role'] == 'Super Admin' 
					      || $_SESSION['user']['role'] == 'Admin'):
					?>
			        <li class="treeview <?php if( ($cur_page == 'settings.php') ) {echo 'active';} ?>">
			          <a href="settings.php">
			            <i class="fa fa-cog"></i> <span>Settings</span>
			          </a>
			        </li>
			        <?php endif; ?>



			        <?php 
						if($_SESSION['user']['role'] == 'Super Admin' 
					      || $_SESSION['user']['role'] == 'Admin'):
					?>
			        <li class="treeview <?php if( ($cur_page == 'page-add.php')||($cur_page == 'page.php')||($cur_page == 'page-edit.php') ) {echo 'active';} ?>">
			          <a href="page.php">
			            <i class="fa fa-file-text"></i> <span>Page</span>
			          </a>
			        </li>
			        <?php endif; ?>


			        <li class="treeview <?php if( ($cur_page == 'menu-main-add.php')||($cur_page == 'menu-main.php')||($cur_page == 'menu-main-edit.php') || ($cur_page == 'menu-footer-add.php')||($cur_page == 'menu-footer.php')||($cur_page == 'menu-footer-edit.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-podcast"></i>
							<span>Menu</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="menu-main.php"><i class="fa fa-circle-o"></i> Main Menu</a></li>
							<li><a href="menu-footer.php"><i class="fa fa-circle-o"></i> Footer Menu</a></li>
						</ul>
					</li>



			        <li class="treeview <?php if( ($cur_page == 'food-menu-category-add.php')||($cur_page == 'food-menu-category.php')||($cur_page == 'food-menu-category-edit.php') || ($cur_page == 'food-menu-add.php')||($cur_page == 'food-menu.php')||($cur_page == 'food-menu-edit.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-podcast"></i>
							<span>Food Menu</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="food-menu-category.php"><i class="fa fa-circle-o"></i> Food Menu Category</a></li>
							<li><a href="food-menu.php"><i class="fa fa-circle-o"></i> Food Menu</a></li>
						</ul>
					</li>
			        

					<li class="treeview <?php if( ($cur_page == 'category-add.php')||($cur_page == 'category.php')||($cur_page == 'category-edit.php') || ($cur_page == 'news-add.php')||($cur_page == 'news.php')||($cur_page == 'news-edit.php') || ($cur_page == 'comment.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-podcast"></i>
							<span>News Section</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
							<li><a href="news.php"><i class="fa fa-circle-o"></i> News</a></li>
							<li><a href="comment.php"><i class="fa fa-circle-o"></i> Comment</a></li>
						</ul>
					</li>

										

					<li class="treeview <?php if( ($cur_page == 'designation-add.php')||($cur_page == 'designation.php')||($cur_page == 'designation-edit.php') || ($cur_page == 'chef-add.php')||($cur_page == 'chef.php')||($cur_page == 'chef-edit.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-podcast"></i>
							<span>Chef Section</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="designation.php"><i class="fa fa-circle-o"></i> Designation</a></li>
							<li><a href="chef.php"><i class="fa fa-circle-o"></i> Chef </a></li>
						</ul>
					</li>

					

					<li class="treeview <?php if( ($cur_page == 'slider-add.php')||($cur_page == 'slider.php')||($cur_page == 'slider-edit.php') || ($cur_page == 'testimonial-add.php')||($cur_page == 'testimonial.php')||($cur_page == 'testimonial-edit.php') || ($cur_page == 'service-add.php')||($cur_page == 'service.php')||($cur_page == 'service-edit.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-podcast"></i>
							<span>Elements Section</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="slider.php"><i class="fa fa-circle-o"></i> Slider</a></li>
							<li><a href="testimonial.php"><i class="fa fa-circle-o"></i> Testimonial</a></li>
							
							<li><a href="service.php"><i class="fa fa-circle-o"></i> Service</a></li>
						</ul>
					</li>
					


					<li class="treeview <?php if( ($cur_page == 'faq-category-add.php')||($cur_page == 'faq-category.php')||($cur_page == 'faq-category-edit.php') || ($cur_page == 'faq-add.php')||($cur_page == 'faq.php')||($cur_page == 'faq-edit.php') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-podcast"></i>
							<span>FAQ Section</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="faq-category.php"><i class="fa fa-circle-o"></i> FAQ Category</a></li>
							<li><a href="faq.php"><i class="fa fa-circle-o"></i> FAQ</a></li>
						</ul>
					</li>


					
					<li class="treeview <?php if( ($cur_page == 'photo-gallery.php') ) {echo 'active';} ?>">
			          <a href="photo.php">
			            <i class="fa fa-file"></i> <span>Photo Gallery</span>
			          </a>
			        </li>


					<li class="treeview <?php if( ($cur_page == 'file-add.php')||($cur_page == 'file.php')||($cur_page == 'file-edit.php') ) {echo 'active';} ?>">
			          <a href="file.php">
			            <i class="fa fa-file"></i> <span>File Upload (Media)</span>
			          </a>
			        </li>


					<?php 
						if($_SESSION['user']['role'] == 'Super Admin' 
					      || $_SESSION['user']['role'] == 'Admin'):
					?>
			        <li class="treeview <?php if( ($cur_page == 'social-media.php') ) {echo 'active';} ?>">
			          <a href="social-media.php">
			            <i class="fa fa-address-book"></i> <span>Social Media</span>
			          </a>
			        </li>
			        <?php endif; ?>

        
      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper">