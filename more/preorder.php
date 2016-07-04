<?php
	require_once("php/Session.php");
	StartSession();
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>M.O.R.E. - Pre-Order</title>
		<meta charset="UTF-8" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="description" content="M.O.R.E. - 4x space strategy game - Military, Organization, Research, Economy" />
		<meta name="keyword" content="more, game, space, strategy, military, organization, research, economy" />
		<meta name="author" content="Thomas Frost" />
		<link rel="icon" type="image/png" href="img/menu/favicon.png" />
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Orbitron:900|Armata' type='text/css' />
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css" type="text/css" />
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="css/main.min.css" type="text/css" />
	</head>
	<body>
		<header>
			<div id="cookies">
				<img class="float-right" onclick="AllowCookies" src="img/menu/exit.png" alt="exit" />
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
			<div id="socials-header">
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
							<input name="username-email" type="text" placeholder="example@more.com" /><br />
							<label for="password">Password</label><br />
							<input name="password" type="password" /><br /><br />
							<input id="login-button" class="submit-button" type="submit" value="SIGN IN" /><br /><br />
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
			<div id="main-header">Pre-Order</div>
			<div id="main-body">
				<p>Our game is created by a team of dedicated players and artists who dream about new, groundbreaking 4x space strategy. Our vision was supported by over 4,000 people in two Kickstarter campaigns and other players who supported us by pre-ordering M.O.R.E. We are independent and we want to stay this way.</p>
				<p>Because of that, we welcome any pre-orders which you can make on this site. If you want to upgrade yur game tier, buy add-ons or make a simple donation which helps us develop our game you can do so <a class="favlink" href="donate">here</a>. It is very important for our team to receive support before M.O.R.E. premieres. This is also beneficial for you, as you get discounted prices or bonuses which won't be available after the game is released.</p>
				<p>We remind you that below you can buy our game on which we are still working. It's not available yet, so you won't receive your game key instantly. Confirmation of your payment in most cases you'll receive within 48 hours. We are doing our best to deliver this game as soon as possible, but due to our priorities, which are: quality and the best gameplay and functionalities we can provide, we can't give you an exact release date yet. Our current aim is to start a multiplayer pre-alpha late fall, and if all goes well start our alpha test stage in the end of this year.</p>
				<p>Shipment costs for all box versions:<br /> - USA and Poland: free<br /> - Europe and Canada: please add $15<br /> - Other countries: please add $25<br /></p><br />
				<ul>
					<li><h3>DIGITAL</h3></li>
					<li><h3>BOX</h3></li>
				</ul>
				<ul>
					<li>
						<h2>BASIC DIGITAL</h2>
						<div class="image-container">
							<img src="img/orders/1-on.png" alt="digital download edition" />
							<img src="img/orders/11-on.png" alt="presale supporter badge" />
						</div>
						<p>Basic digital version of M.O.R.E.</p>
						<h1>$22</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="VBULDRBGQRQE6" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>
					</li>
					<li>
						<h2>BASIC BOX</h2>
						<div class="image-container">
							<img src="img/orders/8-on.png" alt="basic box edition" />
							<img src="img/orders/4-on.png" alt="pdf book" />
							<img src="img/orders/37-on.png" alt="pdf guide" />
						</div>
						<p>Basic Box version of M.O.R.E. + pdf book + Digital Strategy Guide "How to stay not eaten in space by Hvalurs"</p>
						<h1>$45</h1>
						<img src="img/preorder/nay.png" alt="not available yet" />
					</li>
				</ul>
				<ul>
					<li>
						<h2>BRONZE DIGITAL</h2>
						<div class="image-container">
							<img src="img/preorder/digital-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/2-on.png" alt="beta access" />
						</div>
						<p>Previous digital edition + beta access</p>
						<h1>$30</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="D7A8WEWPCDNML" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>							
					</li>
					<li>
						<h2>BRONZE BOX</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" style="width: 70px; height: 70px;" alt="all previous" />
							<b>+</b>
							<img src="img/orders/6-on.png" style="width: 70px; height: 70px;" alt="all future dlc" />
							<img src="img/orders/26-on.png" style="width: 70px; height: 70px;" alt="first set of visual dlc" />
							<img src="img/orders/10-on.png" style="width: 70px; height: 70px;" alt="game poster" />
							<img src="img/orders/3-on.png" style="width: 70px; height: 70px;" alt="digital soundtrack" />
							<img src="img/orders/9-on.png" style="width: 70px; height: 70px;" alt="soundtrack" />
							<img src="img/orders/21-on.png" style="width: 70px; height: 70px;" alt="book" />
							<img src="img/orders/28-on.png" style="width: 70px; height: 70px;" alt="credits" />	
							<img src="img/orders/11-on.png" style="width: 70px; height: 70px;" alt="presale supporter badge" />
						</div>
						<p>Previous box edition + many goods.</p>			
						<h1>$122</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="AZJQYC7QKTKP2" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>							
					</li>
				</ul>
				<ul>
					<li>
						<h2>SILVER DIGITAL</h2>
						<div class="image-container">
							<img src="img/preorder/digital-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/3-on.png" alt="digital soundtrack" />
							<img src="img/orders/4-on.png" alt="pdf book" />
						</div>
						<p>Previous digital edition + soundtrack + pdf book</p>
						<h1>$53</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="4SBH7KD44G3LE" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>							
					</li>
					<li>
						<h2>SILVER BOX</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/2-on.png" alt="beta access" />
							<img src="img/orders/13-on.png" alt="supporter t-shirt" />
						</div>
						<p>Previous box edition + beta access + supporter t-shirt</p>
						<h1>$177</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="TQE42TPGFCFLJ" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>
					</li>
				</ul>
				<ul>
					<li>
						<h2>SILVER 2 DIGITAL</h2>
						<div class="image-container">
							<img src="img/preorder/digital-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/6-on.png" alt="all future dlc" />
						</div>
						<p>Basic digital version of M.O.R.E. + all future DLC. This version doesn't contain beta access, soundtrack and pdf book.</p>
						<h1>$55</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="S7S2B8KZJ4F7N"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
					<li>
						<h2>GOLD BOX</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/7-on.png" alt="alpha access" />
							<img src="img/orders/20-on.png" alt="calendar" />
							<img src="img/orders/16-on.png" alt="stickers" />
						</div>
						<p>Previous box edition + aplha access + M.O.R.E. calendar + M.O.R.E. stickers</p>
						<h1>$237</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="39BMGD3TRR23W" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>															
					</li>
				</ul>
				<ul>
					<li>
						<h2>GOLD DIGITAL</h2>
						<div class="image-container">
							<img src="img/preorder/digital-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/37-on.png" alt="pdf guide" />
						</div>
						<p>All rewards from silver and silver 2 digital. (Gamekey, all future DLC, beta access, soundtrack and pdf book) + Digital Strategy Guide "How to stay not eaten by Hvalurs"</p>
						<h1>$82</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="CVX2CUKCSF6ZL" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>							
					</li>
					<li>
						<h2>PLATINUM BOX</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" style="width: 60px; height: 60px;" alt="all previous" />
							<b>+</b>
							<img src="img/orders/36-on.png" alt="lifetime idea-l-center game keys" />
							<img src="img/orders/14-on.png" style="width: 60px; height: 60px;" alt="16gb more usb flash drive" />
							<img src="img/orders/27-on.png" style="width: 60px; height: 60px;" alt="2nd visual components" />
							<img src="img/orders/17-on.png" style="width: 60px; height: 60px;" alt="mouse pad" />
						</div>
						<p>Previous box edition + lifetime idea-l-center game keys + 16GB M.O.R.E. flash drive + second set of visual components + M.O.R.E. mouse pad</p>
						<h1>$354</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="RPCAYEYHPTNB4" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>
					</li>
				</ul>
				<ul>
					<li>
						<h2>GOLD & BRONZE DIGITAL</h2>
						<div class="image-container">
							<img src="img/preorder/digital-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/26-on.png" alt="1st set of visual elements" />
							<img src="img/orders/28-on.png" alt="credits" />
						</div>
						<p>Gold digital edition + extra game/beta key + first set of visual components + gamecredits</p>
						<h1>$120</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="HFKRCJ3WMSQAC"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
					<li>
						<h2>KICKSTARTER BOX</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/15-on.png" alt="64gb more usb flash drive" />	
							<img src="img/orders/12-on.png" alt="hoodie" />
							<img src="img/orders/18-on.png" alt="colector's gamebox" />
						</div>
						<p>Previous box edition + 64GB M.O.R.E. flash drive instead of 16GB + M.O.R.E. hoody + Big additional cardboard version of gamebox</p>
						<h1>$500</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="JAF4LNTRZTTHC"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
				</ul>
				<ul>
					<li>
						<h2>PLATINUM DIGITAL</h2>
						<div class="image-container">
							<img src="img/preorder/digital-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/7-on.png" alt="lifetime idea-l-center game keys" />
							<img src="img/orders/5-on.png" alt="2nd set of visual elements" />
						</div>
						<p>Previous digital edition + alpha access + M.O.R.E. calendar</p>
						<h1>$177</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="5EK3BUQ6UXG5N" /> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online!" /> <img src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" alt="preorder" width="1" height="1" border="0" /></form>
					</li>
					<li>
						<h2>SPONSOR BOX</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/32-on.png" alt="supporter t-shirt" />
							<img src="img/orders/33-on.png" alt="hoodie" />
							<img src="img/orders/34-on.png" alt="signed more book" />
						</div>
						<p>Previous box edition + Special Edition T-shirt and Hoodie + signed hardcover M.O.R.E. game manual+ special acknowledgement in the game credits, manual and website.</p>
						<h1>$1000</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="XZ2QG43WY2MVJ"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
				</ul>
				<ul>
					<li>
						<h2>KICKSTARTER DIGITAL</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/36-on.png" alt="lifetime idea-l-center game keys" />
							<img src="img/orders/27-on.png" alt="2nd set of visual elements" />
						</div>
						<p>Previous digital edition + lifetime idea-l-center game keys + second set of visual components </p>
						<h1>$300</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="LRDC59BHDB4JU"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
					<li>
						<h2>MONSTER BOX</h2>
						<div class="image-container">
							<img src="img/preorder/physical-previous.png" alt="all previous" />
							<b>+</b>
							<img src="img/orders/35-on.png" alt="space monster" />
						</div>
						<p>Previous box edition + opportunity to work with us on the development of a space monster based on your input.</p>
						<h1>$3000</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="U486KDCERBWVG"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
				</ul>
				<ul>
					<li>
						<h2>EU AND CANADA SHIPMENT</h2>
						<div class="image-container">
							<img class="small" src="img/preorder/euna.png" alt="eu and canada shipment" />
						</div>
						<p>If you bought box edition of M.O.R.E., don't live in Poland or USA (where shipment is free) but you live in other European countries or in Canada, please add this shipment cost.</p>
						<h1>$15</h1>	
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="UASWWNDY4PHY8"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
					<li>
						<h2>OTHER COUNTRIES</h2>
						<div class="image-container">
							<img class="small" src="img/preorder/world.png" alt="other shipment" />
						</div>
						<p>If you bought box edition of M.O.R.E. and you live outside Europe, USA or Canada please add this shipment cost.</p>
						<h1>$25</h1>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="JM6N3UQQ9V56W"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="preorder" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
				</ul>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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