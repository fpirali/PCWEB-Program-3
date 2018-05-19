<?php 
	include '../view/header.php'; 
?>
<main>
		<h2>Register Product</h2>  
		<form action="." method="post">
  			<input type="hidden" name="action" value="registration" />
  			<input type="hidden" name="empID" 
  				   value="<?php echo $employee['empID']; ?>" />
  			
  			<label>Employee:</label>
  			<label><?php echo $employee['firstName']." ".$employee['lastName']; ?></label>
  			<br />
  		  
  			<label>Training:</label>
  		 	<select name="trainingCode">
                <?php foreach ($trainings as $training) : ?>
                    <option value="<?php echo $training['trainingCode']; ?>">
                        <?php echo $training['trainingName'] .' '. $training['trainingDate']; ?>
                    </option>
                <?php endforeach; ?>
        	</select>
      		<br />  	
      
      		<label></label>
   		 	<input type="submit" value="Register" />
   		 	<br />   
		</form>
		<?php include '../view/employee_login_status.php'?>
</main>
<?php include '../view/footer.php'; ?>