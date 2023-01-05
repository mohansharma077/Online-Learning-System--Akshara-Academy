<?php

class control_class
{	

// -------------------------Set Database Connection----------------------

	public function __construct()
	{ 
	     
    $host_name="localhost";
    $user_name="root";
    $password="";
    $db_name="onlinelearning";

		try{
			$connection=new PDO("mysql:host={$host_name}; dbname={$db_name}", $user_name,  $password);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db = $connection; 
		} catch (PDOException $message ) {
			echo $message->getMessage();
		}
	}
	
	
	public function delete($a, $b, $c){
	try{	
			$sql = "DELETE FROM $a where $b=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$c]);
		} catch (PDOException $exception) {
			echo $exception->getMessage();
		  }

    }
    
    public function display($p , $q){
		try{
			$sql = "SELECT * FROM $p ORDER BY $q DESC";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();
			return $result;		
		} catch (PDOException $exception) {
			$message = "<p style='color:red'>Something went wrong. </p>";
			
		  }
	}
	
	public function edit($a, $b, $c, $d){

	try{
			$sql = "SELECT $a  FROM $b where $c=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$d]);
			$res = $stmt->fetch();
			return $res;
			
		} catch (PDOException $exception) {
			echo $exception->getMessage();
		  }

}

public function update($a, $data, $c, $d){

	try{
			$sql = "UPDATE $a  SET $data WHERE $c=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$d]);
			setcookie('message','Updated',time()+5, "/","", 0);
			
		} catch (PDOException $exception) {
			echo $exception->getMessage();
		  }

}
	
}