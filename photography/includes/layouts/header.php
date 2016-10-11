<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" type="text/css" href="stylesheets/mystyle.css">
<link type='text/css' href="https://fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700%2C900%2C300italic%2C400italic%2C700italic&subset=latin%2Clatin-ext" />
<title>
	<?php 
		if ($layoutContext == "ADMIN") echo $layoutContext . " ";

		if ($currentLocation == "managePhotography") {
			echo "Manage Photography";
		} elseif ($currentLocation == "editPhoto") {
			echo "Edit photos";		
		} elseif ($currentLocation == "photographyMain") {
			echo "Photography";
		} elseif ($currentLocation == "upload") {
			echo "Add a Photo";
		} else {
			echo "Photography";
		}


		if (isset($currentType)) {
			echo " - ";
			if ($currentType == 1) {
				echo "People";
			} elseif ($currentType == 2) {
				echo "Landscape";
			} elseif ($currentType == 3) {
				echo "Events";
			} elseif ($currentType == 4) {
				echo "Film";
			} 
		}
	?>
</title>
</head>
<body onload="pageLoad()">	
<script type="text/javascript">

	function pageLoad(){
		var viewportWidth = window.innerWidth;
		var myLeftBar = document.getElementById("leftbar");
		var mainContent = document.getElementById("maincontent");
		var wideNav = document.getElementById("myNav");
		var mobileNav = document.getElementById("mobileNav");

		if(viewportWidth < 660){
			myLeftBar.style.display = "none";
			wideNav.style.display = 'none';
			mobileNav.style.display = 'block';
		}
	}

	window.onresize = function(){
		var viewportWidth = window.innerWidth;
		var myLeftBar = document.getElementById("leftbar");
		var mainContent = document.getElementById("maincontent");
		var wideNav = document.getElementById("myNav");
		var mobileNav = document.getElementById("mobileNav");
		
		if (viewportWidth > 1001) {
			myLeftBar.className = "col-2";
			mainContent.className = "col-10";		
		} else if(viewportWidth > 660){
			wideNav.style.display = "block";
			mobileNav.style.display ="none";
			myLeftBar.style.display = "block";
			myLeftBar.className = "col-3";
			mainContent.className = "col-9";
		} else{
			myLeftBar.style.display = "none";
			wideNav.style.display = 'none';
			mobileNav.style.display = 'block';
		}
	}

	function hamburger(){
		var hamburger_menu = document.getElementById('hamburger_menu');
		if(hamburger_menu.style.display == 'none'){
			hamburger_menu.style.display = 'block';
		}
		else {
			hamburger_menu.style.display = 'none';
		}
	}

</script>

<div id="bodyWrapper">
<div id="navWrapper" class="col-12">	
	<div id="myNav" class="col-12">
		<ul>
			<li class="col-2"><a href="#">joshcruz.net</a></li>  
			<li class="col-2"><a href="http://csblog.joshcruz.net">CS Blog</a></li>
			<li class="col-2">
				<a href="index.php">Photography</a>
				<ul>
					<li><a href="index.php?id=1">People</a></li>
					<li><a href="index.php?id=2">Landscape</a></li>
					<li><a href="index.php?id=3">Events</a></li>
					<li><a href="index.php?id=4">Film</a></li>
				</ul>
				<li class="col-2"><a href="http://www.resume.joshcruz.net/index.php">Resume</a>
			</li>

		</ul>
	</div>
	<div id="mobileNav" class="col-12">
		joshcruz.net
		<div id="hamburger" onclick="hamburger()"><img src="assets/hamburger_icon_white.png"></div>
		<ul id="hamburger_menu">
			<li><a href="http://csblog.joshcruz.net">CS Blog</a></li>
			<li><a href="http://www.resume.joshcruz.net/index.php">Resume</a></li>
		</ul>
		<div>
			<form action="styleDrop.php" method="post">
				<select name="styleOption">
					<option value="i">Photo styles Home</option>
					<option value="people">People</option>
					<option value="landscape">Landscape</option>
					<option value="events">Events</option>
					<option value="film">Film</option>
				</select>
				<button type="submit">Go!</button>
			</form>
		</div>
	</div>
</div>