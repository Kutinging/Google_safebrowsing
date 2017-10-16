<?php
if($_GET['url']==null){
	header("Location: ./index.php");
}
$url = $_GET['url'];

$data = '{
  "client": {
    "clientId": "safe.kttsite.com",
    "clientVersion": "1.0"
  },
  "threatInfo": {
    "threatTypes":      ["MALWARE", "SOCIAL_ENGINEERING"],
    "platformTypes":    ["LINUX"],
    "threatEntryTypes": ["URL"],
    "threatEntries": [
      {"url": "'.$url.'"}
    ]
  }
}';


$apikey = "你的API KEY (Your API KEY)";
$url_send ="https://safebrowsing.googleapis.com/v4/threatMatches:find?key=".$apikey."";

//$str_data = json_encode($data);

function sendPostData($url, $post){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", 'Content-Length: ' . strlen($post)));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
return $result;
}

$web = sendPostData($url_send, $data);

$web2 = json_decode($web,true);

$checked = $web2['matches']['0']['threat']['url'];

if($checked!=null){
	$show="<i class=\"fa fa-bug fa-2x\" aria-hidden=\"true\" style=\"color:red;\">這很可能是危險網站，建議您勿前往此站！</i>";
}
else{
	$show="<i class=\"fa fa-check-circle-o fa-2x\" aria-hidden=\"true\" style=\"color:green;\">這是安全網站，您可以放心前往。</i>";
}
/*echo "<pre>";
var_dump($web);
echo $web;*/
?>
<?php
//----- 讀取網頁源始碼
$fp = file_get_contents($url);
//----- 擷取 title 資訊
preg_match("/<title>(.*)<\/title>/s", $fp, $match);
$title = $match[1];
$metatag = get_meta_tags($url);
$description = $metatag["description"];
$keywords = $metatag["keywords"];
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Website Safe Check - <?php echo $url;?></title>
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
					<header id="header" class="alt">
						<span class="logo"><a href="./index.php"><span class="fa fa-search fa-5x">
						</span></a></span>
						<h1>分析網站 "<?php echo $url ;?>"</h1>
						<p></p>
					</header>

				<!-- Nav -->
					<!--<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">First Section</a></li>
							<li><a href="#second">Second Section</a></li>
							<li><a href="#cta">Get Started</a></li>
						</ul>
					</nav>-->

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>分析 "<?php echo $url;?>" 結果</h2>
											<p>由 Google 提供的安全搜尋建議結果</p>
										</header>
										<p><i class="fa fa-desktop fa-2x" aria-hidden="true">  網站名稱 ：<?php echo $title?></i></p>
										<p><?php echo $description."<br/>".$keywords ;?></p>
										<p>
										<?php echo $show; ?></p>
										<!--<p><i class="fa fa-question-circle-o fa-3x" aria-hidden="true">
										未評級網站：<?php //if($unrated==null){echo "0";}else{echo $unrated ;}?></i></p>-->
										<ul class="actions">
											<li><a href="https://www.google.com/transparencyreport/safebrowsing/diagnostic/#url=<?php echo $url ;?>" target="_black" class="button">從Google safebrowsing查看更多資訊</a></li>
											<li><a href="<?php echo $url ;?>" class="button">前往此網站→</a></li>
										</ul>
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
						<p class="copyright">&copy; Website Safe Check.2016-<?php echo date('Y');?>. Design: <a href="https://html5up.net" target="_black">HTML5 UP</a>. Powered by <a href="https://www.google.com/transparencyreport/safebrowsing/diagnostic" target="_black">Google Safe Browsing</a>. Builded by <a href="http://kttsitecom" target="_black">KuTing</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>