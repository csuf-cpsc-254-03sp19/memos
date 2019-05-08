<?php 
error_reporting (E_ALL ^ E_NOTICE);
if (isset($_SESSION['name'])){
		$id   = $_SESSION['id'];
		$name = $_SESSION['name'];
		$rankid = $_SESSION['rankid'];
		$code = $_SESSION['code'];
		$active = $_SESSION['active'];
		$agency = $_SESSION['agencyname'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">

    <link href="css/metro-bootstrap-night.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">

    <link rel="stylesheet" href="fancybox/jquery.fancybox-night.css" />

    <!-- Load JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="fancybox/jquery.fancybox.pack.js"></script>
    
    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>
    <script src="js/metro/metro-button-set.js"></script>

    <title>Memo Management</title>
    
    <link rel="Shortcut Icon" href="/favicon.ico">
    
</head>
<body class='metro'>
<nav class='navigation-bar'>	
<nav class='navigation-bar-content container'>
		<a class='element'>$agency Memos</a>
		
		<item class='element-divider'></item>
		
		<a class='element1 pull-menu' href='#'></a>
		<ul class='element-menu'>
			<li>
				<a href='memos.php' class='element'>Home</a>
			</li>	
			<li>
				<a href='memos-manage.php' class='element'>Manage</a>
			</li>
		</ul>
		
		<a href='logout.php' class='element place-right'>Logout</a>

	
</ul>
</nav>
</nav> 
</div>
<div class="grid-fluid">

		
