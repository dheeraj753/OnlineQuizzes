<div class="container">
<div class="jumbotrol">
<table class="table table-hover">
<thead>
<tr><th colspan="3" class="col-sm-12 text-center">Title</th></tr>

</thead>
<tbody>
<?php
$i=1;
foreach ($res as $key => $val)  
{
	echo '
			<tr>
				<td class="col-sm-8">'.$res[$key]->title.'</td>
				<td class="col-sm-2 text-center" style="border-left:solid;"><a href="../review_a_quiz/?rev_qlist='.$res[$key]->qid.'" style="display:block;text-decoration:none;padding-left:5px;width:100%;height:100%;">Join Discussion</a></td>
				<td class="col-sm-2 text-center" style="border-left:solid;"><a href="../review_a_quiz/?rev_rank='.$res[$key]->qid.'" style="display:block;text-decoration:none;padding-left:5px;width:100%;height:100%;">Show Rankings</a></td>
			</tr>
		';
	$i++;
}
?>
<tr><td colspan="3" style="text-align:center;">
<?php include '../resources/view/pagination.php'; ?>
</td></tr>
</tbody>
</table>
</div>
</div>