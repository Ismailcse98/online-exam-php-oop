<?php 
  $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');

	$usr = new User();
?>

<div class="main">
<?php 
	if (isset($_GET['dis'])) {
		$disId = $_GET['dis'];
		$upSql=$usr->disableUser($disId);
		if ($upSql) {
			echo "User Disabled Successfully";
		}
	}
	if (isset($_GET['ena'])) {
		$enaId = $_GET['ena'];
		$upSql=$usr->enableUser($enaId);
		if ($upSql) {
			echo "User Enabled Successfully";
		}
	}
	if (isset($_GET['rem'])) {
		$remId = $_GET['rem'];
		$remSql=$usr->deleteUser($remId);
		if ($remSql) {
			echo "User Deleted Successfully";
		}
	}
?>
<h1>Admin Panel - Manage Users</h1>
<table class="tblone">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Username</th>
		<th>E-mail</th>
		<th>Action</th>
	</tr>
	<?php 
	$result  = $usr->getAllUser();
	if ($result) {
		$sl = 0;
		while ($userData = $result->fetch_assoc()) {
			$sl++;
	?>
	<tr>
		<td><?php echo $sl;?></td>
		<td><?php echo $userData['name'];?></td>
		<td><?php echo $userData['username'];?></td>
		<td><?php echo $userData['email'];?></td>
		<td>
			<?php
				if ($userData['status']==0) {
			?>
			<a onclick="return confirm('Are you sure to disable?')" href="?dis=<?php echo $userData['id'];?>">Disable</a>
		<?php }else{ ?>
			<a onclick="return confirm('Are you sure to enable?')" href="?ena=<?php echo $userData['id'];?>">Enable</a>
		<?php } ?>
			|| <a onclick="return confirm('Are you sure to remove?')" href="?rem=<?php echo $userData['id'];?>">Remove</a>
		</td>
	</tr>
<?php } } ?>
</table>


	
</div>
<?php include 'inc/footer.php'; ?>