<?php include 'inc/header.php'; ?>
<?php 
Session::checkUserSession();
$userId = Session::get('userid');
?>
<style>
	.profile{width: 530px; margin: 0 auto; border: 1px solid #ddd; padding: 50px;}
</style>
<div class="main">
<h1>Your Profile</h1>
<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$userData = $usr->userUpdateData($userId,$_POST);
		}
?>
	<div class="profile">
		<?php 
		$getData = $usr->getUserData($userId);
		if ($getData) {
			$result = $getData->fetch_assoc();
		?>
<?php 
	if (isset($userData)) {
		echo $userData;
	}
?>
		<form action="" method="post">
			<table class="tbl">
				<tr>
				   <td>Name</td>
				   <td><input type="text" name="name" id="name" value="<?php echo $result['name'];?>"></td>
				 </tr>
				 <tr>
				   <td>User Name</td>
				   <td><input type="text" name="username" id="username" value="<?php echo $result['username'];?>"></td>
				 </tr>  
				 <tr>
				   <td>E-mail</td>
				   <td><input type="text" name="email" id="email" value="<?php echo $result['email'];?>"></td>
				 </tr>
				 
				  <tr>
				  <td></td>
				   <td><input type="submit" name="userUp" value="Update">
				   </td>
				 </tr>
	       </table>
	     </form>
	    <?php } ?>
    </div>
</div>
<?php include 'inc/footer.php'; ?>