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
		<title>M.O.R.E. - Government</title>
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
			<div id="main-header"><h4>Government</h4></div>
			<div id="main-body">
				<div id="container">
					<div class="text-images">
						<img class="left" src="img/screenshoots/gov1.png" alt="screenshot" />
						<p>Management of your vast empire will be possible through an innovative approach unseen in other games of the genre. We will not rely on the automation of processes, which in time reduces gameplay to merely clicking the next turn button. Instead you will be able to discover and develop technologies assisting in management. As your empire grows and science progresses, you will be able to create building queues, and merge colonies of one star system into a super-colony called a Dyson Sphere. After further expansions and scientific developments, it will become possible even for these super-colonies (if they are close to each other) to be merged into clusters managed as one entity. Such clusters will have enormous industrial and scientific potential and will ensure that, no matter the scale of the game you're playing, every turn presents you with something to do without becoming bogged down in micromanagement.</p><br />
						<img class="right" src="img/screenshoots/gov2.png" alt="screenshot" />
						<p>M.O.R.E. will also pay special attention to such gaming aspects as mineral extraction, food transportation, raw materials, and people. It will contain leaders of the colonies, ship captains, spy masters, diplomats and scientists who will all have a significant impact on the course of the game, bringing into it their own stories, motivation and problems.</p><br />
					</div>
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