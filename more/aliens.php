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
		<title>M.O.R.E. - Aliens</title>
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
			<div id="ameslarians" class="race">
				<img src="img/aliens/ameslarians.png" alt="ameslarians" />
				<h1>AMESLARIANS</h1>
				<p>Ameslarians are a mysterious race with strong telepathic abilities. Members of this race have a natural telepathic ability to project thoughts, and thereby control others.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Solid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Democracy</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Telepathic</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>1.60m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>140 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Telepathy</p>
					</li>
				</ul>
			</div>
			<div id="arranos" class="race">
				<img src="img/aliens/arranos.png" alt="arranos" />
				<h1>ARRANOS</h1>
				<p>Arranos are one of the oldest sentient races in the galaxy. Thousands of years ago they were able to travel in space - and visited a number of planets and civilisations. Unfortunately, the Great War almost completely wiped out their entire civilisation, along with their many scientific achievements. Currently the Arranos are rediscovering their lost scientific achievements and rebuilding their shattered civilisation.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Solid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Democracy</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Remnants of ancient Galactic Power</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>3.00m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>300 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Ultrasound</p>
					</li>
				</ul>
			</div>
			<div id="brutas" class="race">
				<img src="img/aliens/brutas.png" alt="brutas" />
			<h1>BRUTAS</h1>
				<p>Brutas are an extremely belligerent race . Above all they appreciate physicality, the cult of the body and strength. Almost all disputes they resolve by fighting and they attach great importance to honour and family. Now united under one ruler, they face the stars in search of worthy opponents capable of facing them.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Solid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Feudalism</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Honourable Warriors</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>2.80m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>80 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="felidians" class="race">
			<img src="img/aliens/felidians.png" alt="felidians" />
				<h1>FELIDIANS</h1>
				<p>Felidians are a race which loves indulging in intrigue, conspiracies and plotting, and they regularly exploit others to achieve their own goals. They love to promise and beguile, portraying themselves as weak, incompetent and stupid - although the truth is very different. Felidians have - surprisingly, given their small stature - high strength and resistance to injury.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Tectonic planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Feudalism</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Subterfuge</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>0.70m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>70 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="hvalurs" class="race">
				<img src="img/aliens/hvalurs.png" alt="hvalurs" />
				<h1>HVALURS</h1>
				<p>Hvalurs live in open space. Born in the vacuum of space, they are naturally at home in asteroid belts. Adult hvalur are typically 20km in length, feeding on the minerals they find in the asteroids on which they attach themselves.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Asteroids</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Democracy</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Living in space</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>20 000 m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>40 000 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Bioluminescence</p>
					</li>
				</ul>
			</div>
			<div id="lithodoros" class="race">
				<img src="img/aliens/lithodoros.png" alt="lithodoros" />
				<h1>LITHODOROS</h1>
				<p>Lithodoros are a crystalline lifeform that despises all biological life, considering it to be "unclean". They communicate by generating brief pulses of light: patterns of these lights thus form words. These light pulses are normally shades of blue, although their sensitivity and the range of wavelengths they can detect is incredible.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Solid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Unification</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Energy absorption</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>4.00m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>20 000 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Photovoltaic</p>
					</li>
				</ul>
			</div>
			<div id="maa-ar" class="race">
	<img src="img/aliens/maa-ar.png" alt="maa-ar" />
				<h1>MAA-AR</h1>
				<p>Resembling nightmarish centipedes, the subterranean Maa-Ar'ans are almost unique in deriving most of their energy from their environment - typically hot underground rocks or lava flows. The Maa-Ar�ans are capable of hibernating for up to a thousand years. Sleeping through advertisity proved to be a useful survival skill on an unstable world. Protected by thick armor they are an extremely robust species that can even survive prolonged exposure to the vacuum of space.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Solid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Feudalism</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Subterranean</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>1.20m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>280 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="mechimeran" class="race">
			<img src="img/aliens/mechimeran.png" alt="mechimeran" />
				<h1>MECHIMERAN</h1>
				<p>This race of cyborgs is linked together into a single gestalt consciousness and directly controlled by a sentient artificial intelligence. The Mechimeran supplement their mechanical parts with biological components forcibly harvested from captured individuals. It is this merciless pursuit of intelligent biological life forms as a source for components and technology that makes them very aggressive towards other species.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Solid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Dictatorship</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Cyborgs</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>2.50m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>1 000 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Wireless Data Transfer</p>
					</li>
				</ul>
			</div>
			<div id="myrmecians" class="race">
				<img src="img/aliens/myrmecians.png" alt="myrmecians" />
				<h1>MYRMECIANS</h1>
				<p>Myrmecian civilisation is composed of two different species - the nigh-immortal, kilometre-sized gelatinous Myrms, and their inch-long Myrmecian servants.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Solid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Unification</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Caste society</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>0.02m // 2 000m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>Myrmecian - 3 years<br />Myrms - Immortal</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Chemical</p>
					</li>
				</ul>
			</div>
			<div id="nosnarians" class="race">
			<img src="img/aliens/nosnarians.png" alt="nosnarians" />
				<h1>NOSNARIANS</h1>
				<p>The Nosnarians are a race that craves knowledge - everything from the laws of physics to what their neighbours had for breakfast. They are adept at all forms of information handling and espionage, with an innate knack for finding useful nuggets of information and a level of paranoia that makes them masters of cryptography and secure information storage.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Tectonic planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Feudalism</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Espionage</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>1.40m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>60 years corporeal<br />500 years spiritual</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="olagarroans" class="race">
				<img src="img/aliens/olagarroans.png" alt="olagarroans" />
				<h1>OLAGARROANS</h1>
				<p>Olagarroans inhabit the depths of aquatic planets, and are often known as crazy, scatter-brained artists. Their species is made up of three genders, and their multiple heads each contain lesser personalities subordinated (most of the time) to their main head. These heads regularly chat amongst themselves - perhaps because of this, Olagarroans are also known as being a very cheerful species, ready to celebrate anything at the drop of a hat.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Liquid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Dictatorship</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Aquatic</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>10.0m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>170 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language<br />Bioluminesence</p>
					</li>
				</ul>
			</div>
			<div id="proteans" class="race">
				<img src="img/aliens/proteans.png" alt="proteans" />
				<h1>PROTEANS</h1>
				<p>The Proteans are a race of large shapeshifters, normally resembling something akin to a three-tiered wedding cake. Experts at genetics, everything they build is made out of the biogel they grow and form into shapes. This biogel is also easily altered, allowing the proteans to alter its physical and chemical properties with little effort.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Liquid planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Unification</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Shapeshifters</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>3.00m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>7 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language<br />Chemical</p>
					</li>
				</ul>
			</div>
			<div id="raefillis" class="race">
				<img src="img/aliens/raefillis.png" alt="raefillis" />
				<h1>RAEFILLIS</h1>
				<p>Raefillis inhabit gas giants, a fact which has made them ill-suited to the rigours of space travel, which they normally hibernate through. Communication between individuals is done by through clouds of pheromones. During adolescence, Raefillis repeatedly undergo metamorphosis in delicate cocoons, before finally emerging as fully grown adults.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Gas planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Dictatorship</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Living on gas planets</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>8.00m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>40 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Chemical</p>
					</li>
				</ul>
			</div>
			<div id="skiteli" class="race">
				<img src="img/aliens/skiteli.png" alt="skiteli" />
				<h1>SKITELI</h1>
				<p>This race of humanoids is extremely religious, wholly dedicated to their pantheon of gods. The vast majority of the population have for millennia suffered from a rapidly mutating plague called the Ugluuk. Determined to seek salvation for themselves through holy war, the Skiteli are determined to convert the galaxy to the one true faith.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Tectonic planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Feudalism</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Religious Zealots</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>1.60m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>30 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="skribdis" class="race">
				<img src="img/aliens/skribdis.png" alt="skribdis" />
				<h1>SKRIBDIS</h1>
				<p>An extremely aggressive species, the Skribdis clawed their way out of the steamy jungles of their homeworld only recently, and as a result still believe firmly that only the strongest have any right to survive. They are easily provoked, and prefer to resolve most of their disputes with brute force. A fragile peace is enforced by their ruthless authorities, and they now seek to establish a future amongst the stars with their lightning fast attacks and natural affinity for raiding tactics.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Tectonic planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Dictatorship</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Aggression</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>2.50m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>70 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="stjornurians" class="race">
				<img src="img/aliens/stjornurians.png" alt="stjornurians" />
				<h1>STJORNURIANS</h1>
				<p>These energy beings live in the coronas of stars, and are one of the only known non-mechanical species that is functionally immortal. With no need for food or air, they derive everything they need directly from the star - including the raw materials needed to build an interstellar civilisation.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Star</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Unification</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Energy being</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>50.00m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>Immortal</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Controlled plasma arcs</p>
					</li>
				</ul>
			</div>
			<div id="terrans" class="race">
				<img src="img/aliens/terrans.png" alt="terrans" />
				<h1>TERRANS</h1>
				<p>The galaxy's foremost diplomats thanks to millennia of internal conflicts, Terrans are adept at finding solutions that all sides find agreeable - be it in business or interstellar politics. In difficult times, they possess an extraordinary ability to unite to achieve a single goal.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Tectonic planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Democracy</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Charismatic</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>1.80m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>100 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="ubarros" class="race">
				<img src="img/aliens/ubarros.png" alt="ubarros" />
				<h1>UBARROS</h1>
				<p>For the Ubarros, money is life. Excellent traders and merchants, the Ubarros are driven by an almost irresistible urge to preen themselves in public - and that means money. Whilst their social status is indicated by the various rings worn on their limbs, this hierarchical species has evolved thousands of other subtle indicators of wealth and status - not to mention a fine appreciation for poisons and the occasional, timely assassination.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Tectonic planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Dictatorship</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Finance</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>1.50m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>50 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Audible language</p>
					</li>
				</ul>
			</div>
			<div id="velmenese" class="race">
				<img src="img/aliens/velmenese.png" alt="velmenese" />
				<h1>VELMENESE</h1>
				<p>These robots are known for being particularly tough customers - not because the various bodies they inhabit are particularly tough, but because every Velmene is regularly backed up - in the event of "body loss", the unlucky Velmene is simply restored from the most recent backup.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Space</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Unification</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Robotic</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>1.70m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>Immortal</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Wireless Data Transfer</p>
					</li>
				</ul>
			</div>
			<div id="zientzielari" class="race">
				<img src="img/aliens/zientzielari.png" alt="zientzielari" />
				<h1>ZIENTZIELARI</h1>
				<p>This naturally peaceful race considers scientific success the pinnacle of achievement. For them, both individual and social progress inevitably means scientific progress. Hailing from a wet, swampy homeworld, they consider space as both the ideal laboratory and treasure trove of knowledge.</p>
				<ul>
					<li>
						<h2>Homeworld:</h2>
						<p>Tectonic planet</p>
					</li>
					<li>
						<h2>Government:</h2>
						<p>Democracy</p>
					</li>
					<li>
						<h2>Main attribute:</h2>
						<p>Scientific</p>
					</li>
					<li>
						<h2>Average height:</h2>
						<p>0.80m</p>
					</li>
					<li>
						<h2>Average life:</h2>
						<p>150 years</p>
					</li>
					<li>
						<h2>Communication:</h2>
						<p>Bioluminescence</p>
					</li>
				</ul>
			</div>
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