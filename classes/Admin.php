<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

class Admin{
	private $db;
	private $fm;
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function getAdminData($data){
		$name 	  = $this->fm->validation($data['name']);
		$password = $this->fm->validation($data['password']);
		$name = mysqli_real_escape_string($this->db->link,$name);
		$password = mysqli_real_escape_string($this->db->link,md5($password));

		$sql = "SELECT * FROM tbl_admin WHERE name='$name' AND password='$password'";
		$result = $this->db->select($sql);
		if($result){
			$adminData = $result->fetch_assoc();
			Session::init();
			Session::set('adminLogin',true);
			Session::set('adminName',$adminData['name']);
			Session::set('adminId',$adminData['id']);
			header("Location:index.php");
		}else{
			$msg = "<span style='color:red;'>User or Password Not Matched</span>";
			return $msg;
		}

	}
}
?>