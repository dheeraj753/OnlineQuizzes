<div class="container">
	<p class="text-center">Note: You cannot edit the contents once the quiz is hosted</p>
<form action="../host_a_quiz/index.php" method="post" class="form">
	<div class="rows">
	<div class="col-lg-push-8 col-lg-4 col-md-push-8 col-md-4 col-sm-12 col-xs-12 well">
<div class="rows">

<input type="hidden" id="num_ques" name="num_ques" value="1">

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-4 col-xs-4">
      <input type="button" class="form-control" id="" onclick="add_ques()"  value="Add Question">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-4 col-xs-4">
      <input type="text" class="form-control text-center" name="duration" id="" placeholder="Duration in minutes">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-4 col-xs-4">
      <button type="submit" name="host" value="Host" class="form-control">Host</button>
    </div>
  </div>
</div>
	</div>
	
	
	<div class="col-lg-pull-4 col-lg-8 col-md-pull-4 col-md-8 col-sm-12 col-xs-12 well">
	
<!---------------------------------------------------------->	
		<table id="ques_table" class="table-condensed text-center" style="width:100%;">
		
			<tr class="">
				<td colspan="2"><input id="title" class="form-control text-center" name="title" type="text" placeholder="Enter Title for the Quiz"></td>
			</tr>
			<tr class=""><td colspan="2">Enter a Question</td></tr>
			
			
			
			<tr id="q1.0" class="">
				<td colspan="2"><textarea class="form-control" rows="5" name="q10"></textarea>
				<input id="1" type="hidden" value="1" name="1"></td>
			</tr>
			<tr id="q1.1" class="input-group">
				<td id="1.1" class="input-group-addon" onclick="set_ans(this.id)">A</td>
				<td class="form-group nopadding"><input class="form-control" type="text" name="q11" /></td>
			</tr>
			<tr id="q1.2" class="input-group">
				<td id="1.2" class="input-group-addon" onclick="set_ans(this.id)">B</td>
				<td class="form-group nopadding"><input class="form-control" type="text" name="q12" /></td>
			</tr>
			
			
			
<!---------------------------------------------------------->	
			<tr id="">
				<td colspan="2">
 <ul class="pager">
  <li class="next"><a href="javascript:add_opt();">Add Option</a></li>
</ul>
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <ul class="pager">
  <li class="previous"><a href="javascript:change_ques(0)">Previous</a></li>
  <li class="next"><a href="javascript:change_ques(1)">Next</a></li>
</ul>
				</td>
			</tr>
		</table>
	</div>
	
	
	</div>
</form>


</div>


	<script>set_ans("1.1");</script>