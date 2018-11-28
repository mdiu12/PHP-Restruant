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
	// Check the category slug is valid or not.
	$statement = $pdo->prepare("SELECT * FROM tbl_category WHERE category_slug=?");
	$statement->execute(array($_REQUEST['slug']));
	$total = $statement->rowCount();
	if( $total == 0 )
	{
		header('location: '.BASE_URL);
		exit;
	}
}

// Getting the category name from the category slug
$statement = $pdo->prepare("SELECT * FROM tbl_category WHERE category_slug=?");
$statement->execute(array($_REQUEST['slug']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) 
{
	$category_name = $row['category_name'];
	$category_slug = $row['category_slug'];
	$category_id = $row['category_id'];
}
?>

<section class="main-slider">
	<div class="slide-single slide-single-page" style="background-image: url(<?php echo BASE_URL; ?>uploads/<?php echo $banner; ?>)">
		<div class="overlay"></div>
		<div class="text text-page">
			<div class="this-item">
				<h2>Category: <?php echo $category_name; ?></h2>
			</div>
		</div>			
	</div>
</section>


<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				
				<!-- Blog Classic Start -->
				<div class="blog-grid">
					<div class="row">
						<div class="col-md-12">
							<?php
							$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE category_id=? ORDER BY news_id DESC");
							$statement->execute([$category_id]);
							$total = $statement->rowCount();
							?>

							<?php if(!$total): ?>
							<p style="color:red;">Sorry! No News is found.</p>
							<?php else: ?>

							<?php
							/* ===================== Pagination Code Starts ================== */
							$adjacents = 10;	
							
							$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE category_id=? ORDER BY news_id DESC");
							$statement->execute([$category_id]);
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

							                           WHERE t1.category_id=?
							                           ORDER BY t1.news_id 
							                           LIMIT $start, $limit");
							$statement->execute([$category_id]);
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
													<li><i class="fa fa-tag"></i>Category: <a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></li>
													<li><i class="fa fa-calendar"></i>Date: <?php echo $row['news_date']; ?></a></li>
												</ul>
												<p>
													<?php echo nl2br($row['news_short_content']); ?>
												</p>
												<p class="button">
													<a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>">Read More</a>
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

<?php require_once('footer.php'); ?>