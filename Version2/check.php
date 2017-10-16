<!DOCTYPE html>
<?php
	$CheckUrl=$_GET["url"];
	$apikey = "AIzaSyCOx57tye2R6KLIkpU6_QvwH1O9Xpb6WXE";
	 
	$data='{
	 "client":{"clientId": "SafeiZO","clientVersion": "1.0"},
	 "threatInfo":{
	 "threatTypes":["MALWARE", "SOCIAL_ENGINEERING"],
	 "platformTypes":["WINDOWS"],
	 "threatEntryTypes":["URL"],
	 "threatEntries":[{"url": "'.$CheckUrl.'"}]
	 }
	}';
	 
	$url_api ="https://safebrowsing.googleapis.com/v4/threatMatches:find?key=".$apikey."";
	 
	 
	function GEData($url, $post){
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", 'Content-Length: ' . strlen($post)));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result=curl_exec($ch);
		return $result;
	}
	if($CheckUrl!=null){
		$GetResult=GEData($url_api, $data);
		$str=json_decode($GetResult);
		$stats=$str->matches[0]->threatType;
		if(isset($stats)){
			/*unsafe*/
			$AlertClass = 'alert alert-dismissable alert-danger';
			$BtnClass = 'btn btn-lg btn-danger btn-block';
			$String = '<i class="fa fa-question red"></i> 這個網站可能不安全！';
		}else{
			/*safe*/
			$AlertClass = 'alert alert-success alert-dismissable';
			$BtnClass = 'btn btn-lg btn-success btn-block';
			$String = '<i class="fa fa-check green"></i> 這是安全網站，可以放心前往。';
		}
		//----- 讀取網頁源始碼
		$fp = file_get_contents($CheckUrl);  

		//----- 擷取 title 資訊
		preg_match("/<title>(.*)<\/title>/s", $fp, $match);
		$title = $match[1];

		//----- 擷取 Description 及 Keywords
		$metatag = get_meta_tags($CheckUrl);
		$description = $metatag["description"];
		$keywords = $metatag["keywords"];
	}else{
		$AlertClass = 'alert alert-dismissable alert-danger';
		$BtnClass = 'btn btn-lg btn-danger btn-block';
		$String = '<i class="fa fa-question red"></i> 沒有網站? 沒有"?url="參數';
	}
	
?>
<html lang="zh-tw">

<head>

    <meta charset="utf-8">
	<meta property="og:description" content="網頁安全檢查 技術支援Google Safe Browsing" />
	<meta property="og:title" content="網頁安全檢查" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://safe.kawai.moe/" />
	<meta property="og:image" content="https://safe.kawai.moe/imgs/logo.jpg" />
	<meta property="og:site_name" content="網頁安全檢查" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="網頁安全檢查 技術支援Google Safe Browsing">
    <meta name="author" content="">
    <title>網站安全檢查</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Page Content -->
    <div class="container">
		<div class="container-fluid">
		
			<div class="row">
				<div class="col-md-12">
					<h1>網站安全檢測</h1>
				</div>
			</div>
			
			<div class="row">
				<p></p>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="<?php echo $AlertClass;?>">
						<h4>
							<?php echo $String;?>
						</h4>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<h3>
								<?php echo $title;?>
							</h3>
							<dl>
								<dt>
									網頁簡短描述
								</dt>
								<dd>
									<?php echo $description;?>
								</dd>
								<dt>
									網頁關鍵字
								</dt>
								<dd>
									<?php echo $keywords;?>
								</dd>
							</dl>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-10">
						</div>
						<div class="col-md-2">
							<a href='<?php echo $CheckUrl;?>'><button type="button" class="<?php echo $BtnClass;?>">
								前往網站
							</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
        <!-- /.row -->
		<div class="row">
			<div class="text-right">
				網址安全性掃描是由 <img src="//www.google.com/images/malware_logo.gif" alt="google" border="0"> 安全瀏覽技術 | <a href="https://www.google.com/transparencyreport/safebrowsing/diagnostic/index.html?hl=zh-TW#url=<?php echo $CheckUrl ;?>" target="_blank">技術細節 </a>
			</div>
		</div>
	
		<div class="row">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- safe.kawai.moe -->
			<ins class="adsbygoogle"
				 style="display:block"
				 data-ad-client="ca-pub-5441808858903508"
				 data-ad-slot="9045434273"
				 data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
