<?php
class quizData {  
    public $qid;  
	public $name;
    public $title;
	
    public function __construct($qid,$name,$title)    
    {    
        $this->qid = $qid;  
		$this->name = $name;
        $this->title = $title;
    }   
}  
?>