<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>
<style>
	.adminpanel{width: 480px;margin: 20px auto 0; padding: 10px; border: 1px solid #ddd;color: #999;}
</style>
<div class="main">
<h1>Admin Panel</h1>
<div class="adminpanel">
	<h2>Welcome to Control Panel</h2>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>