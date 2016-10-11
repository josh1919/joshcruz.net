<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
	$layoutContext = "ADMIN";
	if (isset($_GET['type_id'])) {
		$currentType= $_GET['type_id'];
	} else {
		$currentType = null;
	}

	$currentLocation = "managePhotography";

?>

<?php include("../includes/layouts/header.php"); ?>

<div id="main">
<?php navigation($currentLocation); ?>
	<div id="maincontent" class="col-10">

	<?php
		echo message();

		if ($currentType == null) {
			
			echo "Choose a photo type to begin editing";
		} else {
			
			$result = find_photos_for_type($currentType);

			$rows = $result->num_rows;
			for ($j = 0; $j<$rows; ++$j){

				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				$source= htmlentities($row['source']);
				$title = htmlentities($row['title']);
				$alt = htmlentities($row['alt']);
				$width = htmlentities($row['width']);
				$height = htmlentities($row['height']);
				$thumb = htmlentities($row['thumb']);			


				$myPhoto = "<div class=\"photo col-4\">";
				$myPhoto .= "<a href=\"";
				$myPhoto .= $source;
				$myPhoto .= "\">";
				$myPhoto .= "<img src=\"" . $source . "\" ";
				$myPhoto .= "title=\"" . $title . "\"" . "alt=\"" . $alt . "\"";
				$myPhoto .= "width=\"" . $width . "\"" . "height=\"" . $height . "\">";
				$myPhoto .= "</a></div>";

				echo $myPhoto;

				?>

				
			<div id="mainContentEditing" class="col-5" style="border:2px solid black">
				<form id="editForm" name="editForm" method="post" action="editPhoto.php">
					<p>
					Name: <input type="text" name="name"> (Can be empty) 
					<p>
						<?php echo "ID = " . $row['id'] ?>
					</p>
					<input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
					<input type="hidden" name="type" value="<?php echo htmlentities($_GET['type_id']);?>">
					</p>
					<p>
						Source: <input type="text" name="source" value="<?php echo $source; ?>">
					</p>
					<p>
						Width: <input type="text" name="width" value="<?php echo $width; ?>">
					</p>
					<p>
						Height: <input type="text" name="height" value="<?php echo $height; ?>">
					</p>
					<p>
						Alt/Title: <input type="text" name="alt" value="<?php echo $alt; ?>"> 
					</p>
					<p>
						Thumbnail Source: <input type="text" name="thumb" value="<?php echo $thumb; ?>">
					</p>
					<p>
						Photo Type: <input type="radio" name="type" value="1" 
						<?php if($currentType == 1) echo "checked=\"checked\"";?>> People
						
						<input type="radio" name="type" value="2" 
						<?php if($currentType == 2) echo "checked=\"checked\"";?>> Landscape
						
						<input type="radio" name="type" value="3" 
						<?php if($currentType == 3) echo "checked=\"checked\"";?>> Events
						
						<input type="radio" name="type" value="4" 
						<?php if($currentType == 4) echo "checked=\"checked\"";?>> Film
					</p>
					<input type="submit" name="submit" value="Edit photo" />
				</form>
			</div>
			<div id="addThumbButton" class="col-1">
				<form id="thumbButton" name="thumbForm"	method="post" action="addThumb.php">
					<input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
					<input type="submit" name="addThumb" value="Add Thumbnail">
				</form>
			</div>
			<div id="deleteButton" class="col-2" style="border:2px solid red">
				<form id="deleteForm" name="deleteForm" method="post" action="deletePhoto.php">
					<input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
					<input type="hidden" name="type_id" value="<?php echo $row['type_id'];?>">
					<input type="submit" name="submit2" value="DELETE PHOTO">
				</form>
			</div>			
					<?php
			}	
		}	
		?>

		
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>