<div class="ques-ip-container">
	<div class="note">Note: You cannot edit the contents once the quiz is hosted</div>
	<div class="h_body">
			<?php
				if($status==0)
					echo 'There seems to be an error when uploading the quiz. Please try again';
				else if($status==1)
					echo 'The quiz is successfully uploaded.';
			?>
	</div>
	<script>set_ans("1.1");</script>
</div>