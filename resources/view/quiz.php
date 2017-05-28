<div class="container-fluid">

<div id="titl" style="margin:auto;max-width:450px;padding-top:5px;text-align:center;"><?php echo $details[0]; ?></div>
<p style="margin:auto;padding-top:5px;text-align:center;">Note:Do not close or refresh the tab until you submit the quiz</p>


<form id="qq" style="margin:0px;" action="../active_quizzes/?finish" method="post">
<input id="rtm" type="hidden" name="rem_time" value="0">
<div class="rows">
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 well">
	<ul class="pagination">
<?php
for($i=1;$i<=$details[1];$i++){
	
		echo '<li><a id="curr'.$i.'" href="javascript:change_ques('.$i.');">'.$i.'</a></li>';
}
echo '<script>var time='.$details[2].';var total='.($details[1]).';</script>';
?>
	</ul>
</div>
	<div id="CountDownTimer" class="col-lg-push-7 col-lg-3 col-md-push-7 col-md-2 col-sm-push-7 col-sm-2 col-xs-12" data-timer="<?php  echo ($details[2]*60); ?>" style="max-height:150px;">
	</div>
<?php
	if(isset($_SESSION['qcount']))
		unset($_SESSION['qcount']);
	if(isset($_SESSION['qid']))
		unset($_SESSION['qid']);
	if(isset($_SESSION['ans']))
		unset($_SESSION['ans']);
	$_SESSION['qcount']=$details[1];$_SESSION['qid']=$_GET['act_quiz'];
	$answers="";
	for($i=1;$i<=$details[1];$i++){
		$answers.=$res[$i]->ans.'/-/';
	}
	$_SESSION['ans']=$answers;
?>
<style>
input[type="radio"] {
	float:left;
    margin-right: 25px;
    margin-left: 10px;
}
</style>
<div class="col-lg-pull-3 col-lg-7 col-md-pull-2 col-md-7 col-sm-pull-2 col-sm-7 col-xs-12">
<div class="table-responsive">          
  <table class="table">
<?php
for($i=1;$i<=$details[1];$i++){
	echo '
		<thead><tr id="q'.$i.'0"><th>Q'.$i.'</th><th>'.$res[$i]->ques.'</th></tr></thead>
		<tr id="q'.$i.'1"><td class="text-left" colspan="2"><label class="lb"><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="1">'.$res[$i]->op1.'</label></td></tr>
		<tr id="q'.$i.'2"><td class="text-left" colspan="2"><label class="lb"><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="1">'.$res[$i]->op2.'</label></td></tr>
	';
	if($res[$i]->op3==null||$res[$i]->op3=="")
		echo '<tr id="q'.$i.'3" style="display:none !important;"><td colspan="2" style="display:none !important;text-align:left;"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="3">'.$res[$i]->op3.'</label></td></tr>';
	else
		echo '<tr id="q'.$i.'3"><td style="text-align:left;" colspan="2"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="3">'.$res[$i]->op3.'</label></td></tr>';
	if($res[$i]->op4==null||$res[$i]->op4=="")
		echo '<tr id="q'.$i.'4" style="display:none !important;"><td colspan="2" style="display:none !important;text-align:left;"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="4">'.$res[$i]->op4.'</label></td></tr>';
	else
		echo '<tr id="q'.$i.'4"><td style="text-align:left;" colspan="2"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="4">'.$res[$i]->op4.'</label></td></tr>';
	if($res[$i]->op5==null||$res[$i]->op5=="")
		echo '<tr id="q'.$i.'5" style="display:none !important;"><td colspan="2" style="display:none !important;text-align:left;"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="5">'.$res[$i]->op5.'</label></td></tr>';
	else
		echo '<tr id="q'.$i.'5"><td style="text-align:left;" colspan="2"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="5">'.$res[$i]->op5.'</label></td></tr>';
	if($res[$i]->op6==null||$res[$i]->op6=="")
		echo '<tr id="q'.$i.'6" style="display:none !important;"><td colspan="2" style="display:none !important;text-align:left;"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="6">'.$res[$i]->op6.'</label></td></tr>';
	else
		echo '<tr id="q'.$i.'6"><td style="text-align:left;" colspan="2"><label><input type="radio" id="rq'.$i.'"  name="q'.$i.'" value="6">'.$res[$i]->op6.'</label></td></tr>';
}
?>
<tr>
<td colspan="2">
 <ul class="pager">
  <li class="previous"><a href="javascript:change_ques((current-1));">Previous</a></li>
  <li class="next"><a href="javascript:change_ques((current+1));">Next</a></li>
</ul>
</td>
</tr>
  </table>
  </div>
<input type="submit" value="Finish" class="btn btn-default" name="fin" style="float:right;width:90px;">
</div>
	<!--  style="width: 700px; height: 150px;"  -->
<div class="col-lg-0 col-md-1 col-sm-1 col-xs-12">

</div>

</div>
</form>

</div>

<script> 
change_ques(1);
window.onload=function(){
	if(sessionStorage.refresh){
		if(sessionStorage.refresh==2){
			//sub();
			window.location.href="../active_quizzes/?finish&ref="+sessionStorage.refresh;
			sessionStorage.clear();
			
		}
	}
	else{
		sessionStorage.refresh=1;
	}
};
window.onbeforeunload=function(){
	if(sessionStorage.refresh==1){
		//document.forms[0].submit();
		//document.getElementById("qq").submit();
		//sub();
		sessionStorage.refresh=2;
	}
	return null;
};

$("#CountDownTimer").TimeCircles({ time: { Days: { show: false }, Hours: { show: false } }});
detect_page_close();

counter();
</script>