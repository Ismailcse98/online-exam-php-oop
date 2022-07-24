<?php 
  $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');

	$exm = new Exam();
?>

<div class="main">
<h1>Admin Panel - Question List</h1>
<?php
	if (isset($_GET['delque'])) {
		 $quesNo = $_GET['delque'];
		 $delQue = $exm->delQuestion($quesNo);
	}
	if (isset($delQue)) {
		echo $delQue;
	}
?>
<table class="tblone">
	<tr>
		<th>No</th>
		<th>Question</th>
		<th>Action</th>
	</tr>
	<?php 
	$getData  = $exm->getQuestionOrderBy();
	if ($getData) {
		$sl = 0;
		while ($data = $getData->fetch_assoc()) {
			$sl++;
	?>
	<tr>
		<td><?php echo $sl;?></td>
		<td><?php echo $data['ques'];?></td>
		<td align='center'>
			<a onclick="return confirm('Are you sure to disable?')" href="?delque=<?php echo $data['quesNo'];?>">Remove</a>
		</td>
	</tr>
<?php } } ?>
</table>


	
</div>
<?php include 'inc/footer.php'; ?>