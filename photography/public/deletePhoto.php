<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	if (isset($_POST['id']) &&
		isset($_POST['submit2'])) {	

		$id = $_POST['id'];
		
		$query = "DELETE from photos ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";

		$result = $conn->query($query);
	

	// if(!$result) echo "UPDATE failed: $query" . "<br>" . $conn->error . "<br><br>";

	if ($result && mysqli_affected_rows($conn) == 1) {
		// Success
		$_SESSION["message"] = "Photo deleted.";
		redirect_to("managePhotography.php?type_id={$id}");
    } else {
		// Failure
		$_SESSION["message"] = "Photo deletion FAILED.";
		redirect_to("managePhotography.php");
    }
}
?>