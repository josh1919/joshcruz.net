<?php

function redirect_to($new_location) {
	header("Location:" . $new_location);
	exit;
}

function confirm_query($result) {
	if (!$result) {
		die("Database query failed, TODO");
	}
}

function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}

function get_post($conn, $var){
	return $conn->real_escape_string($_POST[$var]);
}

function find_all_types(){
	global $conn;

	$query  = "SELECT * ";
	$query .= "FROM types ";
	$query .= "ORDER BY id ASC";
	confirm_query($query);
	$type_set = $conn->query($query);
	if (!$type_set) die($conn->error);
	return $type_set;
}

function find_photos_for_type($type_id) {
	global $conn;

	$safe_type_id = mysqli_real_escape_string($conn, $type_id);
	
	$query  = "SELECT * ";
	$query .= "FROM photos ";
	$query .= "WHERE type_id = {$safe_type_id} ";
	$type_set = $conn->query($query);
	if (!$type_set) die($conn->error);
	return $type_set;
}

function find_all_photos() {
		global $conn;

		$query  = "SELECT * ";
		$query .= "FROM photos ";
		$query .= "ORDER BY rand()";
		$photo_set = mysqli_query($conn, $query);
		// confirm_query($photo_set);
		// return $photo_set;
		if(!$photo_set) die($conn->error);
		return $photo_set;
	}

	function find_admin_by_username($username) {
		global $conn;
		
		$safe_username = mysqli_real_escape_string($conn, $username);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($conn, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

function find_all_admins() {
	global $conn;
	
	$query  = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "ORDER BY username ASC";
	$admin_set = mysqli_query($conn, $query);
	confirm_query($admin_set);
	return $admin_set;
}

	function find_admin_by_id($admin_id) {
		global $conn;
		
		$safe_admin_id = mysqli_real_escape_string($conn, $admin_id);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE id = {$safe_admin_id} ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($conn, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

function public_navigation($currentLocation){
	
	$output = "<div id =\"leftbar\" class=\"col-2\">";
	$output .= "<h2 style=\"padding:5px;\"><a href=\"index.php\">Photography</a></h2>";
	$typeSet = find_all_types();
	$output .= "<ul>";
	while ($type = mysqli_fetch_assoc($typeSet)) {
		$output .= "<li";
			if ($currentLocation == $type["id"]) {
				$output .= " class=\"presentlocation\"";
			}
		$output .= ">";
		$output .= "<a href=\"index.php?id=";
		$output .= urlencode($type["id"]);
		$output .= "\">";
		$output .= htmlentities($type["menu_name"]);
		$output .= "</a>";
	}
	$output .="</ul><br><br>";
	$output .= "<a href=\"admin.php\">Log In</a></div>";
	mysqli_free_result($typeSet);
	echo $output;
}

function navigation($currentLocation){
	$output = "<div id =\"leftbar\" class=\"col-2\">";
	$output .= "<h2 style=\"padding:5px;\"><a href=\"index.php\">Photography</a></h2>";
	$typeSet = find_all_types();
	$output .= "<ul>";
	while ($type = mysqli_fetch_assoc($typeSet)) {
		$output .= "<li";
			if ($currentLocation == $type["id"]) {
				$output .= " class=\"presentlocation\"";
			}
		$output .= ">";
		$output .= "<a href=\"managePhotography.php?type_id=";
		$output .= urlencode($type["id"]);
		$output .= "\">";
		$output .= htmlentities($type["menu_name"]);
		$output .= "</a>";
	}
	$output .="</ul>";

	$output.= "<div id=\"adminElements\">";
	$output .= "<a href=\"managePhotography.php\"> Manage Photography </a><br /><br />";
	$output .= "<a href=\"addPhoto.php\"> Add Photo </a><br />";
	$output .= "<a href=\"admin.php\">Admin area</a><br /><br />";
	$output .= "<a href=\"logout.php\">Log out</a>";
	$output .= "</div>";

	$output .= "</div>";
	mysqli_free_result($typeSet);
	echo $output;
	
}

function password_encrypt($password) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}
	
	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

?>