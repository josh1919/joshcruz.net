<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	$layoutContext = "ADMIN";
	$currentLocation="upload"; 
	$currentType = null;
?>
<?php
	if (isset($_POST['source']) &&
		isset($_POST['width']) &&
		isset($_POST['height']) &&
		isset($_POST['alt']) &&
		//isset($_POST['thumb']) &&
		isset($_POST['type']) &&
		isset($_POST['submit']))		
			{
				$source = get_post($conn,'source');
				$width = get_post($conn,'width');
				$height = get_post($conn,'height');
				$alt = get_post($conn,'alt');
				$title = $alt;
				if (isset($_POST['name'])) { // name is in an if because can be null
					$name = get_post($conn, 'name'); 
				}
				if (isset($_POST['thumb'])) {
					$thumb = get_post($conn,'thumb');
				}
				
				$type = get_post($conn,'type');

				$query = "INSERT INTO photos (type_id, source,";
				if(isset($name)){
					$query .= " name,";
				}
				$query .= " width, height, alt, title";
				if (isset($thumb)) {
					$query .= ", thumb";
				}				 
				$query .= ") VALUES (";
				$query .= "'$type', '$source',";
				if (isset($name)) {
					$query.= " '$name',";
				}
				$query .= " '$width', '$height', '$alt', '$title'";
				if (isset($thumb)) {
					$query .= ", '$thumb'";
				}
				$query .=")";
				$result = $conn->query($query);
				//if(!$result) echo "INSERT failed: $query" . "<br>" . $conn->error . "<br><br>";

				if ($result && mysqli_affected_rows($conn) == 1) {
					// Success
					$_SESSION["message"] = "Photo Added.";
					redirect_to("addPhoto.php");
			    } else {
					// Failure
					$_SESSION["message"] = "Photo Add failed.";
					redirect_to("managePhotography.php");
			    }
			}
?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
	<?php echo navigation($currentLocation); ?>
	<div id="mainContentEditing" class="col-10" display="block">


<?php

	$target_dir= "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//Check if file is an actual image or a fake image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
			} else {
				echo "File is NOT an image.";
				$uploadOk = 0;
			}
		if (file_exists($target_file)) {
			echo "file already exists";
			$uploadOk =0;
		}
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			echo "File too large";
			$uploadOk = 0;
		}
		if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
			echo "Will not upload, only jpg, jpeg, and png files are allowed.";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			echo "File not uploaded";
		} else { //will actually upload the file
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file" . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded to ";
				echo $target_file;
			} else {
				echo "There was an error uploading the file";
			}
		}
	}

?>


	<br>Add a photo to the database. <br>


	<form action="upload.php" method="post" <!-- enctype="multipart/form-data" -->>
		<p> Select image to upload:
    	<!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
    	</p>
		<p>
			Name: <input type="text" name="name"> (Can be empty)
		</p>
		<p>
			Source: <input type="text" name="source" value="<?php echo $target_file; ?>">
		</p>
		<p>
			Width: <input type="text" name="width">
		</p>
		<p>
			Height: <input type="text" name="height">
		</p>
		<p>
			Alt/Title: <input type="text" name="alt"> 
		</p>
		<p>
			Thumbnail Source: <input type="text" name="thumb">
		</p>
		<p>
			Photo Type: <input type="radio" name="type" value="1"> People
			&nbsp;
			<input type="radio" name="type" value="2"> Landscape
			&nbsp;
			<input type="radio" name="type" value="3"> Events
			&nbsp;
			<input type="radio" name="type" value="4"> Film
		</p>
		<input type="submit" name="submit" value="Add Photo" />

	</form>

	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>