<?php
class actQuizData {  
    public $qno;  
	public $ques;
    public $op1;
	public $op2;
	public $op3;
	public $op4;
	public $op5;
	public $op6;
	public $ans;
	
    public function __construct($qno,$ques,$op1,$op2,$op3,$op4,$op5,$op6,$ans)    
    {    
        $this->qno = $qno;  
		$this->ques = $ques;
        $this->op1 = $op1;
		$this->op2 = $op2;
		$this->op3 = $op3;
		$this->op4 = $op4;
		$this->op5 = $op5;
		$this->op6 = $op6;
		$this->ans = $ans;
    }   
}  
?>