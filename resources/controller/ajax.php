<?php
include '../model/db.php';
if(isset($_GET['stat'])&&$_GET['stat']==2){
	$revid=$_POST['rid'];
	$op="";
	//$s=mysqli_query($r,"select * from chat where rid='$revid' order by time limit $start,$num");
	$s=mysqli_query($r,"select * from chat where rid='$revid' order by time");
	while($e=mysqli_fetch_array($s)){
		extract($e);
		//$op.=$log_id.":".$content."<br>";
		
		/*
		
		<div class="row message-bubble"><p class="text-muted">Matt Townsen</p><p>Test message</p></div>
		
		*/
		
		$op.='<div class="row message-bubble"><p class="text-muted">'.$log_id.'</p><p>'.$content.'</p></div>';
	}
	echo $op;
}
else if(isset($_GET['stat'])&&$_GET['stat']==0){
	$ip=$_POST['content'];
	//$did=$_POST['did'];
	$uid=$_POST['uid'];
	$rid=$_POST['rid'];
	if($ip!=null){
		$time=time();
		$s=mysqli_query($r,"insert into chat (rid,log_id,content,time) values ('$rid','$uid','$ip','$time')");
	}
}
?>