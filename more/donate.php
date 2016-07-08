<?php
	session_start();
	require_once("php/Session.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>M.O.R.E. - Donate</title>
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
			<div id="main-header"><h4>Donate</h4></div>
			<div id="main-body">
				<div id="container">
					<h1>Kickstarter</h1>
					<p>Our game is created thanks to the support of people who want to get a next generation of 4X space strategy game. We've already conducted two Kickstarter campaigns and with pre-orders, already gathered over 4,000 people who believe in our vision.</p>
					<p>We are small indie team, but we don't want to create "just another 4x game" like others already created or announced. We also don't want to create "some indie game", with poor graphics and little content. Our aim is to create a successor which will make earthquake, set new standards and conquer the 4X space strategy throne. Most of all, we want to stay independent, because only then can we create a game we want.</p>
					<p>You can pre-order our game <a class="favlink" href="preorder">here</a>. By using this site you can upgrade your tier, buy add-ons or make simple donations. We appreciate any payment you can make. All those funds go to hardware and software purchases, paying our bills, and living costs.</p>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="donate-button"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" /> <br /><input id="donate-center" type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal - The safer, easier way to pay online!" /></form><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"></form><br /><br />
					<h2>ADD-ONS</h2>
					<p>If you already are a backer from our previous Kickstarter, pre-order our game through our website, or just want to support us in an even greater way, you may be interested in these add-ons:</p><br />
					<img class="right" src="img/donate/digital.png" alt="digital version" />
					<p>$3 - three random M.O.R.E. stickers</p>
					<p>$5 - Create names for 3 star systems. If you are a supporter from our first Kickstarter campaign, this reward was included in the $5 tier and above. This add-on you can buy multiple times.</p>
					<p>$5 - Digital Strategy Guide "How to stay not eaten in space by Hvalurs" (included in Digital Gold Version and above)</p>
					<p>$10 - Create a default ship class name for your chosen race. This name will be the default name for an alien race spaceship class, so computer named spaceships will have this designation. This add-on you can buy multiple times.</p>
					<p>$10 - BETA access add-on. Included in all rewards from $30 except Digital Silver v.2 and Physical Bronze.</p>
					<p>$10 - PDF gamebook add-on. (for example you might be interested in it, when you are Silver v.2 backer)</p>
					<p>$10 - Digital soundtrack. (for example you might be interested in it, when you are Silver v.2 backer)</p>
					<p>$10 -set of M.O.R.E. stickers (included in Gold physical tier and above)</p>
					<p>$15 - M.O.R.E. mouse pad (included in Platinium physical tier and above)</p>
					<p>$30 - PDF version of the M.O.R.E. large calendar (included in Platinium digital tier, Gold physical tier and above. )</p>
					<p>$30 - Big additional cardboard version of gamebox + little surprise (included in Kickstarter physical tier and above)</p>
					<p>$30 - Signed hardcover version of the M.O.R.E. game-book (included in Sponsor physical tier and above)</p>
					<p>$35 - M.O.R.E. t-shirt. (included in Silver physical tier and above)</p><br />
					<img class="right" src="img/donate/physical.png" alt="physical version" />
					<p>$40 - Bonus spaceship design elements (set 1). To order this add-on, you have to be at least a bronze digital level supporter. If you are a supporter from our first Kickstarter campaign, this reward was included in the $70 tier and above.</p>
					<p>$40 - Help name one of our pieces of music included in the game. Limited to 40.</p>
					<p>$50 - Choose name for a leader in our game and we will create a leader story based on your input..To order this add-on, you have to be at least a bronze digital level supporter. If you are a supporter from our first Kickstarter campaign, this reward was included in the $300 tier and above.</p>
					<p>$80 - Choose a phrase to become one of our in-game cheats.</p>
					<p>$100 - 16GB MORE-version of flash drive USB 3.0</p>
					<p>$110 - M.O.R.E. hoodie (included in Kickstarter physical tier and above)</p>
					<p>$120 - Bonus spaceship design elements (set 2). To order this add-on, you have to be at least a gold digital level supporter. If you are a supporter from our first Kickstarter campaign, this reward was included in the $300 tier and above.</p>
					<p>$150 - We will create an image and story of a superior leader based on your input. This leader will be one that brings valuable technology, a splinter colony, or a powerful spaceship to whichever race he joins. To order this add-on, you have to be at least a gold digital level supporter. If you are a supporter from our first Kickstarter campaign, this reward was included in the $500 tier and above.</p>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="donate-button"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" /> <br /><input id="donate-center" type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal - The safer, easier way to pay online!" /></form><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"></form>
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