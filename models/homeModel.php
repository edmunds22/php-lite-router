<?php
include('db.php');

class homeModel {

	var $db; 

	function __construct(){

		//$this->db = new db(); UNCOMMENT TO LAUNCH DB OBJECT

	}

	public function getAll($sort=''){

		
		return $this->db->query('select * from tasks '.$sort, []);
		

	}

	public function newTask($user='', $email='', $description='', $image=''){

		return $this->db->safeInsert('INSERT INTO tasks (user, email, task_description, image) VALUES (?, ?, ?, ?)', [
			$user, $email, $description, $image
		]);

	}

	public function updateTask($taskId=0, $user='', $email='', $description='', $image='', $complete=0){

		return $this->db->safeUpdate('
				UPDATE tasks 
				SET 
				user = :user, 
				email = :email, 
				task_description = :description, 
				complete = :complete,
				image =  :image
				WHERE task_id = :task_id', [
			':user' => $user,  
			':email' => $email, 
			':description' => $description, 
			':complete' => $complete, 
			':image' => $image, 
			':task_id' => $taskId
		]);

	}
 
	public function getById($taskId=0){

		return $this->db->safeQuery('select * from tasks WHERE task_id = ?', [$taskId]);

	}

}