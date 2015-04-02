<?php
class arrayFnc
{
	//A result by default is an array
	public $result = array();
	
	public function __construct()
	{
	}
	//Search and return matched array based off $key=>$value
	public function search($array,$key,$val)
	{
		//(string) Array key we will be working with
		$this->key = $key;
		//Key value that we need.
		$this->val = $val;

		//Check if the passed in array is in fact an array
		if(is_array($array))
		{
			//We first need to check if the specefied array key exist
			$check = (isset($array[$this->key]));

			//if it is check if the specefied key matches the value
			if($check)
			{
				if($array[$this->key] == $this->val)
				{
					//if so this result is the passed in array
					$this->result = $array;
				}
				else
				{	
					//or we need to search deeper
					$goDeeper = true;
				}
			}
			//if we are going deeper
			if(isset($goDeeper))
			{
				//map the array to check each subarray for a match
				array_map(array($this, "matchCheck"), $array);
				//If the result is empty pass in false.
				$this->result = (empty($this->result)) ? false : $this->result;
			}
		}
	}
	//Quick function to check matching current $key=>$val scope.
	public function matchCheck($for)
	{
		//If a match is found
		if($for[$this->key] == $this->val)
		{
			//push it to this result
			array_push($this->result,$for);
		}
	}

}
?>
