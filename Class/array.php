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
			if((isset($goDeeper)) || (!$check))
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
		//look for an array within an array
	public function arrayExist($array, $in, $return = false)
	{
		$found = false;
		//Foreach checking array existing in the $in param
		foreach($in as $check)
		{
			//create a matched array to hold all matches
			$matched = array();
			//create a didnt match array to hold all missmatches
			$didntMatch = array();
			//foreach array passed in
			foreach($array as $key=>$val)
			{
				
				//determind if the key of this array is the same val as the key in the array we are checking against
				$found = ($check[$key] == $val);

				//if the check was valid then we found a match
				if($found)
				{
					//if so push it to the matched array
					array_push($matched, $key);
				}
				//if we have same number of matches as check keys
				if(count($matched) == count($check))
				{
					//$found based on $return will either be checked array or remain result of the condetional at line 74
					$found = ($return) ? $check : $found;
					break;
				}
				else
				{
					//else we did not find anything
					$found = false;
				}
					
			}
			//if a match was found
			if($found)
			{
				//break loop and return what we asked for
				break;
			}
		}

		return $found;
	}

}
?>
