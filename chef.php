<?php require_once('header.php'); ?>

<?php
// Preventing the direct access of this page.
if(!isset($_REQUEST['slug']))
{
	header('location: '.BASE_URL);
	exit;
}
else
{
	// Check the page slug is valid or not.
	$statement = $pdo->prepare("SELECT * FROM tbl_chef WHERE slug=?");
	$statement->execute(array($_REQUEST['slug']));
	$total = $statement->rowCount();
	if( $total == 0 )
	{
		header('location: '.BASE_URL);
		exit;
	}
}

// Getting the detailed data of a service from slug
$statement = $pdo->prepare("SELECT * FROM tbl_chef WHERE slug=?");
$statement->execute(array($_REQUEST['slug']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);				
foreach ($result as $row)
{
	$name              = $row['name'];
	$slug              = $row['slug'];
	$designation_id    = $row['designation_id'];
	$photo             = $row['photo'];
	$banner            = $row['banner'];
	$detail            = $row['detail'];
	$facebook          = $row['facebook'];
	$twitter           = $row['twitter'];
	$linkedin          = $row['linkedin'];
	$youtube           = $row['youtube'];
	$google_plus       = $row['google_plus'];
	$instagram         = $row['instagram'];
	$flickr            = $row['flickr'];
	$phone             = $row['phone'];
	$email             = $row['email'];
	$website           = $row['website'];
	$status            = $row['status'];
}

$statement = $pdo->prepare("SELECT * FROM tbl_designation WHERE designation_id=?");
$statement->execute(array($designation_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);				
foreach ($result as $row)
{
	$designation_name = $row['designation_name'];
}
?>
				
<!-- Slider Start -->
<section class="main-slider">			
	<div class="slide-single slide-single-page" style="background-image:url(<?php echo BASE_URL; ?>uploads/<?php echo $banner; ?>);">
		<div class="overlay"></div>
		<div class="text text-page">
			<div class="this-item">
				<h2><?php echo $name; ?></h2>
			</div>
		</div>			
	</div>			
</section>
<!-- Slider End -->


<!-- Chefs Start -->
<section class="chefs-detail">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="chefs-single">
					<div class="thumb">
						<img src="<?php echo BASE_URL; ?>uploads/<?php echo $photo; ?>" alt="">
					</div>
					<div class="text">
						<h2><?php echo $name; ?></h2>
						<h3><?php echo $designation_name; ?></h3>
						<h4>
							<i class="fa fa-phone"></i> <?php echo $phone; ?><br>
							<i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
							<?php if($website!=''): ?>
							<i class="fa fa-globe"></i> <a href="<?php echo $website; ?>"><?php echo $website; ?></a>
							<?php endif; ?>
						</h4>
					</div>
					<div class="social">
						<div class="title">
							<?php echo lang('SOCIAL_MEDIA_TITLE'); ?>
						</div>
						<ul>
							<?php if($facebook!=''): ?>
								<li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php endif; ?>

							<?php if($twitter!=''): ?>
								<li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php endif; ?>

							<?php if($linkedin!=''): ?>
								<li><a href="<?php echo $linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?php endif; ?>

							<?php if($youtube!=''): ?>
								<li><a href="<?php echo $youtube; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
							<?php endif; ?>

							<?php if($google_plus!=''): ?>
								<li><a href="<?php echo $google_plus; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<?php endif; ?>

							<?php if($instagram!=''): ?>
								<li><a href="<?php echo $instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<?php endif; ?>

							<?php if($flickr!=''): ?>
								<li><a href="<?php echo $flickr; ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-8">				
				
				<div class="chefs-detail-tab">							
					<div class="row">										
						<div class="col-md-12">
							<div class="content">
								<?php
								echo $detail;
								?>										
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- Chefs End -->

<?php require_once('footer.php'); ?>