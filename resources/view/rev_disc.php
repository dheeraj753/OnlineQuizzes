<?php
echo '<script>var uid="'.$uid.'";var rid="'.$res[2].'"; </script>';
?>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
		  <div class="row">
		  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
		  <b>Q1.</b> <?php echo $res[0]; ?><br>
		  <b>Sol.</b> <?php echo $res[1]; ?>
		  </div>
		  <div class="col-lg-2 col-md-2 co2-sm-4 col-xs-4 text-center">
		  <a style="text-decoration:none;color:white;" href="../review_a_quiz/?rev_qlist=<?php echo $_GET['rev']; ?>">
		  <span class="glyphicon glyphicon-chevron-left"></span>
		  List of Questions</a>
		  </div>
		  </div>
		  </div>
          <div class="panel-body">
            <div id="rchat" class="container" style="max-height:300px;overflow-y:scroll;">
			
			
			
			
               
                
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