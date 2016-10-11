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

		<div class="row bg-setup" id="home">
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
				<h1 class="text-center text-shadow" style="margin-top:100px;">Josh Cruz</h1>
				<h1 class="text-center text-shadow">Web Developer</h1>
				<hr>
			</div>
			
			<div class="well text-shadow col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10" style="margin-bottom:200px;">
				<p>Creative and dependable Entry Level Web Developer. Impeccable work ethic and excellent dealing with unexpected changes with a positive attitude. Knowledgeable in web languages and principles of development. See challenges as opportunities to continue learning and work with new technologies. 
				</p>
	<!--       <div class="row text-center">
				    <a class="btn btn-default" href- "#" role="button">CS Blog</a>
				    <a class="btn btn-default" href- "#" role="button">Github</a>
				 	<a class="btn btn-default" href- "#" role="button">freeCodeCamp</a>
					</div>
				-->
			</div>

		</div>

		<div class="row pad25 bg-setup" id="about">
			<h2 class="text-center text-shadow-small">Development Career</h2>
			<div class="my-bg center-block">
				<p> 
					I completed an Associate's degree in computer science and developed a deep interest in theoretical concepts, but most of my working knowledge comes from independent study. I have developed a few different websites and made sure to highlight the importance of having an adaptive site.
				</p>
				<p> 
					My favorite thing about programming is creating something out of nothing and giving someone else the opportunity to us what I have developed intuitively.
				</p>
			</div>

			<div class="col-md-5 my-bg center-block" >
				<h3 class="text-center text-shadow-small">Experience</h3>
				<h4>2014: SPAWAR</h4>
				<p>A part of team that developed an Augmented Reality App for sailors to use with Google Glass</p>
				<hr>
				<h4>Content Management System</h4>
				<p>Built a content management system from the ground up using PHP and MySQL as seen in the photography section of this site</p>
			</div>


			<div class="col-md-5 my-bg center-block">
				<h3 class="text-center text-shadow-small">Skills</h3>
				<div class="col-md-6">
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
				<div class="col-md-6">
					<h4>Version Control</h4>
					<ul>
						<li>Github</li>
					</ul>
				</div>
			</div>


		</div>
		<div class="row row-centered bg-setup pad25 padBottom50" id="portfolio">
			<h1 class="text-shadow">Portfolio</h1>

			<div class="col-md-3 col-sm-4 col-xs-12 ">
				<div class="thumbnail">
				<a href="http://csblog.joshcruz.net">
					<img src="assets/csblog2.PNG">
					<caption>
						<button onClick="location.href = 'http://csblog.joshcruz.net'">joshcruz.net</button>
					</caption>
					</a>
				</div>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="thumbnail">
				<a href="http://photography.joshcruz.net">
					<img src="assets/photography.PNG">
					<caption>
						<button onClick="location.href = 'http://photography.joshcruz.net'">photography.joshcruz.net</button>
					</caption>
					</a>
				</div> 
			</div>
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="thumbnail">
				<a href="http://teamtapia.net">
				<caption>
					<img  src="assets/teamtapia.PNG"><button onClick="location.href = 'http://teamtapia.net'">teamtapia.net</button>
					</caption>
					</a>
				</div>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="thumbnail">
					<a href="http://codepen.io/josh1919/full/YqMgJm/">
					<img src="assets/twitchViewer.PNG"><button  onClick="location.href = 'http://codepen.io/josh1919/full/YqMgJm/'">Twitch Viewer</button>
					</a>
				</div>
			</div>
		</div>
		<div class="row pad25" id="contact">
			<h1 class="text-shadow">contact</h1>
			<div>
				<h2>josh@joshcruz.net</h2></div>
			</div>
			<div id="page-footer" class="row">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<a class="navbar-brand" href="#">Josh Cruz</a>
						<ul class="nav navbar-nav">
							<li>
								<a href="#home">Home</a>
							</li>
							<li>
								<a href="#about">About</a>
							</li>
							<li>
								<a href="#portfolio">Portfolio</a>
							</li>
						</ul>
						<div class="navbar-copyright">Copyright 2016</div>
					</div>
				</nav>
			</div>
		</div>
	</body>
	</html>