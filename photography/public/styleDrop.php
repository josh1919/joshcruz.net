<?php require_once("../includes/functions.php"); ?>
<?php

	$style = $_POST['styleOption'];

	switch($style){
	case "people":
		redirect_to("index.php?id=1");
		break;
	case "landscape":
		redirect_to("index.php?id=2");
		break;
	case "events":
		redirect_to("index.php?id=3");
		break;
	case "film":
		redirect_to("index.php?id=4");
		break;
	default:
		redirect_to("index.php");
	}
?>