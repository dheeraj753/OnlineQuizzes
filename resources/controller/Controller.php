<?php
if(isset($pg))
	include_once("../resources/model/Model.php");
else
	include_once("resources/model/Model.php");  
  
class Controller {  
     public $model;   
  
     public function __construct()    
     {    
          $this->model = new Model();  
     }   
	 public function log_status()
	 {
		 session_start();
		 if(isset($_GET['logout']))
		{
			session_destroy();
			session_start();	
		}
		if(!isset($_SESSION['user']))
		echo '<form action=".." method="post" onload="sub();"></form>
			<script>window.onload=sub();function sub(){document.forms[0].submit();}</script>
			';
	 }
	 public function login($id,$pass)
	 {
		$check=$this->model->login($id,$pass);
		return $check;
	 }
	 public function register()
	 {
		$check=$this->model->register();
		return $check;
	 }
	 public function get_res_list($pg)
	 {
		if($pg==2)
			$table="disc";
		else if($pg==3)
			$table="quizzes";
		else if($pg==4)
			$table="quizzes";
		$n=$this->model->results_count($table,$pg);
		if(!isset($_GET['page'])){
			$page=1;
		}
		else{
			$page=$_GET['page'];
			if($page<1)
				$page=1;
			else if($page>ceil($n/10))
				$page=ceil($n/10);
		}
		$res=$this->model->res_list($pg,$page,$n);
		if($res==null||$res==0){
			if($pg==2){
				include '../resources/view/disc_nores.php';
			}
			else if($pg==3){
				include '../resources/view/quiz_list_nores.php';
			}
			else if($pg==4){
				include '../resources/view/quiz_list_nores.php';
			}
		}
		else{
			if($pg==2){
				include '../resources/view/discussion.php';
			}
			else if($pg==3){
				include '../resources/view/quiz_list.php';
			}
			else if($pg==4){
				include '../resources/view/rev_list.php';
			}
		}
	 }
	 public function invoke($pg)
	 {
		 if($pg==1){
			 if(isset($_POST['fin'])){
				 $this->model->fin_quiz($_POST['qid']);
			 }
			 $stat=$this->model->dashboard();
			 $res=$this->model->active_quizzes();
			 include '../resources/view/dashboard.php';
		 }
		 else if($pg==2){
			 if(isset($_GET['new_topic'])){
				 $this->model->discussion();
				 $this->get_res_list($pg);
			 }
			 else if(isset($_GET['id'])){
				 $uid=$_SESSION['user'];
				 $rid=$this->model->dchat($_GET['id']);
				 include '../resources/view/dchat.php';
			 }
			 else{
				 $this->get_res_list($pg);
				//include '../resources/view/discussion.php';
			 }
		 }
		 else if($pg==3){
			if(isset($_GET['act_quiz'])){
				$details=$this->model->start_quiz($_GET['act_quiz'],0);
				$res=$this->model->start_quiz($_GET['act_quiz'],1);
				include '../resources/view/quiz.php';
			}
			else if(isset($_GET['finish'])){
				if(!isset($_GET['ref']))
					$this->model->post_quiz();
				else if($_GET['ref']==null||$_GET['ref']==2){
					
				}
				//$this->model->post_quiz();
				include '../resources/view/finish.php';
			}
			else{
				$this->get_res_list($pg);
			}
		 }
		 else if($pg==4){
			 if(isset($_GET['rev_qlist'])){
				 $res=$this->model->rev_qlist($_GET['rev_qlist']);
				 include '../resources/view/rev_qlist.php';
			 }
			 else if(isset($_GET['rev_rank'])){
				 $res=$this->model->rev_rank($_GET['rev_rank']);
				 include '../resources/view/rev_rank.php';
			 }
			 else if(isset($_GET['rev'])){
				 $uid=$_SESSION['user'];
				 $res=$this->model->rev_disc_data($_GET['rev'],$_GET['q']);
				 include '../resources/view/rev_disc.php';
			 }
			 else{
				 $this->get_res_list($pg); 
			 }
			 
		 }
		 else if($pg==5){
			 if(isset($_POST['host'])){
				 $status=$this->model->quiz_upl(); 
				 include '../resources/view/host_status.php'; 
			 }
			 else{
				include '../resources/view/host.php'; 
			 }
		 }
		 else if($pg==6){
			 if(isset($_POST['update'])){
				 $this->model->update_details();
			 }
			 $res=$this->model->fetch_details();
			 include '../resources/view/profile.php';
		 }
	 }
}
?>