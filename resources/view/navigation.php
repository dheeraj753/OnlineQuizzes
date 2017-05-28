<?php
	include_once("../resources/controller/Controller.php");  
	$controller = new Controller();
	$controller->log_status($pg);

?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<li <?php if($pg==1) echo 'class="active"'; ?> ><a href="../dashboard">Dashboard</a></li>
<li <?php if($pg==2) echo 'class="active"'; ?> ><a href="../discussions">Discussions</a></li>
<li <?php if($pg==3) echo 'class="active"'; ?> ><a href="../active_quizzes">Active Quizzes</a></li>
<li <?php if($pg==4) echo 'class="active"'; ?> ><a href="../review_a_quiz">Review a Quiz</a></li>
<li <?php if($pg==5) echo 'class="active"'; ?> ><a href="../host_a_quiz">Host a Quiz</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../profile"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['user']; ?></a></li>
        <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>