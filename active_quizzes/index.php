<html>
<head>
	<title>Online Quizzes & Discussions</title>
<meta charset = "utf-8">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.css">
	<script src="../resources/js/jquery.js" type="text/javascript"></script>
<script src="../resources/js/bootstrap.js"></script>
	<link rel="stylesheet" href="../resources/css/style.css" type="text/css"  />
	<link rel="stylesheet" href="../resources/css/nav.css" type="text/css"  />
	<link rel="stylesheet" href="../resources/css/alert.css" type="text/css"  />
	<link rel="stylesheet" href="../resources/css/quiz.css" type="text/css"  />
	<link rel="stylesheet" href="../resources/css/TimeCircles.css" type="text/css"  />
	<script src="../resources/js/TimeCircles.js" type="text/javascript"></script>
	<script src="../resources/js/quiz.js" type="text/javascript"></script>
	<script src="../resources/js/alert.js" type="text/javascript"></script>
<style>
ul.qno{
	display:block;padding:0;margin:0;
}
ul.qno li {display: block;}

ul.qno li a {
    color: black;float: left;padding:5;text-decoration: none;border-radius: 5px;width:30px;height:20px;text-align:center;
}
ul.qno li a.active {
    background-color: #97743a;color: white;border-radius: 5px;
}
ul.qno li a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body>
<div id="wrap">
<div id="header">
Online Quizzes & Discussions
</div>


<?php
	$pg=3;
	include '../resources/view/navigation.php';
	include_once("../resources/controller/Controller.php");  
	$controller = new Controller();
	$controller->invoke($pg);
	
	
?>
</div>
<footer id="foote">
    <p class="h5 text-muted" style="padding-top:0px;color:white;">&copy; Copyrights 2016-17</p>
</footer>

</body>

</html>