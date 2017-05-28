<?php
	if($pg==1) $path="dashboard";
	else if($pg==2) $path="discussions";
	else if($pg==3) $path="active_quizzes";
	else if($pg==4) $path="review_a_quiz";
	else if($pg==5) $path="host_a_quiz";
?>

<ul class="pagination pagination-sm">
  <li><a href="../<?php echo $path; ?>/?page=<?php echo ($page-1); ?>">Prev</a></li>
  <li><a <?php if($page==1)echo 'class="active"'; ?>href="../<?php echo $path; ?>/?page=<?php echo 1; ?>">1</a></li>
<?php
$end=ceil($n/10);
for($i=2;$i<$end;$i++){
	if((($i==$page-2)&&$i!=1)||(($i==$page+2)&&$i!=$end))
		echo '<li><a href="">..</a></li>';
	else if((($i==$page-1)&&$i!=1)||(($i==$page+1)&&$i!=$end))
		echo '<li><a href="../'.$path.'/?page='.$i.'&">'.$i.'</a></li>';
	else if($i==$page)
		echo '<li><a class="active" href="">'.$i.'</a></li>';
}
if($end!=1){
	if($page==$end)
		echo '<li><a class="active" href="../'.$path.'/?page='.$end.'">'.$end.'</a></li>';
	else
		echo '<li><a href="../'.$path.'/?page='.$end.'">'.$end.'</a></li>';
}
?>
  <li><a href="../<?php echo $path; ?>/?page=<?php echo ($page+1) ?>">Next</a></li>
</ul>

