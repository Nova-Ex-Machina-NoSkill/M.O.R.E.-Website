<?php
	session_start();
	require_once("php/Session.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>M.O.R.E. - Diplomacy</title>
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
			<div id="main-header"><h4>Diplomacy</h4></div>
			<div id="main-body">
				<div id="container">
					<div class="text-images">
						<img class="left" src="img/screenshoots/dip1.png" alt="screenshoot" />
						<p>One of the most important factors determining the quality of the game is the intelligence of your computer opponents. Therefore, to create a challenging and diverse AI is a priority for M.O.R.E. developers. Special emphasis will be on diplomacy and military alliances. As you gain hegemony in the galaxy it will become more and more difficult to expand, as other powers will often team up against you to resist your overbearing might. On the other hand if your hegemony is not yet established you may receive a proposal to collaborate against the strongest empire.</p>
						<img class="right" src="img/screenshoots/dip2.png" alt="screenshoot" />
						<p>Alliances will offer a wide range of options for cooperation. There will be trade treaties, research treaties, demilitarized zones, embargos and more. It will be possible to designate spheres of influence to avoid future tensions with your ally. All this will be conducted on graphically attractive screenshoots, presenting alien chamber rooms, without large amounts of unpleasant tables. You'll be able to see your opponents reaction, hear their voice and read a translated answer.</p>
						<img class="left" src="img/screenshoots/dip3.png" alt="screenshoot" />
						<p>In M.O.R.E. you are even able to lend your fleets to your allies for a predetermined period of time. Similarly, your allies will be able to lend fleets to you - letting you control them completely during that period. It will even be possible to lend your fleet in exchange for credits, research points or even star systems, so you can use your fleet as mercenaries. Members of a military alliance will coordinate their actions against a common enemy and your AI allies will inform you about their planned attacks, suggest targets and times of action for you, and even accept your suggestions in this matter.</p>
						<h1>EXAMPLES OF ALIEN DIPLOMATIC TALKS</h1><br />
						<img class="right" src="img/screenshoots/dip4.png" alt="screenshoot" />
						<p>This is most unfortunate considering our admiration for your people Ambassador but the Matriarch cannot see you now.<br /><br />
						There are seven members of your delegation including the cloaked advisor of yours, all within my effective range. I could 'talk' to them... intently... but I'm afraid you would need a new delegation afterwards Ambassador. Mind will always triumph over matter, remember that.</p>
						<img class="right" src="img/screenshoots/dip5.png" alt="screenshoot" />
						<p>Do not waste our time with irrelevant proposals! Turn over five billion individuals for assimilation from your home world and we will accept your proposal.<br /><br />
						You came back so soon because you are lonely. Do you long to be one of us - one with the Mechimerans?</p>
						<img class="right" src="img/screenshoots/dip6.png" alt="screenshoot" />
						<p>Impressive? Huh! I've no time for sssuch trivialitiess. You are a strange race to be impresssed ssso easily.<br /><br />
						Ambasssador, once again you bring credit to yoursself by pressenting sssuch a fair offer. I will let your sssuperiors know you undersstand the way of the warrior.</p>
						<img class="right" src="img/screenshoots/dip7.png" alt="screenshoot" />
						<p>Your recent results deserve no credit, go away and stop interrupting our procedures.<br /><br />
						I always thought we should pulverize the surface of this planet and set up mining operations. Your universities are such a waste... But my superiors disagree. Let's see if we can profit in another way.<br /><br />
						Good bye, ambassador, I can't wait for our next interaction.</p>
						<img class="left" src="img/screenshoots/dip8.png" alt="screenshoot" />
						<p>Whether your allies comply with the treaties or not will depend on many factors: your stance among the powers of the galaxy, your reputation, your allies' character and level of aggression. Some races will be xenophobic, unwilling to enter treaties with anyone. Others will be nationalistic and dislike anyone who has control over members of their race. Some will dislike certain forms of government, religion or will frown at you if you try to develop certain types of technology. Balancing your allies' likes and dislikes will be a key test for those interested in victory through diplomacy.</p>
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
		<script src="scr/main.min.js"></script>
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