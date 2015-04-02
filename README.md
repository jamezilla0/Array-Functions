# Array-Functions
> I will be building array functions that will make working with arrays allot easier. One of my main concern is efficiancy and **spesision** (Being specific and percise with my methods and objects).

> I will be writting this in PHP using OOP structure.

# Constructing


```php
$array = new arrayFnc();
```

# Core Method's
```php
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
```

```php
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
```

#Ussage

##Search

>
```php
/* 
$found = what returned from array search.
$against = array you will search agaisnt.
$key = which array key should we target.
$val = what the value of the key should be.
*/
$found = $array->search($against,$key,$val);
```
