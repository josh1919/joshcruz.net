<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	if (isset($_POST['source']) &&
		is_numeric($_POST['id']) &&
		isset($_POST['width']) &&
		isset($_POST['height']) &&
		isset($_POST['alt']) &&
		//isset($_POST['thumb']) &&
		isset($_POST['type']) &&
		isset($_POST['submit'])){	


		$id = (int)$_POST['id'];
		$source= get_post($conn, 'source');
		//$title = htmlentities($_POST['title']);
		$alt = get_post($conn, 'alt');
		$width = (int)($_POST['width']);
		$height = (int)($_POST['height']);
		if (isset($_POST['thumb'])) {
			$thumb = get_post($conn, 'thumb');
		}
		$type = (int)($_POST['type']);

		$query = "UPDATE photos SET ";
		$query .= "source = '{$source}', ";
		$query .= "title = '{$alt}', ";
		$query .= "alt = '{$alt}', ";
		$query .= "width = {$width}, ";
		$query .= "height = {$height}, ";
		$query .= "type_id = {$type} ";
		if (!isset($thumb)) {
			$query .= ", thumb = '{$thumb}' ";
		}

		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";

		$result = $conn->query($query);
	

	// if(!$result) echo "UPDATE failed: $query" . "<br>" . $conn->error . "<br><br>";
//TODO: this session area is not working. I have to fix the problems I'm having with the edit page before I worry about 
//this
	if ($result && mysqli_affected_rows($conn) == 1) {
		// Success
		$_SESSION["message"] = "Photo updated.";
		redirect_to("managePhotography.php?type_id={$type}");
    } else {
		// Failure
		$_SESSION["message"] = "Photo update FAILED" . $conn->error;
		redirect_to("managePhotography.php?type_id={$type}");
    }
}
?>