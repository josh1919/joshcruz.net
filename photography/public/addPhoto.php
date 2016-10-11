<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
	$currentLocation="upload"; 
	$layoutContext = "ADMIN";
?>

<?php include("../includes/layouts/header.php"); ?>

<div id="main">
	<?php echo navigation($currentLocation); ?>
	<?php echo message(); ?>
	<div id="mainContentEditing" class="col-10" display="block">
		<form method="post" action="upload.php" enctype="multipart/form-data">
			Select Photo: <input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>
	</div>
</div>


<?php include("../includes/layouts/footer.php"); ?>