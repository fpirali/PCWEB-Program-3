<p>You are logged in as <?php echo $_SESSION['justice_regist']['employee_email'];?></p>
	<form action="../employee/index.php" method="post">
	<input type="hidden" name="action" value="logout_employee" />
	<input type="submit" value="Logout" />
</form>