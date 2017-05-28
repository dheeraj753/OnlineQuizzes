<div class="container-fluid">
  <div class="row">
<div class="col-sm-3 col-sm-push-9">
	<div class="jumbotron well" style="padding-left:15px;padding-right:15px;">
	<h4 class="text-center">Start New Discussion</h4>
	
	<div class="row">
	<form action="../discussions" style="margin:0px;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
		<input type="text" name="new_topic" class="form-control" placeholder="Enter Topic Title">
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
		<input type="submit" class="btn btn-default form-control" value="Start">
		</div>
	</form>
	</div>
	</div>
</div>

<div class="col-sm-9 col-sm-pull-3" >
	<div class="jumbotron well" style="background:none;">




<table class="table table-hover" style="width:100%;">
<thead>
<tr class=""><th class="col-lg-9 col-md-9 col-sm-9 col-xs-9">Topic</th><th class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Host</th></tr>
</thead>
<tbody>
<?php
foreach ($res as $key => $val)  
{
	echo '

<tr class="">
	<td class="col-lg-9 col-md-9 col-sm-9 col-xs-9"><a href="../discussions/?id='.$res[$key]->did.'&title='.$res[$key]->title.'" style="text-align:left;" class="btn btn-block">'.$res[$key]->title.'</a></td>
	<td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'.$res[$key]->name.'</td>
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
  </div>
</div>