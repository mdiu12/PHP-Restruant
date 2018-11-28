<?php require_once('header.php'); ?>

<?php
// Preventing the direct access of this page.
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_category_food_menu WHERE category_id=?");
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
	$statement = $pdo->prepare("SELECT * FROM tbl_food_menu WHERE category_id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		unlink('../uploads/'.$row['photo']);
	}

	// Delete from tbl_food_menu
	$statement = $pdo->prepare("DELETE FROM tbl_food_menu WHERE category_id=?");
	$statement->execute(array($_REQUEST['id']));

	// Delete from tbl_category_food_menu
	$statement = $pdo->prepare("DELETE FROM tbl_category_food_menu WHERE category_id=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: food-menu-category.php');
?>