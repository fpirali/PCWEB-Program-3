<?php 
	include '../view/header.php'; 
?>
<main>
		<h2>Employee Login</h2>  
		<form action="." method="post">
	  		 <input type="hidden" name="action" value="login_employee" />
	  		 <p>You must login before you can register for trainings.</p>
	  		 
	  		 <label>Email:</label>
	  		 <input type="text" name="email" />
	  		 <br />
	  		 
	  		 <label>Password:</label>
	  		 <input type="password" name="password" />
	  		 <br />
	  		 
	   		 <input type="submit" value="Login" />
   		 <br />   
		</form>
</main>
<?php include '../view/footer.php'; ?>