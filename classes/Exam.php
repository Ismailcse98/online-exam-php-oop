<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

class Exam{
	private $db;
	private $fm;
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addQuestions($data){
		$quesNo = $this->fm->validation($data['quesNo']);
		$ques = $this->fm->validation($data['ques']);
		$ans1 = $this->fm->validation($data['ans1']);
		$ans2 = $this->fm->validation($data['ans2']);
		$ans3 = $this->fm->validation($data['ans3']);
		$ans4 = $this->fm->validation($data['ans4']);
		$rightAns = $this->fm->validation($data['rightAns']);
		$quesNo = mysqli_real_escape_string($this->db->link,$quesNo);
		$ques = mysqli_real_escape_string($this->db->link,$ques);
		$ans1 = mysqli_real_escape_string($this->db->link,$ans1);
		$ans2 = mysqli_real_escape_string($this->db->link,$ans2);
		$ans3 = mysqli_real_escape_string($this->db->link,$ans3);
		$ans4 = mysqli_real_escape_string($this->db->link,$ans4);
		$rightAns = mysqli_real_escape_string($this->db->link,$rightAns);
		$ans = array();
		$ans[1]=$ans1;
		$ans[2]=$ans2;
		$ans[3]=$ans3;
		$ans[4]=$ans4;

		$query = "INSERT INTO tbl_ques(quesNo,ques) VALUES('$quesNo','$ques')";
		$insert_row = $this->db->insert($query);
		if($insert_row){
			foreach ($ans as $key => $value) {
				if ($value!='') {
					if ($key  == $rightAns) {
						$rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$value')";
					}else{
						$rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','0','$value')";
					}
					$insertrow = $this->db->insert($rquery);
					if ($insertrow) {
						continue;
					}else{
						die('Error........');
					}
				}
			}
			$msg = "Question Added Successfully";
			return $msg;
		}
	}
	public function getQuestionOrderBy(){
		$sql = "SELECT * FROM tbl_ques";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
	public function delQuestion($queId){
		$tables = array('tbl_ques','tbl_ans');
		foreach ($tables as $table) {
			$delQuery = "DELETE FROM $table WHERE quesNo='$queId'";
			$delData = $this->db->delete($delQuery);
		}
		if($delData) {
			$msg = "Data Deleted Successfully";
			return $msg;
		}else{
			$msg = "Data Not Deleted";
			return $msg;
		}
	}
	public function getTotalRows(){
		$query = "SELECT * FROM tbl_ques";
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
	}
	public function getQuestion(){
		$query 	 = "SELECT * FROM tbl_ques";
		$getData = $this->db->select($query);
		$result  = $getData->fetch_assoc();
		return $result;
	}
}
?>