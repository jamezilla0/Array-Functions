<?php
class arrayFnc
{
	public $result = array();
	
	public function __construct()
	{
	}

	public function search($array,$key,$val)
	{
		$this->key = $key;
		$this->val = $val;
		
		echo "Looking for $key => $val";
		
		if(is_array($array))
		{
			if($array[$this->key] == $this->val)
			{
				$this->result = $array;
			}
			else
			{
				
				array_map(array($this, "matchCheck"), $array);
				
				if(empty($this->result))
				{
					$this->result = false;
				}
			}
		}
		else
		{
			$this->result = false;
		}
	}
	
	public function matchCheck($for)
	{
		if($for[$this->key] == $this->val)
		{
			array_push($this->result,$for);
		}
	}

}
?>
