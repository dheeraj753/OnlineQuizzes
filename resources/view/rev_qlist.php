<div class="container">
<div class="jumbotrol">
<table class="table table-hover">
<thead>
<tr><th class="col-sm-1 text-center">Title</th><th class="col-sm-11 text-center">Title</th></tr>
</thead>
<tbody>
<?php
for($i=0;$i<count($res);$i++){
	echo'
			<tr>
				<td class="text-center">Q'.($i+1).'</td>
				<td><a href="../review_a_quiz/?rev='.$_GET['rev_qlist'].'&q='.($i+1).'" style="display:block;text-decoration:none;padding-left:5px;width:100%;height:100%;">'.$res[$i].'</a></td>
			</tr>
	';
}
?>
</tbody>
</table>
</div>
</div>