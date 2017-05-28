<div class="container">
<div class="jumbotrol">
<table class="table table-hover">
<thead>
<tr><th colspan="2" class="col-sm-12 text-center">Title</th></tr>
</thead>
<tbody>
<?php
foreach ($res as $key => $val)  
{
	echo '
			<tr class="">
				<td class="col-sm-9">'.$res[$key]->title.'</td>
				<td class="col-sm-3 text-center" style="border-left:solid;" ><a href="../active_quizzes/?act_quiz='.$res[$key]->qid.'" style="display:block;text-decoration:none;color:black;padding-left:5px;width:100%;height:100%;">Join</a></td>
			</tr>
	';
}
?>
<tr><td colspan="2" style="text-align:center;">
<?php include '../resources/view/pagination.php'; ?>
</td></tr>
</tbody>
</table>
</div>
</div>