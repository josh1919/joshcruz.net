<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resume</title>
</head>
<body onload="pageLoad()">
	<script type="text/javascript">
	function pageLoad(){
		var viewportWidth = window.innerWidth;
		var wideNav = document.getElementById("myNav");
		var mobileNav = document.getElementById("mobileNav");

		if(viewportWidth < 742){
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

	window.onresize = function(){
		var viewportWidth = window.innerWidth;
		var wideNav = document.getElementById("myNav");
		var mobileNav = document.getElementById("mobileNav");

		if(viewportWidth > 660){
			wideNav.style.display = "block";
			mobileNav.style.display ="none";
		} else{
			wideNav.style.display = 'none';
			mobileNav.style.display = 'block';
		}
	}
	</script>
	<div id="navWrapper" class="col-12">
		<div id="myNav">
			<ul>
				<li class="col-2"><a href="#">joshcruz.net</a></li>
				<li class="col-2"><a href="http://csblog.joshcruz.net">CS Blog</a></li>
				<li class="col-2">
					<a href="http://photography.joshcruz.net/public/index.php">Photography</a>
					<!--
					Dropdown options for photography
					<ul>
					<li><a href="http://photography.joshcruz.net/public/index.php?id=1">People</a></li>
					<li><a href="http://photography.joshcruz.net/public/index.php?id=2">Landscape</a></li>
					<li><a href="http://photography.joshcruz.net/public/index.php?id=3">Events</a></li>
					<li><a href="http://photography.joshcruz.net/public/index.php?id=4">Film</a></li>
				</ul> -->
			</li>
			<li class="col-2"><a href="#">Resume</a></li>
		</ul>
	</div>

	<div id="mobileNav" class="col-12">
		joshcruz.net
		<div id="hamburger" onclick="hamburger()"><img src="assets/hamburger_icon_white.png"></div>
		<ul id="hamburger_menu">
			<li><a href="http://csblog.joshcruz.net">CS Blog</a></li>
			<li><a href="http://www.photography.joshcruz.net/index.php">Photography</a></li>
		</ul>
	</div>
</div>
<div class="container">
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">joshcruz.net</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav  navbar-right">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#portfolio">Portfolio</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>

		</div>
	</nav>
</div>


<div class="fluid-container">

	<div class="container bg-setup" id="home">
		<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
			<h1 class="text-center text-shadow" style="margin-top:100px;">Josh Cruz</h1>
			<h1 class="text-center text-shadow">Web Developer</h1>
			<hr>
		</div>

		<div class="well text-shadow col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10" style="margin-bottom:200px;">
			<p>Creative and dependable Entry Level Web Developer. Impeccable work ethic and excellent dealing with unexpected changes with a positive attitude. Knowledgeable in web languages and principles of development. See challenges as opportunities to continue learning and work with new technologies.
			</p>
			<div class="row text-center">
				<a class="btn btn-default" href="http://csblog.joshcruz.net" role="button">CS Blog</a>
				<a class="btn btn-default" href="https://github.com/josh1919" role="button">Github</a>
				<!-- <a class="btn btn-default" href- "#" role="button">freeCodeCamp</a> -->
			</div>

		</div>

	</div>

	<div class="container pad25 bg-setup" id="about">
		<h2 class="text-center text-shadow-small">Development Career</h2>
		<div class="row">
			<div class="my-bg center-block">
				<p>
					I completed an Associate's degree in computer science and developed a deep interest in theoretical concepts, but most of my working knowledge comes from independent study. I have developed a few different websites and made sure to highlight the importance of having an adaptive site.
				</p>
				<p>
					My favorite thing about programming is creating something out of nothing and giving someone else the opportunity to untuitively use what I have developed.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-1 col-md-5 my-bg">
				<h3 class="text-center text-shadow-small">Experience</h3>
				<h4>2014: SPAWAR</h4>
				<p>A part of team that developed an Augmented Reality App for sailors to use with Google Glass</p>
				<p>
					The app was designed to replace the maintenance instruction manual. I added step-by-step photos, the functionality of taking
					photos of completed work with a time stamp to prove completion, a progress bar to indicate time until photo has been uploaded,
					a QR code scanner to automatically pull the maintenance task up on screen. I also added  compass was added to allow
					the user to indicate where they were in relation to other places.
				</p>
				<hr>
				<h4>Content Management System</h4>
				<p>Built a content management system from the ground up using PHP and MySQL as seen in the photography section of this site</p>
			</div>

			<div class="col-sm-6 col-md-5 my-bg">
				<h3 class="text-center text-shadow-small">Skills</h3>
				<div class="col-sm-6 col-md-6">
					<h4>Web Development</h4>
					<ul>
						<li>JavaScript</li>
						<li>jQuery</li>
						<li>PHP</li>
						<li>MySQL</li>
						<li>HTML5</li>
						<li>CSS</li>
						<li>WordPress</li>
						<li>Bootstrap</li>
					</ul>
				</div>
				<div class="col-sm-6 col-md-6">
					<h4>Version Control</h4>
					<ul>
						<li>Github</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
	<div class="container row-centered bg-setup pad25 padBottom50" id="portfolio">
		<h1 class="text-shadow">Portfolio</h1>
		<div class="row my-bg">
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="http://csblog.joshcruz.net">
						<img src="assets/csblog2.PNG">
						<caption>
							<button onClick="location.href = 'http://csblog.joshcruz.net'">CS Blog</button>
						</caption>
					</a>
				</div>
			</div>
			<div class="col-md-9 text-left">Wordpress with custom CSS</div>
		</div>
		<div class="row my-bg">
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="http://photography.joshcruz.net">
						<img src="assets/photography.PNG">
						<caption>
							<button onClick="location.href = 'http://photography.joshcruz.net'">Photography CMS</button>
						</caption>
					</a>
				</div>
			</div>
			<div class="col-md-9 text-left">Content Management System. Built with the WAMP (Windows, Apache, MySQL, and PHP) stack.</div>
		</div>

		<div class="row my-bg">
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="/wikiview/index.html">
						<caption>
							<img  src="assets/wiki.PNG"><button onClick="location.href = '/wikiview/index.html'">Wikipedia Search</button>
						</caption>
					</a>
				</div>
			</div>
			<div class="col-md-9 text-left">
				Built to develop javascript and AJAX skills. Searches through wikipedia for relevant articles.
			</div>
		</div>
		<div class="row my-bg">
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="/algebra/index.html">
						<caption>
							<img  src="assets/algebra.png"><button onClick="location.href = '/algebra/index.html'">Algebra Problem Solver</button>
						</caption>
					</a>
				</div>
			</div>
			<div class="col-md-9 text-left">
				Built using mainly React for updating state, Javascript for math logic, and Bootstrap for style. I used a library for calculating the math but my own
				logic to write step by step solutions for middle schoolers who are struggling to work out these problems.<br><br> <p style='color:red'>*Still in development</p>
			</div>
		</div>
		<div class="row my-bg">
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="/coffee-timer/index.html">
						<img src="/assets/coffee-timer.PNG">
						<caption>
							<button onClick="location.href = '/coffee-timer/index.html'">Coffee Timer</button>
						</caption>
					</a>
				</div>
			</div>
			<div class="col-md-9 text-left">Coffee timer that using CSS grid and Javascript. Built to keep track of time while coffee in french press steeps.</div>
		</div>
	</div>

	<div class="container pad25" id="contact">
		<h1 class="text-shadow">contact</h1>
		<div>
			<h2>josh@joshcruz.net</h2>
		</div>
	</div>
	<div id="page-footer" class="container">
		<nav class="navbar navbar-default">
			<!-- <div class="container-fluid">
				<a class="navbar-brand" href="#">Josh Cruz</a>
				<ul class="nav navbar-nav">
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#portfolio">Portfolio</a></li>
				</ul>
				<div class="navbar-copyright">Copyright <?php echo date("Y");?></div>
			</div> -->


			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbarFooter" aria-expanded="false">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">joshcruz.net</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbarFooter">
				<ul class="nav navbar-nav  navbar-right">
					<li><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#portfolio">Portfolio</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>

			</div>
<div class="navbar-copyright text-center">Copyright <?php echo date("Y");?></div>
		</nav>

	</div>
</div>
</body>
</html>
