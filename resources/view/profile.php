

<div class="container">


	<div class="row" style="">
	
	<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 col-xs-12 ">
	
	<form id="ss" action="" method="post" class="form-horizontal">
	<fieldset>
	<legend>User Details</legend>
		<div style="width:90%;margin:auto;height:30px;">
			<div style="float:left;width:20%;">
				Login ID
			</div>
			<div class="form-control" style="border:none;float:left;width:80%;">
				<?php echo $_SESSION['user']; ?>
			</div>
		</div>
		<div style="width:90%;margin:auto;height:30px;">
			<div style="float:left;width:20%;">
				Name
			</div>
			
			<div class="input-group" style="float:left;width:80%;">
				<input class="form-control" type="text" id="name" name="name" value="<?php echo $res[0]; ?>">
				<span class="input-group-addon btn btn-default" onclick="undisableName();"id="sizing-addon1">Edit</span>
			</div>
		</div>
		<div style="width:90%;margin:auto;height:30px;">
			<div style="float:left;width:20%;">
				Email
			</div>
			<div class="input-group" style="float:left;width:80%;">
				<input class="form-control" type="text" id="email" name="email" value="<?php echo $res[1]; ?>">
				<span class="input-group-addon btn btn-default" onclick="undisableEmail();"id="sizing-addon1">Edit</span>
			</div>
		</div>
	</fieldset>
	<fieldset>
	<legend>Change Password</legend>
		<div  style="width:90%;margin:auto;height:30px;">
			
			<div class="input-group" style="float:left;width:100%;">
				<input class="form-control" type="password" name="p1" placeholder="Enter New Password" id="" >
			</div>
		</div>
		<div style="width:90%;margin:auto;height:30px;">
			
			<div class="input-group" style="float:left;width:100%;">
				<input class="form-control" type="password" name="p2" placeholder="Re-Enter New Password" id="" >
			</div>
		</div>
		<div style="width:90%;margin:auto;height:30px;">
			
			<div class="input-group" style="float:left;width:100%;">
				<input class="form-control" type="password" name="pass" placeholder="Enter old Password" id="" >
				
				<input type="hidden" name="update" >
				<span class="input-group-addon btn btn-default" onclick="save_details();" id="sizing-addon1">Save</span>
			</div>
		</div>
	
	</fieldset>
	</form>
	
	
	</div>
	
	
	</div>
	
	
</div>
    <script>
		document.getElementById("name").disabled = true;
		document.getElementById("email").disabled = true;
		function undisableName() 
		{
			document.getElementById("name").disabled = false;
		}
		function undisableEmail() 
		{
			document.getElementById("email").disabled = false;
		}
		function save_details(){
			document.getElementById("ss").submit();
		}
		
	</script>