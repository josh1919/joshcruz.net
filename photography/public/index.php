<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	$layoutContext = "public";
	$currentLocation = "photography";
	if (isset($_GET['id'])) {
			$currentType= $_GET['id'];
	}
?>

<?php include("../includes/layouts/header.php"); ?>
<div id="main">
<?php public_navigation($currentLocation); ?>
	<div id="maincontent" class="col-10">
		<?php


		if (isset($currentType)) {
			$result = find_photos_for_type($currentType);
		} else {
			$result = find_all_photos();
		}

		$rows = $result->num_rows;

		for ($j = 0; $j<$rows; ++$j){

			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$sourcetest = $row['source'];

			$myPhoto = "<div class=\"photo\">";
			$myPhoto .= "<a href=\"";
			$myPhoto .= $row['source'];
			$myPhoto .= "\">";
			$myPhoto .= "<img src=\"";
			if (!empty($row['thumb'])) {
				$myPhoto .= $row['thumb'];
			} else {
			 $myPhoto .= $row['source']; 
			}

			$myPhoto .= "\"";
			$myPhoto .= "title=\"" . $row['title'] . "\"" . "alt=\"" . $row['alt'] . "\"";
			$myPhoto .= "width=\"" . $row['width'] . "\"" . "height=\"" . $row['height'] . "\">";
			$myPhoto .= "</a></div>";		

			echo $myPhoto;
		 } 
		 
		
		?>

	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>