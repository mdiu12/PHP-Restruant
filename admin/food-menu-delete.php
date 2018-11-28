<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE food_menu_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php
	
	// Getting photo ID to unlink from folder
	$statement = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE food_menu_id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$food_menu_photo = $row['food_menu_photo'];
	}

	// Unlink the photo
	if($food_menu_photo!='') {
		unlink('../uploads/'.$food_menu_photo);	
	}

	// Delete from tbl_food_menu
	$statement = $pdo->prepare("DELETE FROM tbl_food_menu WHERE food_menu_id=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: food-menu.php');
?>