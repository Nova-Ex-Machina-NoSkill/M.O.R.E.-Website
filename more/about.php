<?php
	session_start();
	require_once("php/Session.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>M.O.R.E. - About</title>
		<meta charset="UTF-8" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="M.O.R.E. - 4x space strategy game - Military, Organization, Research, Economy" />
		<meta name="keyword" content="more, game, space, strategy, military, organization, research, economy" />
		<meta name="author" content="Thomas Frost" />
		<link rel="icon" type="image/png" href="img/menu/favicon.png" />
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Orbitron:900|Armata' type='text/css' />
		<link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body>
		<header>
			<div id="cookies">
				<img class="float-right" onclick="AllowCookies()" src="img/menu/exit.png" alt="exit" />
				<p>We use cookies to enhance your experience.<br />By continuing to visit this site you agree to our use of cookies.</p>
			</div>
			<div id="logo">
				<a href="start"><img class="ToggleImageOnOff" src="img/menu/logo-off.png" alt="M.O.R.E. Logo" /></a>
			</div>
			<nav>
				<ul>
					<li><a class="ToggleSubMenuOnOff" href="game"><img id="game" class="ToggleImageOnOff" src="img/menu/game-off.png" alt="Game" /></a></li>
					<li><a class="ToggleSubMenuOnOff" href="media"><img id="media" class="ToggleImageOnOff" src="img/menu/media-off.png" alt="Media" /></a></li>
					<li><a href="preorder"><img id="preorder" class="ToggleImageOnOff" src="img/menu/preorder-off.png" alt="Preorder" /></a></li>
					<li><a href="http://www.morethegame.com/forum/"><img id="forum" class="ToggleImageOnOff" src="img/menu/forum-off.png" alt="Forum" /></a></li>
					<li><a id="contact-header" href="contact"><img id="contact-header-image" class="ToggleImageOnOff" src="img/menu/contact-off.png" alt="Contact" /></a></li>
				</ul>
			</nav>
			<div id="social-header">
				<a href="https://www.facebook.com/MoreTheGame" target="_blank"><img class="ToggleImageOnOff" src="img/social/facebook-off.png" alt="Our Facebook Page" /></a>
				<a href="https://www.twitter.com/MORE_the_game" target="_blank"><img class="ToggleImageOnOff" src="img/social/twitter-off.png" alt="Our Twitter Feed" /></a>
				<a href="https://www.youtube.com/user/IdeaLCenter" target="_blank"><img class="ToggleImageOnOff" src="img/social/youtube-off.png" alt="Our YouTube Channel" /></a>
			</div>
			<div id="login-username">
				<?php
					CheckIfUserIsLoggedAndDisplayLoginButtonOrProfileButton();
				?>
			</div>
			<div id="submenu">
				<div id="game-submenu" class="submenu">
					<div class="submenu-header">GAME</div>
					<div class="submenu-main">
						<ul>
							<li><a href="about">About M.O.R.E.</a></li>
							<li><a href="aliens">Aliens</a></li>
							<li><a href="diplomacy">Diplomacy</a></li>
							<li><a href="galaxy">Galaxy</a></li>
							<li><a href="government">Government</a></li>
							<li><a href="races">Races</a></li>
							<li><a href="science">Science</a></li>
							<li><a href="war">War</a></li>
						</ul>
					</div>
					<div class="submenu-footer"></div>
				</div>
				<div id="media-submenu" class="submenu">
					<div class="submenu-header">MEDIA</div>
					<div class="submenu-main">
						<ul>
							<li><a href="gallery">Gallery</a></li>
							<li><a href="video">Video</a></li>
						</ul>
					</div>
					<div class="submenu-footer"></div>
				</div>
				<div id="login-submenu" class="submenu">
					<div class="submenu-header">LOGIN</div>
					<div class="submenu-main">
						<form id="login-form" action="php/login_user.php" method="POST">
							<label for="username-email">Username / E-mail</label><br />
							<input id="username-email" name="username-email" type="text" placeholder="example@more.com" /><br />
							<label for="password">Password</label><br />
							<input name="password" type="password" /><br /><br />
							<input id="login-submit" class="submit-button" type="submit" value="SIGN IN" /><br /><br />
						</form>
						<?php
							CheckIfInfoIsSetAndDisplayInfoOrSpace("login-info");
						?>
						<a class="favlink" href="recover-password">Forgot password?</a><br />
						<a class="favlink" href="register">Create an account?</a><br />
					</div>
					<div class="submenu-footer"></div>
				</div>
			</div>
		</header>
		<main>
			<div id="main-header"><h4>About</h4></div>
			<div id="main-body">
				<div id="container">
					<h1>MILITARY ORGANIZATION RESEARCH ECONOMY</h1><br />
					<p>Space strategy game M.O.R.E. - Military, Organization, Research, Exploration - is a worthy successor to classic turn-based 4X games. During development, the focus has been to create a worthy heir to the best game of this genre, Master of Orion II - released in 1996. All subsequent created games have had their pros and cons; however they have disappointed many fans of space strategy, with the result that for many years the space strategy genre has been stuck in a rut. Even nowadays announced games miss freshness and important game features, which are already included in our game.</p>
					<p>M.O.R.E. will be a space strategy game combining addictive gameplay, impressive graphics and a very intuitive interface. We are basing the development of this game on several key principles. We want to create an advanced game which is easy to operate, provides entertainment of the highest quality, is highly configurable and with a unique atmosphere. To further this, we created unique interfaces, representative places, and music for each of the alien races, giving you an insight into their character and design that standardised interfaces cannot.</p>
					<p>The ambition of the M.O.R.E. Military. Organisation. Research. Economy. development team is to create a game that decidedly breaches the prevailing status quo, re-igniting the desire of thousands of players to explore and conquer the universe. Our aim is to redefine 4X genre and recreate the syndrome "Just one more turn ..."</p>
					<h1>FEATURES OF M.O.R.E.</h1><br />
					<div class="about-container">
						<h3>KEY ASSUMPTIONS OF M.O.R.E.</h3>
						<ul>
						<li>Oldschool turn-based strategy</li>
							<li>Intuitive interface</li>
							<li>Enhanced game settings</li>
						</ul>
						<ul>
							<li>Single Player mode</li>
							<li>Multiplayer mode</li>
							<li>LAN, Internet, HotSeat, PBEM</li>
						</ul>
						<ul>
							<li>WINDOWS, LINUX and MAC</li>
							<li>PL, EN, DE and others languages</li>
							<li>No DRM</li>
						</ul>
					</div>
					<div class="about-container">
						<h3>M.O.R.E. GALAXY</h3>
						<ul>
							<li>Full 3D galactic map</li>
							<li>Lack of Starlines</li>
							<li>Enhanced galaxy generation</li>
						</ul>
						<ul>
							<li>Galactic black hole</li>
							<li>Pulsars, Black holes, Wormholes</li>
							<li>Four types of nebulae.</li>
						</ul>
						<ul>
							<li>Varied size and color of the stars</li>
							<li>More than 1,000 solar systems</li>
							<li>Double and triple stellar systems</li>
						</ul>
						<ul>
							<li>Up to 10 planets in the star system</li>
							<li>80 kinds of planets</li>
							<li>Planets, moons and asteroids</li>
						</ul>
					</div>
					<div class="about-container">
						<h3>ALIENS IN M.O.R.E. UNIVERSE</h3>
						<ul>
							<li>20 different alien races</li>
							<li>Intergalactic alien race</li>
							<li>Galactic Council</li>
						</ul>
						<ul>
							<li>A separate interface for each race</li>
							<li>Music adapted for each culture</li>
							<li>Live on planets, asteroids, stars</li>
						</ul>
					</div>
					<div class="about-container">
						<h3>M.O.R.E. SPACE BATTLES</h3>
						<ul>
							<li>Turn Based (tactical) space battles</li>
							<li>Big, three-dimensional battlefield</li>
							<li>Space monsters</li>
						</ul>
						<ul>
							<li>Designing spacecraft from parts</li>
							<li>1000+ parts of spaceship elements</li>
							<li>Individual spaceships appearance</li>
						</ul>
					</div>
					<div class="about-container">
						<h3>OTHER M.O.R.E. FEATURES</h3>
						<ul>
							<li>Diversified Technology Tree</li>
							<li>Separate branch of technology</li>
							<li>More than 300 heroes / leaders</li>
						</ul>
						<ul>
							<li>Advanced artificial intelligence</li>
							<li>Animated cutscenes</li>
							<li>Over 10 hours of music</li>
						</ul>
					</div><br /><br />
					<h1>SYSTEM REQUIREMENTS</h1><br />
					<div id="requirements">
						<ul>
							<li></li>
							<li><h2>MINIMAL</h2></li>
							<li><h2>RECOMENDED</h2></li>
						</ul>
						<ul>
							<li id="os">Operating System</li>
							<li>Windows XP (latest service pack)<br />Modern 32-bit or 64-bit Linux environment<br />Mac OS X 10.7 or better</li>
							<li>Windows 7 / 8 / 8.1 /10 <br />Modern 32-bit or 64-bit Linux environment<br />Mac OS X 10.10 or better</li>
						</ul>
						<ul>
							<li id="cpu">Processor (CPU)</li>
							<li>Intel Core 2 Duo or AMD Athlon 64 X2</li>
							<li>Intel Core i5 or AMD FX Series Processor or better</li>
						</ul>
						<ul>
							<li id="gpu">Graphic Card (GPU)</li>
							<li>NVIDIA GeForce GTS250 or ATI Radeon HD4850 or better</li>
							<li>NVIDIA GeForce GTX 750 or AMD Radeon HD 7790 or better</li>
						</ul>
						<ul>
							<li>RAM MEMORY</li>
							<li>2GB</li>
							<li>8GB</li>
						</ul>
						<ul>
							<li>Hard Drive</li>
							<li class="double">30GB available HD space</li>
						</ul>
						<ul>
							<li>Optical Drive</li>
							<li class="double">DVD-ROM for box versions</li>
						</ul>
						<ul>
							<li>Display (Monitor)</li>
							<li class="double">1280x720 minimum display resolution</li>
						</ul>
						<ul>
							<li>Sound Card</li>
							<li class="double">Sound Card compatible with DirectX 9.0c</li>
						</ul>
						<ul>
							<li>Internet Connection</li>
							<li class="double">Broadband connection for updates and online gameplay/features</li>
						</ul>
					</div><br />
				</div>
			</div>
			<div id="main-footer"></div>
		</main>
		<footer>
			<div id="social-footer">
				<a href="https://www.facebook.com/MoreTheGame" target="_blank"><img class="ToggleImageOnOff" src="img/social/facebook-off.png" alt="Our Facebook Page" /></a>
				<a href="https://www.twitter.com/MORE_the_game" target="_blank"><img class="ToggleImageOnOff" src="img/social/twitter-off.png" alt="Our Twitter Feed" /></a>
				<a href="https://www.youtube.com/user/IdeaLCenter" target="_blank"><img class="ToggleImageOnOff" src="img/social/youtube-off.png" alt="Our YouTube Channel" /></a><br />
				<a id="contact-footer" href="contact"><img id="contact-footer-image" class="ToggleImageOnOff" src="img/menu/contact-off.png" alt="contact" /></a>
			</div>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="scr/main.js"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-67222169-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>