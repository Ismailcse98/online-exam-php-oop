<?php 
    $filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/inc/header.php');
		include_once ($filepath.'/../classes/Exam.php');
?>
<?php
		$exm = new Exam();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$addQue = $exm->addQuestions($_POST);
		}
		//Get Total Question
		$total = $exm->getTotalRows();
		$nextTotal = $total+1;
?>
<style>
	.adminpanel{width: 480px;margin: 20px auto 0; padding: 10px; border: 1px solid #ddd; color: #999;}
</style>

<div class="main">
<h1>Admin Panel - Add Question</h1>
<?php 
if (isset($addQue)) {
	echo $addQue;
}
?>
<div class="adminpanel">
	<form action="" method="POST">
		<table>
			<tr>
					<td>Question No</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $nextTotal;?>" name="quesNo"></td>
			</tr>
			<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text"  name="ques" placeholder="Enter question"></td>
			</tr>
			<tr>
					<td>Choice One</td>
					<td>:</td>
					<td><input type="text"  name="ans1" placeholder="Enter choice one"></td>
			</tr>
			<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td><input type="text"  name="ans2" placeholder="Enter choice one"></td>
			</tr>
			<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Enter choice one"></td>
			</tr>
			<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td><input type="text"  name="ans4" placeholder="Enter choice one"></td>
			</tr>
			<tr>
					<td>Correct No</td>
					<td>:</td>
					<td><input type="number"  name="rightAns"></td>
			</tr>
			<tr>
					<td colspan="3" align="center"><input type="submit" value="Add Question" name=""></td>
			</tr>
		</table>
	</form>
</div>
</div>
<?php include 'inc/footer.php'; ?>