<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['name'])) {
		$valid = 0;
		$error_message .= 'Name can not be empty<br>';
	}

	if(empty($_POST['description'])) {
		$valid = 0;
		$error_message .= 'Description can not be empty<br>';
	}
	
    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file for Featured Photo<br>';
        }
    }

	if($valid == 1) {

		$statement = $pdo->prepare("SELECT * FROM tbl_service WHERE id=?");
		$statement->execute(array($_REQUEST['id']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			$current_name = $row['name'];
		}

		if($path == '') {
			$statement = $pdo->prepare("UPDATE tbl_service SET name=?, description=?, service_order=?, show_on_home=? WHERE id=?");
    		$statement->execute(array($_POST['name'],$_POST['description'],$_POST['service_order'],$_POST['show_on_home'],$_REQUEST['id']));
		} else {
			unlink('../uploads/'.$_POST['current_photo']);

			$final_name = 'service-'.$_REQUEST['id'].'.'.$ext;
        	move_uploaded_file( $path_tmp, '../uploads/'.$final_name );

        	$statement = $pdo->prepare("UPDATE tbl_service SET name=?, description=?, photo=?, service_order=?, show_on_home=? WHERE id=?");
    		$statement->execute(array($_POST['name'],$_POST['description'],$final_name,$_POST['service_order'],$_POST['show_on_home'],$_REQUEST['id']));
		} 
		

		$success_message = 'Service is updated successfully!';
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_service WHERE id=?");
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
		<h1>Edit Service</h1>
	</div>
	<div class="content-header-right">
		<a href="service.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_service WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$name           = $row['name'];
	$description    = $row['description'];
	$photo          = $row['photo'];
	$service_order  = $row['service_order'];
	$show_on_home   = $row['show_on_home'];
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
				<input type="hidden" name="current_photo" value="<?php echo $photo; ?>">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo $name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description <span>*</span></label>
							<div class="col-sm-6">
								<textarea class="form-control" name="description" id="editor1"><?php echo $description; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Photo</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="../uploads/<?php echo $photo; ?>" alt="Service Photo" style="width:200px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Photo </label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Order</label>
							<div class="col-sm-1">
								<input type="text" autocomplete="off" class="form-control" name="service_order" value="<?php echo $service_order; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on home? <span>*</span></label>
							<div class="col-sm-6">
								<select name="show_on_home" class="form-control" style="width:auto;">
									<option value="Yes" <?php if($show_on_home == 'Yes') {echo 'checked';} ?>>Yes</option>
									<option value="No" <?php if($show_on_home == 'No') {echo 'checked';} ?>>No</option>
								</select>
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>