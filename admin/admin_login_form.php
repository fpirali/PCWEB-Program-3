<?php  include '../view/header.php';?>

<main>
		<h2>Admin Login</h2>  
		<form action="." method="post">
	  		 <input type="hidden" name="action" value="login_administrator" />
	  		 <label>Username:</label>
	  		 <input type="text" name="username" />
	  		 <br />
	  		 
	  		 <label>Password:</label>
	  		 <input type="password" name="password" />
	  		 <br />
	  		 
	  		 <label></label>
	   		 <input type="submit" value="Login" />
   		  <br />   
		</form>
                 <br><br><?php if(!empty($error_message)) { ?>
            <h2 class="error"><?php echo ($error_message); ?></h2>
            <?php } ?> <br>
</main>
<?php include '../view/footer.php'; ?>
