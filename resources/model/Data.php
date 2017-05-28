<?php
class Data {  
    public $uid;  
	public $log_id;
    public $name;
	public $email;
	
    public function __construct($uid,$log_id,$name,$email)    
    {    
        $this->uid = $uid;  
		$this->log_id = $log_id;
        $this->name = $name;
		$this->email = $email;
    }   
}  
?>