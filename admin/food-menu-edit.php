<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['food_menu_name'])) {
		$valid = 0;
		$error_message .= 'Food Menu Name can not be empty<br>';
	}

	if(empty($_POST['food_menu_description'])) {
		$valid = 0;
		$error_message .= 'Food Menu Description can not be empty<br>';
	}

	if(empty($_POST['food_menu_price'])) {
		$valid = 0;
		$error_message .= 'Food Menu Price can not be empty<br>';
	}

	if(empty($_POST['category_id'])) {
		$valid = 0;
		$error_message .= 'You must have to select a category<br>';
	}

	$path = $_FILES['food_menu_photo']['name'];
    $path_tmp = $_FILES['food_menu_photo']['tmp_name'];

    $previous_photo = $_POST['previous_photo'];

	if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

	if($valid == 1) {

		// If previous image not found and user do not want to change the photo
	    if($previous_photo == '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_food_menu SET food_menu_name=?, food_menu_description=?, food_menu_price=?, food_menu_order=?, category_id=? WHERE food_menu_id=?");
	    	$statement->execute(array($_POST['food_menu_name'],$_POST['food_menu_description'],$_POST['food_menu_price'],$_POST['food_menu_order'],$_POST['category_id'],$_REQUEST['id']));
	    }

		// If previous image found and user do not want to change the photo
	    if($previous_photo != '' && $path == '') {
	    	$statement = $pdo->prepare("UPDATE tbl_food_menu SET food_menu_name=?, food_menu_description=?, food_menu_price=?, food_menu_order=?, category_id=? WHERE food_menu_id=?");
	    	$statement->execute(array($_POST['food_menu_name'],$_POST['food_menu_description'],$_POST['food_menu_price'],$_POST['food_menu_order'],$_POST['category_id'],$_REQUEST['id']));
	    }


	    // If previous image not found and user want to change the photo
	    if($previous_photo == '' && $path != '') {

	    	$final_name = 'food-menu-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_food_menu SET food_menu_name=?, food_menu_description=?, food_menu_price=?, food_menu_photo=?, food_menu_order=?, category_id=? WHERE food_menu_id=?");
	    	$statement->execute(array($_POST['food_menu_name'],$_POST['food_menu_description'],$_POST['food_menu_price'],$final_name,$_POST['food_menu_order'],$_POST['category_id'],$_REQUEST['id']));
	    }

	    
	    // If previous image found and user want to change the photo
		if($previous_photo != '' && $path != '') {

	    	unlink('../uploads/'.$previous_photo);

	    	$final_name = 'food-menu-'.$_REQUEST['id'].'.'.$ext;
            move_uploaded_file( $path_tmp, '../uploads/'.$final_name );

	    	$statement = $pdo->prepare("UPDATE tbl_food_menu SET food_menu_name=?, food_menu_description=?, food_menu_price=?, food_menu_photo=?, food_menu_order=?, category_id=? WHERE food_menu_id=?");
	    	$statement->execute(array($_POST['food_menu_name'],$_POST['food_menu_description'],$_POST['food_menu_price'],$final_name,$_POST['food_menu_order'],$_POST['category_id'],$_REQUEST['id']));
	    }

	    $success_message = 'Food Menu is updated successfully!';
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE food_menu_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Food Menu</h1>
	</div>
	<div class="content-header-right">
		<a href="food-menu.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE food_menu_id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$food_menu_name        = $row['food_menu_name'];
	$food_menu_description = $row['food_menu_description'];
	$food_menu_price       = $row['food_menu_price'];
	$food_menu_photo       = $row['food_menu_photo'];
	$food_menu_order       = $row['food_menu_order'];
	$category_id           = $row['category_id'];
}
?>

<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Food Menu Name <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="food_menu_name" value="<?php echo $food_menu_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Food Menu Description <span>*</span></label>
							<div class="col-sm-6">
								<textarea class="form-control" name="food_menu_description" style="height:100px;"><?php echo $food_menu_description; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Food Menu Price <span>*</span></label>
							<div class="col-sm-1">
								<input type="text" class="form-control" name="food_menu_price" value="<?php echo $food_menu_price; ?>">
							</div>
						</div>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Existing Featured Photo</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				            	<?php
				            	if($food_menu_photo == '') {
				            		echo 'No photo found';
				            	} else {
				            		echo '<img src="../uploads/'.$food_menu_photo.'" class="existing-photo" style="width:200px;">';	
				            	}
				            	?>
				                <input type="hidden" name="previous_photo" value="<?php echo $food_menu_photo; ?>">
				            </div>
				        </div>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Change Featured Photo</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				                <input type="file" name="food_menu_photo">
				            </div>
				        </div>
				        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Order</label>
							<div class="col-sm-1">
								<input type="text" class="form-control" name="food_menu_order" value="<?php echo $food_menu_order; ?>">
							</div>
						</div>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Categories <span>*</span></label>
				            <div class="col-sm-3">
				            	<select class="form-control select2" name="category_id">
								<?php
				            	$i=0;
				            	$statement = $pdo->prepare("SELECT * FROM tbl_category_food_menu ORDER BY category_name ASC");
				            	$statement->execute();
				            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				            	foreach ($result as $row) {
									?>
									<option value="<?php echo $row['category_id']; ?>" <?php if($row['category_id']==$category_id){echo 'selected';} ?>><?php echo $row['category_name']; ?></option>
	                                <?php
								}
								?>
								</select>
				            </div>
				        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>