<?php include 'inc/header.php'; ?>
<?php 
Session::checkUserLogin();
?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post" onclick="return false;">
		<table class="tbl">    
			 <tr>
			   <td>E-mail</td>
			   <td><input type="text" name="email" id="email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input type="password" name="password" id="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" id="userlogin" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span id="empty" style="color: red; display: none;">Field must not be empty</span>
	   <span id="error" style="color: red; display: none;">Email or Password Wrong</span>
	   <span id="disable" style="color: red; display: none;">User id disable</span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>