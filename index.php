<html>
<head>
	<title>Online Quizzes & Discussions</title>
<meta charset = "utf-8">
<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.css">
<script src="resources/js/jquery.js"></script>
<script src="resources/js/bootstrap.js"></script>
	<link rel="stylesheet" href="resources/css/style.css" type="text/css"  />
	<link rel="stylesheet" href="resources/css/nav.css" type="text/css"  />
	<link rel="stylesheet" href="resources/css/login1.css" type="text/css"  />
	<link rel="stylesheet" href="resources/css/alert.css" type="text/css"  />
	<script src="resources/js/alert.js" type="text/javascript"></script>
	<script src="resources/js/log_tabs.js" type="text/javascript"></script>
</head>
<body>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(isset($_SESSION['user']))
	echo '<form action="dashboard" method="post" onload="sub();">
			</form>
			<script>window.onload=sub();function sub(){document.forms[0].submit();}</script>
			';
if(isset($_POST['user']))
{
	include_once("resources/controller/Controller.php");  
	$controller = new Controller();
	$status=$controller->login($_POST['user'],$_POST['pwd']); 
	if($status==1)
	{
		$_SESSION['user']=$_POST['user'];
		$_SESSION['pwd_temp']=$_POST['pwd'];
		unset($_POST['user']);
		unset($_POST['pwd']);
		echo '<form action="dashboard" method="post" onload="sub();">
			</form>
			<script>window.onload=sub();function sub(){document.forms[0].submit();}</script>
			';
	}
	else
	{
		session_destroy();
		session_start();
		$alert_message="failed";

	}
}
else if(isset($_POST['reg'])&&$_POST['reg']=="Register"){
		
	include_once("resources/controller/Controller.php");  
	$controller = new Controller();
	$reg=$controller->register(); 
}
?>
<div id="header">
Online Quizzes & Discussions
</div>
<!------------------------------------------------------------------------------->
<!---------------------------Navigation bar-------------------------------------->
<!------------------------------------------------------------------------------->
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Group XIV, CSE-C</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">Already have an account?</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> <b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="text" class="form-control" name="user" id="exampleInputEmail2" placeholder="Login ID" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" name="pwd" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="" data-toggle="modal" data-target="#myModal">Forgot the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
								 </form>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!------------------------------------------------------------------------------->
<!---------------------------Navigation bar-------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgot Password</h4>
        </div>
        <div class="modal-body">
 <form>
  <div class="form-group">
    <label for="email">Enter your Email:</label>
    <input type="email" class="form-control" name="" id="email">
  </div>
  <button type="submit" class="btn btn-default">Recover</button>
</form>
        </div>
      </div>
      
    </div>
</div>





<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<?php

/*
	if(isset($alert_message)&&$alert_message=="failed")
		echo'
		<div id="alert">
			<span id="alertclosebtn" onclick="alertclose();">x</span>  
			<strong>Invalid Login ID or Password</strong>
		</div>
		<script>
				setTimeout(function(){document.getElementById("alert").style.display="none";},4000);
		</script>
	';
	else if(isset($reg)&&$reg==1)
		echo '
		<div id="alertsuccess">
			<a id="alertclosebtn" onclick="alertsuccessclose();">x</a>  
			<strong>Registration Success!! Please enter the credentials to Login</strong>
		</div>
		<script>setTimeout(function(){document.getElementById("alertsuccess").style.display="none";},4000);</script>
	';
	else if(isset($reg)&&$reg==0)
		echo '
		
		<div id="alert">
			<span id="alertclosebtn" onclick="alertclose();">x</span>  
			<strong>Registration failed. Please enter the details properly</strong>
		</div>
		<script>
				setTimeout(function(){document.getElementById("alert").style.display="none";},4000);
				
		</script>
	';
	
	*/
?>


<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------->

<div class="container">
<div class="rows">
	<div class="col-lg-6 col-md-6">
<!------------------------------------------------------------------------------->
<!---------------------------Slide show bar-------------------------------------->
<!------------------------------------------------------------------------------->
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom:10px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="resources/images/image1.png" alt="">
    </div>

    <div class="item">
      <img src="resources/images/image2.png" alt="">
    </div>

    <div class="item">
      <img src="resources/images/image3.png" alt="">
    </div>

    <div class="item">
      <img src="resources/images/image4.png" alt="">
    </div>
	
	<div class="item">
      <img src="resources/images/image5.png" alt="">
    </div>
	
	<div class="item">
      <img src="resources/images/image6.png" alt="">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!------------------------------------------------------------------------------->
<!---------------------------Slide show bar-------------------------------------->
<!------------------------------------------------------------------------------->

	</div>
	<div class="col-lg-6 col-md-6 well" >
	

<div class="rows">
	<h4 class="text-center">Registration</h4>
 <form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Login ID:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="log_id" id="email" placeholder="Enter login id">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name" id="email" placeholder="Enter Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Email:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Password:</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="pwd1" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Confirm:</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="pwd2" id="pwd" placeholder="Re-Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="reg" value="Register" class="btn btn-default">Register</button>
    </div>
  </div>
</form>
</div>


	</div>

</div>

</div>


<!------------------------------------------------------------------------------->
<!----------------------------------body----------------------------------------->
<!------------------------------------------------------------------------------->
