<?php
	session_start();
	require_once("php/Session.php");
	if (isset($_SESSION['username']) && strlen($_SESSION['username']) < 2) {
		echo '<script type="text/javascript">'
			, 'window.location.replace("http://www.morethegame.com/change-username");'
			, '</script/>';
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>M.O.R.E. - Races</title>
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
			<div id="main-header"><h4>Races</h4></div>
			<div id="main-body">
				<div id="container">
					<div class="text-images">
						<img class="left" src="img/screenshoots/rac1.png" alt="screenshoot" />
						<p>In M.O.R.E., the galaxy is inhabited by no fewer than 20 alien races, each with a unique history and motivation for exploration of space. Players choosing a particular race will get acquainted with the history and current events of the race as they play the game - along with unique buildings, weapons and research opportunities. This is all embedded in an interface specially designed for each race, and atmospheric music thanks to ensure you will feel the ruler of an alien power.</p>
						<img class="right" src="img/screenshoots/rac2.png" alt="screenshoot" />
						<p>Players will meet charismatic Terrans, experts at the art of international diplomacy, the orthodox religious fanatics of the Skiteli, the honourable warriors - Brutas, beings for whom the progress of science is the greatest value in the form of the Zientzielari, and other representatives of various science fiction races. However, in our game players will also find races inhabiting the gas giants and liquid planets, collective minuscule insect races - the Myrmecians, the energy-based lifeforms known as the Stjornuri, or a totally unique race of multi-mile creatures living in space - the Hvalur.</p>
						<img class="left" src="img/screenshoots/rac3.png" alt="screenshoot" />
						<p>We will try to provide significant innovations in the gameplay without losing the spirit of what makes 4X space games great. For example it will be possible for some races with telepathic abilities to calm, or even to tame space monsters. After discovering suitable technologies it will be possible to breed some types of those giant space animals and use them in combat. Each race will also have unique research options only available to it, opening up new strategies for each game that will keep you coming back for one more turn.</p>
						<img class="right" src="img/screenshoots/rac4.png" alt="screenshoot" />
						<p>Many aspects of alien races - their culture, history, origin, religion, society, way of living and thinking will be described in our in-game Omnipedia. This will be a great source of knowledge about races, and allow players to deeply delve into their chosen race. Details like description of food they eat and the gods they believe in will take players fully into the M.O.R.E. universe.</p>
					</div>
					<h1>FIRST ENCOUNTER WITH HVALURS</h1>
					<p class="no-image">This is a transcript of the messages exchanged between Terran commercial freighter and control tower near a mining operation in the Kuiper belt following the first encounter with Hvalurs scout:</p>
					<ul>
						<li>Pilot (P): Control, this is transporter 'Sulaco' hauling cargo from mining operation on W-359. I have something unusual to report. Over.</li>
						<li>Control (C): This is Control, go ahead 'Sulaco'. Over.</li>
						<li>P: We took the scenic route along the belt to scan for new Thorium deposits and picked up this agglomerate of small asteroids that appear to be connected to each other by some sort of lines or something. Do you have any info about engineering activity in this sector, cause sure as hell we don't. Over.</li>
						<li>C: That's a negative 'Sulaco'. This sector is clear of any scheduled prospecting activities. Hold the channel open 'Sulaco' I'm going to run this by the old man. Over.
						<li>P: Holding on Central. Be advised that we are in fly-by trajectory and can have a closer look. Awaiting instructions. Over.</li>
						<li>C: 'Sulaco' you've got the olds' man attention. Continue on your approach with caution and report once you get the visual on this object. It could be some unmapped debris. Over.</li>
						<li>P: Central, we are about 500 klicks from the object and the telemetry reads that it's about 25 klicks long and 15 klicks wide with seven... no nine asteroids clumped all together. We have high-res visual coming on screen as we speak. What the f*** is this thing?</li>
						<li>C:'Sulaco' please report on the visuals, must be some loose debris. Over.</li>
						<li>P: You are not going to believe this! There some structure on surface, like domes or something, spherical, definitely not rock outcrops, way too regular... and these tethers are twisted in such a way that they can't be anything that we use here. More like... a... tree branches... but interconnected between each other. There is more! The hig-res shows that the asteroids surface has a regular micro topography! It appears to be covered with something translucent... we can see the rock beneath! This is amazing!</li>
						<li>C:'Sulaco' what's the objects trajectory? Over.</li>
						<li>P: Central. Object is moving away from the belt. Sending trajectory data now... holy f*** it's decelerating! Johnny, run a bio scan! Yes, now you moron!</li>
						<li>C:'Sulaco'?</li>
						<li>P: It's organic! The scan results are all over the place! The object is now about 45 kilcks from our position and stationary, I think we better report this to the...</li>
						<li>C: 'Sulaco' what's your status? Over.</li>
						<li>P: It started emitting light! Flashes of different frequency and across the entire spectrum! Central we are out of here! Better get the old man on the horn to the Command asap!</li>
					</ul><br />
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