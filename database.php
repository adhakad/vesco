<?php
class database {
	public $connect;
	public  function __construct(){
		$this->connect = mysqli_connect("localhost","root","","oops");
		/*if ($this->connect) {
			echo "Database Connected !";
		}else{
			echo "Database Not Connected !";
		}*/
	}

/*databse check for connected*/
//$obj= new database();

public function insert($inserted)
	{
		$result = $this->connect->query($inserted) or die($this->connect->error. __LINE__);
		if ($result)
		{
			header("Location: admin.php?msg=".urlencode('data insert successfull'));
			
		}
		else
		{
			die("Error:(".$this->connect->error.")".$this->connect->error);
		}		
	}


public function select($selected)
	{
		$result = $this->connect->query($selected)or die($this->connect->error.__LINE__);
		if ($result->num_rows >0) {
			return $result;
		}else{
			return false;
		}
	}
public function edit($edited)
	{
		$result = $this->connect->query($edited) or die($this->connect->error. __LINE__);
		if ($result) {
			return $result;
		}
		else
		{
			return false;
		}
	}


	public function delete($del)
	{
		$result = $this->connect->query($del) or die($this->connect->error. __LINE__);
		if ($result)
		{
			header("Location: admin.php?msg=".urlencode('data delete successfull'));
			
		}
		else
		{
			die("Error:(".$this->connect->error.")".$this->connect->error);
		}	
	}


}

?>