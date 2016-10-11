<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	$layoutContext = "ADMIN";
	$currentLocation="upload"; 
	$currentType = null;
	if (isset($_POST['id'])) {
		$id = get_post($conn, 'id');
	}	
?>
<?php

	$target_dir= "images/thumbs/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//Check if file is an actual image or a fake image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if ($check !== false) {
			$_SESSION["message"] = "File is an image - " . $check["mime"] . ". ";
			$uploadOk = 1;
			} else {
				$_SESSION["message"] =  "File is NOT an image. ";
				$uploadOk = 0;
			}
		if (file_exists($target_file)) {
			$_SESSION["message"] .= "file already exists. ";
			$uploadOk =0;
		}
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			$_SESSION["message"] .= "File too large. ";
			$uploadOk = 0;
		}
		if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
			$_SESSION["message"] .= "Will not upload, only jpg, jpeg, and png files are allowed. ";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			$_SESSION["message"] .= "File not uploaded. ";
			redirect_to("managePhotography.php");
		} else { //will actually upload the file
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$_SESSION["message"] .= "The file" . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded to ";
				$_SESSION["message"] .= $target_file;

				$thumbsource = $conn->real_escape_string($target_file);
				$query = "UPDATE photos SET ";
				$query .= "thumb = '$thumbsource' ";
				$query .= "WHERE id = {$id}";
				//$query .= " LIMIT 1";

				$result = $conn->query($query);
				if (!$result) {
					$errorMessage = $conn->error;
				}
					
				
				if ($result && mysqli_affected_rows($conn) == 1) {
					// Success
					$_SESSION["message"] .= "Thumbnail Added. ";
					redirect_to("managePhotography.php");
			    } else {
					// Failure
					$_SESSION["message"] .= "Thumbnail upload failed. The error is: " . $errorMessage;
					redirect_to("managePhotography.php");
			    }
			} else {
				$_SESSION["message"] .= "There was an error uploading the file ";
				redirect_to("managePhotography.php");
			}
		}
	}
?>