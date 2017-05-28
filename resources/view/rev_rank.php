<div class="container">
<div class="jumbotrol">
<table class="table table-hover">
<thead>
<tr><th class="col-sm-1 text-center">Rank</th><th class="col-sm-9 text-center">Name</th><th class="col-sm-2 text-center">Score</th></tr>
</thead>
<tbody>
<?php
$i=1;
foreach ($res as $key => $val)  
{
	echo '
			<tr>
				<td class="text-center">'.$i.'</td>
				<td>'.$res[$key]->name.'</td>
				<td class="text-center">'.$res[$key]->score.'</td>
			</tr>
		';
	$i++;
}
?>
</tbody>
</table>
</div>
</div>