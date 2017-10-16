<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Website Safe Check</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<section id="into" class="main">
					<header id="header" class="alt">
						<span class="logo"><a href="./index.php"><span class="fa fa-search fa-5x">
						</span></a></span>
						<h1>Website Safe Check</h1>
						<p>這是一項免費服務，檢查網站是否安全。Powered by <a href="https://www.google.com/transparencyreport/safebrowsing/diagnostic" target="_black" >Google Safe Browsing</a>.</p>
						<form method="get" action="url.php" name=form>
						<input type=text name=url  value="http://kttsite.com" 
					onFocus="if (this.value=='http://kttsite.com') 
					{this.value=''}" 
					onBlur="if(this.value=='')this.value='http://kttsite.com'"
					onclick="select();"/><br/>
						<button type="submit" onclick="layer.load(2, {shade: false});" class="button" value="掃描">掃描</button>
						</form>
					</header>
				</section>
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#into" class="active">輸入網址</a></li>
							<li><a href="#intro">這是什麼？</a></li>
							<li><a href="#first">如何運作？</a></li>
							<li><a href="#else">其他網頁</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>這是什麼？</h2>
										</header>
										<p>這是一個免費服務，供所有使用者對網站進行分析及掃瞄判斷其是否為有害網站，技術提供Google Safe Browsing。</p>
										<p>我們也提供多個軟體掃描分析之服務，<a href="./VirusTotal.php">點此前往</a></p>
									</div>
									<span class="image"><img src="images/2.jpg" alt="" /></span>
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special">
								<div class="spotlight">
								<span class="image"><img src="images/3.jpg" alt="" /></span>
									<div class="content">
									<header class="major">
										<h2>如何運作？</h2>
									</header>
										<p>只要貼上網址，按下 "掃描" 並稍等一會兒即可查看網站是否安全！</p>
									</div>
								</div>
							</section>
							
							<section id="else" class="main special">
								<div class="spotlight">
									<div class="content">
									<header class="major">
										<h2>其他網頁</h2>
										<p>View all websites builded by KuTing.</p>
									</header>
										<button class="button" onclick="window.open('http://kttsite.com')">丁丁的亂寫空間</button>
										<button class="button" onclick="window.open('http://myip.kttsite.com')">我的IP Myip</button>
										<button class="button" onclick="window.open('http://osu.kttsite.com')">Osu!譜面鏡像下載</button>
										<button class="button" onclick="window.open('http://ttvpn.kttsite.com')">TTVPN 日本VPN服務</button>
										<button class="button" onclick="window.open('http://google.kttsite.com')">Google 內嵌連結轉換器</button>
									</div>
								</div>
							</section>
					</div>

				<!-- Footer -->
					<footer id="footer">
					<section>
					</section>
						<section>
							<ul class="icons">
								<li><a href="https://twitter.com/kuting304" target="_black" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="https://www.facebook.com/yykkold55tw" target="_black" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
								<li><a href="https://github.com/Kutinging/" target="_black" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
							</ul>
						</section>
						<section>
					</section>
						<p class="copyright">&copy; Website Safe Check. 2016-<?php echo date('Y');?>. Design: <a href="https://html5up.net" target="_black">HTML5 UP</a>. Powered by <a href="https://www.google.com/transparencyreport/safebrowsing/diagnostic" target="_black">Google Safe Browsing</a>. Builded by <a href="http://kttsitecom" target="_black">KuTing</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery-2.1.1.min.js"></script>
			<script src="assets/js/layer.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>