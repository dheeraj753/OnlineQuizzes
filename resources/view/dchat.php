<?php
if(!isset($_GET['id'])||($_GET['id']==null)){
	
}

echo '<script>var uid="'.$uid.'";var did="'.$_GET['id'].'";var rid="'.$rid.'"; </script>';
?>


<div class="container">
    <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
		  <?php echo $_GET['title']; ?>
		  </div>
          <div class="panel-body">
            <div id="dchat" class="container" style="max-height:300px;overflow-y:scroll;">
			
			
                
            </div>
            <div class="panel-footer">
                 <div class="input-group">
                  <input id="content" type="text" onKeydown="Javascript: if (event.keyCode==13) post_comment();" class="form-control">
                  <span class="input-group-btn">
                    <input class="btn btn-default" type="submit" value="Enter" onclick="post_comment();">
                  </span>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>



<script> get_content();</script>