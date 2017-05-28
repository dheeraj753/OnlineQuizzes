<?php
if(isset($pg)){
	include_once("../resources/model/Data.php");
	include_once("../resources/model/discData.php");
	include_once("../resources/model/quizData.php");
	include_once("../resources/model/actQuizData.php");
	include_once("../resources/model/rankData.php");
}
else{
	include_once("resources/model/Data.php");
}
class Model{
	
	public function login($id,$pass)
	{
		include "resources/model/db.php";
		$s=mysqli_query($r,"select * from login where log_id COLLATE Latin1_General_CS ='".$id."' and pwd COLLATE Latin1_General_CS ='".$pass."'");
		if(mysqli_num_rows($s)!=0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function user_details($log_id)
	{
		include "../resources/model/db.php";
		$s=mysqli_query($r,"select uid from login where log_id COLLATE Latin1_General_CS ='".$log_id."'");
		$e=mysqli_fetch_array($s);
		extract($e);
		return $uid;
	}
	public function register()
	{
		include "resources/model/db.php";
		$log_id=$_POST['log_id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pwd1=$_POST['pwd1'];
		$pwd2=$_POST['pwd2'];
		if($pwd1==$pwd2&&($pwd1!="")){
			$s=mysqli_query($r,"insert into login (log_id,pwd,name,email,status) values ('$log_id','$pwd1','$name','$email',1)");
		}
		else{
			return 0;
		}
		if($s)
			return 1;
		else
			return 0;
	}
	public function fin_quiz($qid)
	{
		include "../resources/model/db.php";
		$s=mysqli_query($r,"update quizzes set status=0 where qid='$qid'");
	}
	public function dashboard()
	{
		$userid=$this->user_details($_SESSION['user']);
		include "../resources/model/db.php";
		$c=0;$sc=0;$tot=0;$resArr=array();$resArr[0]=0;$resArr[1]=0;$resArr[2]=0;$resArr[3]=0;
		$s1=mysqli_query($r,"SELECT COUNT(*) as total FROM disc WHERE uid='$userid'");
		if($s1){
			$e=mysqli_fetch_array($s1);
			extract($e);
			$resArr[0]=$e['total'];
		}
		$s1=mysqli_query($r,"SELECT COUNT(*) as total FROM quizzes WHERE uid='$userid'");
		if($s1){
			$e=mysqli_fetch_array($s1);
			extract($e);
			$resArr[1]=$e['total'];
		}
		$s1=mysqli_query($r,"SELECT * FROM stats WHERE uid='$userid'");
		while($e=mysqli_fetch_array($s1)){
			extract($e);
			$s2=mysqli_query($r,"select count from quizzes where qid='$qid'");
			$e2=mysqli_fetch_array($s2);
			extract($e2);
			$sc+=$score;$tot+=$count;$c++;
		}
		$resArr[2]=$c;$resArr[3]=$sc;$resArr[4]=$tot;
		return $resArr;
	}
	public function active_quizzes()
	{
		$userid=$this->user_details($_SESSION['user']);
		$resArr=array();$resArr=null;
		include "../resources/model/db.php";
		$s=mysqli_query($r,"select * from quizzes where status=1 and uid='$userid'");
		while($e=mysqli_fetch_array($s)){
			extract($e);
			$resArr[$qid]=new quizData($qid,$uid,$title);
		}
		return $resArr;
	}
	public function discussion()
	{
		$title=$_GET['new_topic'];
		include "../resources/model/db.php";
		$userid=$this->user_details($_SESSION['user']);
		$rid=time();
		$s=mysqli_query($r,"insert into disc (uid,topic,rid) values ('$userid','$title','$rid')");
	}
	public function res_list($pg,$page,$n)
	{
		if($pg==2){
			$table="disc";
			$ord="did";
		}
		else if($pg==3){
			$table="quizzes";
			$ord="qid";
		}
		else if($pg==4){
			$table="quizzes";
			$ord="qid";
		}
		include "../resources/model/db.php";
		$resArr=array();
		if($pg==2)
			$s=mysqli_query($r,'select * from '.$table.' order by '.$ord.' desc limit '.(($page-1)*10).',10');
		else if($pg==3){
			$userid=$this->user_details($_SESSION['user']);
			$s=mysqli_query($r,'select * from '.$table.' where status=1 order by '.$ord.' desc limit '.(($page-1)*10).',10');
			while($e=mysqli_fetch_array($s)){
				extract($e);
				$s1=mysqli_query($r,"select name from login where uid=$uid");
				$e1=mysqli_fetch_array($s1);
				extract($e1);
				$s2=mysqli_query($r,"select * from stats where qid='$qid' and uid='$userid'");
				if(!mysqli_fetch_array($s2)){
					$resArr[$qid]=new quizData($qid,$name,$title);
				}
			}
			return $resArr;
		}
		else if($pg==4)
			$s=mysqli_query($r,'select * from '.$table.' where status=0 order by '.$ord.' desc limit '.(($page-1)*10).',10');
		if($s)
		while($e=mysqli_fetch_array($s)){
			extract($e);
			$s1=mysqli_query($r,"select name from login where uid=$uid");
			$e1=mysqli_fetch_array($s1);
			extract($e1);
			if($pg==2)
				$resArr[$did]=new discData($did,$name,$topic,$rid);
			else if($pg==3||$pg==4)
				$resArr[$qid]=new quizData($qid,$name,$title);
		}
		return $resArr;
	}
	public function results_count($table,$pg){
		include '../resources/model/db.php';
		$n=mysqli_query($r,'SELECT COUNT(*) as total FROM '.$table.'');
		if($pg==3){
			$c=0;
			$userid=$this->user_details($_SESSION['user']);
			$n=mysqli_query($r,'SELECT qid FROM '.$table.' WHERE status=1');
			while($e=mysqli_fetch_array($n)){
				extract($e);
				$s2=mysqli_query($r,"select * from status where qid='$qid' and uid='$userid'");
				if(!$s2) $c++;
			}
			return $c;
		}
		if($pg==4)
			$n=mysqli_query($r,'SELECT COUNT(*) as total FROM '.$table.' WHERE status=0');
		if($n){
			$s=mysqli_fetch_array($n);
			extract($s);
			return $s['total'];
		}
		else return null;
	}
	public function quiz_upl()
	{
		include '../resources/model/db.php';
		$n=$_POST['num_ques'];
		$title=$_POST['title'];
		$time=$_POST['duration'];
		$uid=$this->user_details($_SESSION['user']);
		$s=mysqli_query($r,"insert into quizzes (title,uid,count,status,time) values ('$title','$uid','$n','1','$time')");
		if($s){
			$qid=mysqli_insert_id($r);
		}
		else{
			return 0;
		}
		for($i=0;$i<$n;$i++){
			$qno=($i+1);
			$ques=$_POST['q'.($i+1).'0'];
			$op1=$_POST['q'.($i+1).'1'];
			$op2=$_POST['q'.($i+1).'2'];
			if(isset($_POST['q'.($i+1).'3'])) $op3=$_POST['q'.($i+1).'3']; else $op3="";
			if(isset($_POST['q'.($i+1).'4'])) $op4=$_POST['q'.($i+1).'4']; else $op4="";
			if(isset($_POST['q'.($i+1).'5'])) $op5=$_POST['q'.($i+1).'5']; else $op5="";
			if(isset($_POST['q'.($i+1).'6'])) $op6=$_POST['q'.($i+1).'6']; else $op6="";
			$ans=$_POST[''.($i+1).''];
			$rid=time()+$i;
			$s1=mysqli_query($r,"insert into ques (qid,qno,ques,op1,op2,op3,op4,op5,op6,ans,rid) values ('$qid','$qno','$ques','$op1','$op2','$op3','$op4','$op5','$op6','$ans','$rid')");
		}
		return 1;
	}
	public function start_quiz($qid,$c)
	{
		$resArr=array();
		include '../resources/model/db.php';
		if($c==0){
			$s=mysqli_query($r,"select * from quizzes where qid=".$qid."");
			if($e=mysqli_fetch_array($s)){
				extract($e);
				$resArr[0]=$title;//count,time
				$resArr[1]=$count;
				$resArr[2]=$time;
			}
			return $resArr;
		}
		else{
			$s1=mysqli_query($r,"select * from ques where qid=".$qid."");
			while($e1=mysqli_fetch_array($s1)){
				extract($e1);
				$resArr[$qno]=new actQuizData($qno,$ques,$op1,$op2,$op3,$op4,$op5,$op6,$ans);
			}
		}
		return $resArr;
	}
	public function post_quiz()
	{
		$n=$_SESSION['qcount'];$qid=$_SESSION['qid'];
		//unset($_SESSION['qcount']);unset($_SESSION['qid']);
		$ans=array();
		$ans=explode("/-/",$_SESSION['ans']);
		//unset($_SESSION['ans']);
		$c=count($ans);
		$score=0;
		for($i=1;$i<=$n;$i++){
			if(isset($_POST['q'.$i])&&($ans[$i-1]==$_POST['q'.$i])){
				$score+=1;
			}
		}
		if(isset($_POST['rem_time']))
			$_SESSION['rem_time']=$_POST['rem_time'];
		if(isset($_SESSION['rem_time']))
			$bonus=$_SESSION['rem_time'];
		else $bonus=0;
		include '../resources/model/db.php';
		$uid=$this->user_details($_SESSION['user']);
		$s=mysqli_query($r,"insert into stats (uid,qid,score,bonus) values ('$uid','$qid','$score','$bonus')");
	}
	public function dchat($id)
	{
		include '../resources/model/db.php';
		$s1=mysqli_query($r,"select rid from disc where did='$id'");
		$e1=mysqli_fetch_array($s1);
		extract($e1);
		return $rid;
	}
	public function rev_qlist($qid)
	{
		$resArr=array();$i=0;
		include '../resources/model/db.php';
		$s1=mysqli_query($r,"select * from ques where qid='$qid' order by qno");
		while($e1=mysqli_fetch_array($s1)){
			extract($e1);
			$resArr[$i]=$ques;$i++;
		}
		return $resArr;
	}
	public function rev_rank($qid)
	{
		$resArr=array();
		include '../resources/model/db.php';
		$s=mysqli_query($r,"select * from stats where qid='$qid' order by score desc,bonus desc");
		while($e=mysqli_fetch_array($s)){
			extract($e);
			$s1=mysqli_query($r,"select * from login where uid='$uid'");
			$e1=mysqli_fetch_array($s1);
			extract($e1);
			$resArr[$uid]=new rankData($uid,$name,$score);
		}
		return $resArr;
	}
	public function rev_disc_data($qid,$qno)
	{
		$resArr=array();
		include '../resources/model/db.php';
		$s=mysqli_query($r,"select * from ques where qid='$qid' and qno='$qno'");
		if($e=mysqli_fetch_array($s)){
			extract($e);
			$resArr[0]=$ques;
			if($ans==1)$resArr[1]=$op1;
			else if($ans==2)$resArr[1]=$op2;
			else if($ans==3)$resArr[1]=$op3;
			else if($ans==4)$resArr[1]=$op4;
			else if($ans==5)$resArr[1]=$op5;
			else if($ans==6)$resArr[1]=$op6;
			$resArr[2]=$rid;
		}
		return $resArr;
	}
	public function update_details()
	{
		$p1=$_POST['p1'];
		$p2=$_POST['p2'];
		$pass=$_POST['pass'];
		include '../resources/model/db.php';
		$s=mysqli_query($r,"select * from login where log_id='".$_SESSION['user']."' and pwd='$pass'");
		if($e=mysqli_fetch_array($s)){
			extract($e);
			if(isset($_POST['name']))
				$name=$_POST['name'];
			if(isset($_POST['email']))
				$email=$_POST['email'];
			if(($p1==$p2)&&$p1!=""&&$p1!=null){
				$s=mysqli_query($r,"update login set name='$name',pwd='$p1',email='$email' where log_id='".$_SESSION['user']."'");
			}
			else{
				$s=mysqli_query($r,"update login set name='$name',email='$email' where log_id='".$_SESSION['user']."'");
			}
		}
		else
			echo '<script>alert("invalid password");</script>';
		
		
	}
	public function fetch_details()
	{
		$resArr=array();
		include '../resources/model/db.php';
		$s=mysqli_query($r,"select name,email from login where log_id='".$_SESSION['user']."'");
		$e=mysqli_fetch_array($s);
		extract($e);
		$resArr[0]=$name;
		$resArr[1]=$email;
		return $resArr;
	}
}

?>