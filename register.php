<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="post" onclick="return false;">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="name" id="name" placeholder="Enter Name"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input type="text" name="username" id="username" placeholder="Enter User Name"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password" id="password" placeholder="Enter Password"></td>
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input type="text" name="email" id="email" placeholder="Enter Email"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" name="Submit" id="regSubmit" value="Sign Up">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
     <span style="color: red;" id="msg"></span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>