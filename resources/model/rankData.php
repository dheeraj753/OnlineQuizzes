<?php
class rankData {  
    public $uid;  
	public $name;
	public $score;
	
    public function __construct($uid,$name,$score)    
    {    
        $this->uid = $uid;  
		$this->name = $name;
		$this->score = $score;
    }   
}  
?>