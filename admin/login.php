<?php 
	include_once ('inc/loginheader.php');
	include_once ('../classes/Admin.php');
?>

<div class="main">
<h1>Admin Login</h1>
<div class="adminlogin">
	<?php
	$admin = new Admin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminData = $admin->getAdminData($_POST);
	}
	?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="name"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php 
					if (isset($adminData)) {
						echo $adminData;
					}
					?>
				</td>
			</tr>
		</table>
	</from>
</div>
</div>
<?php include 'inc/footer.php'; ?>