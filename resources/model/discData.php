<?php
class discData {  
    public $did;  
	public $name;
    public $title;
	public $rid;
	
    public function __construct($did,$name,$title,$rid)    
    {    
        $this->did = $did;  
		$this->name = $name;
        $this->title = $title;
		$this->rid = $rid;
    }   
}  
?>