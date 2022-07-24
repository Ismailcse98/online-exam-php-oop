<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

class User{
	private $db;
	private $fm;
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function userRegistraion($name,$username,$password,$email){
		$name 	  = $this->fm->validation($name);
		$username = $this->fm->validation($username);
		$email 	  = $this->fm->validation($email);
		$password = $this->fm->validation($password);
		
		$name 	  = mysqli_real_escape_string($this->db->link,$name);
		$username = mysqli_real_escape_string($this->db->link,$username);
		$email 	  = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,md5($password));
		
		if ($name=='' || $username=='' || $password=='' || $email=='') {
			echo "Field Must note be empty";
		}else if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
			echo "Invalid Email";
		}else{
			$chkquery = "SELECT * FROM tbl_user WHERE email ='$email'";
			$chkresult = $this->db->select($chkquery);
			if ($chkresult) {
				echo "Email Already Exists";
			}else{
				$query = "INSERT INTO tbl_user(name,username,email,password) VALUES('$name','$username','$email','$password')";
				$insert_row = $this->db->insert($query);
				if ($insert_row){
					echo "Registration Successfully";
				}else{
					echo "Not Registration";
				}
			}
		}
	}
	public function userLogin($email,$password){
		$email 	  = $this->fm->validation($email);
		$password = $this->fm->validation($password);
		$email 	  = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,md5($password));

		if ($email=='' || $password=='') {
			echo "empty";
			exit();
		}else{
			$query = "SELECT * FROM tbl_user WHERE email ='$email' AND password='$password'";
			$result = $this->db->select($query);
			if ($result) {
				$value = $result->fetch_assoc();
				if ($value['status']=='1') {
					echo "disable";
					exit();
				}else{
					Session::init();
					Session::set('login',true);
					Session::set('userid',$value['id']);
					Session::set('name',$value['name']);
					Session::set('username',$value['username']);
				}
			}else{
				echo "error";
				exit();
			}
		}

	}
	public function getUserData($userId){
		$sql = "SELECT * FROM tbl_user WHERE  id='$userId'";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
	public function userUpdateData($userId,$data){
		$name 	  = $this->fm->validation($data['name']);
		$username = $this->fm->validation($data['username']);
		$email 	  = $this->fm->validation($data['email']);
		
		$name 	  = mysqli_real_escape_string($this->db->link,$name);
		$username = mysqli_real_escape_string($this->db->link,$username);
		$email 	  = mysqli_real_escape_string($this->db->link,$email);


		$sql = "UPDATE tbl_user SET name='$name',username='$username',email='$email' WHERE id='$userId'";
		$result = $this->db->update($sql);
		if ($result){
			return "Data update Successfully";
		}else{
			return "Data Not Update";
		}
	}
	public function getAllUser(){
		$sql = "SELECT * FROM tbl_user ORDER BY id DESC";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
	public function disableUser($userId){
		$sql = "UPDATE tbl_user SET status='1' WHERE id='$userId'";
		$result = $this->db->update($sql);
		if ($result){
			return $result;
		}else{
			return false;
		}
	}
	public function enableUser($userId){
		$sql = "UPDATE tbl_user SET status='0' WHERE id='$userId'";
		$result = $this->db->update($sql);
		if ($result){
			return $result;
		}else{
			return false;
		}
	}
	public function deleteUser($userId){
		$sql = "DELETE FROM tbl_user WHERE id='$userId'";
		$result = $this->db->delete($sql);
		if ($result){
			return $result;
		}else{
			return false;
		}
	}
}
?>