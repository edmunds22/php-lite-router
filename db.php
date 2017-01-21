<?php

class db {
	
	var $dbh;

	function __construct(){

		$dir = 'DB CONNECTION STRING';
		$this->dbh = new PDO($dir) or die("cannot open the database");
		$this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	
	}

	function query($query, $bindings=[]){

		$result = [];

		
		$statement = $this->dbh->prepare($query);
		try{
		     $statement->execute();
		}
		catch(PDOException $e){
		     echo "sql statement error: " . $e->getMessage();
		     return false;
		}

		$result = $statement->fetchAll();
		return $result;
		

	}

	function safeInsert($query, $args){

		$qry = $this->dbh->prepare($query);
		try{
		     $qry->execute($args);
		}
		catch(PDOException $e){
		     echo "sql statement error: " . $e->getMessage();
		     return false;
		}
		
		return true;

	}

	function safeQuery($query, $args){

		$qry = $this->dbh->prepare($query);

		try{
		     $qry->execute($args);
		}
		catch(PDOException $e){
		     echo "sql statement error: " . $e->getMessage();
		     return false;
		}

		$result = $qry->fetchAll();

		return $result;


	}


	function safeUpdate($query, $args){


		$qry = $this->dbh->prepare($query);

		foreach($args as $arg => $val){
	
			$qry->bindValue($arg, $val); 

		}

		try{
		     $qry->execute();

		}
		catch(PDOException $e){
		     echo "sql statement error: " . $e->getMessage();
			 die();
		     //return false;
		}
		
		return true;

	}



}

