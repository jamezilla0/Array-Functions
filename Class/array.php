public function search($array,$key,$val)
{
//(string) Array key we will be working with
$this->key = $key;
//Key value that we need.
$this->val = $val;

//Check if the passed in array is in fact an array
if(is_array($array))
{
//if it is check if the specefied key matches the value
if($array[$this->key] == $this->val)
{
//if so this result is the passed in array
$this->result = $array;
}
else
{
//other wise map the array to check each subarray for a match
array_map(array($this, "matchCheck"), $array);
//If the result is empty pass in false.
$this->result = (empty($this->result)) ? false : $this->result; 
}
}
}
