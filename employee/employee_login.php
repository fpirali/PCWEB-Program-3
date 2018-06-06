<?php include '../view/header.php'; ?>
<main>
		<h2>Employee Login</h2>  
		<form action="." method="post">
	  		 <input type="hidden" name="action" value="login_employee" />
	  		 <p>You must login before you can register for training.</p>
	  		 
	  		 <label>Email:</label>
	  		 <input type="text" name="email" />
	  		 <br />
	  		 
	  		 <label>Password:</label>
	  		 <input type="password" name="password" />
	  		 <br />
	  		 
	   		 <input type="submit" value="Login" />
   		 <br />   
                </form><br><br>
                <br><br><?php if(!empty($error_message)) { ?>
                 <h2 class="error"><?php echo ($error_message); ?></h2>
                <?php } ?> <br>
                <p>Don't have account? Click below to register</p><br>
                <p><a href="employee_registration.php">Register</a></p>
</main>
<?php include '../view/footer.php'; ?>