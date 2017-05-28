<div class="container-fluid">
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="">
	<div class="jumbotron well">
	<h4 class="text-center">Statistics</h4>
<?php
if($stat[4]>0)
	$avg_score=number_format((float)(($stat[3]/$stat[4])*100),2,'.','');
else
	$avg_score=0;
echo '
<div class="row"><div class="col-xs-10 text-left">Number of Disucssions Started</div><div class="col-xs-2 text-center">'.$stat[0].'</div></div>
<div class="row"><div class="col-xs-10 text-left">Number of Quizzes Hosted</div><div class="col-xs-2 text-center">'.$stat[1].'</div></div>
<div class="row"><div class="col-xs-10 text-left">Number of Quizzes Participated</div><div class="col-xs-2 text-center">'.$stat[2].'</div></div>
<div class="row"><div class="col-xs-10 text-left">Average Score attained in all the quizzes</div><div class="col-xs-2 text-center">'.$avg_score.'%</div></div>
';
?>
	</div>
	</div>
	<div class="col-sm-6 col-xs-12" style="background-color:">
	<div class="jumbotron well">
	<h4 class="text-center">Active Quizzes</h4>
<?php
if($res!=null)
foreach ($res as $key => $val)  
{
	echo '
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
		'.$res[$key]->title.'
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<form action="../dashboard/" method="post" style="margin:0px;"> 
			<input type="hidden" name="qid" value="'.$res[$key]->qid.'">
			<input type="submit" name="fin" class="btn btn-default" value="End Quiz">
		</form>
		</div>
	</div>

';
}
else
	echo '
		<div class="text-center">There are no active quizzes that you migth have hosted</div>
	';
?>
	</div>
	</div>
</div>
</div>








