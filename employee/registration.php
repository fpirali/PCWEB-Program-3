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
  		  

                        <h2>Training List</h2>
        <table>
            <tr>
                <th>Training Name</th>
                <th>Training Location</th>
                <th>Training Date</th>
                <th>Training Time</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($trainings as $training) : ?>
            <tr>
                
                <td><?php echo htmlspecialchars($training->getTrainingName()) ?></td>
                <td><?php echo htmlspecialchars($training->getTrainingLocation()); ?></td>
                 <td><?php echo htmlspecialchars($training->getTrainingDate()); ?></td>
                  <td><?php echo htmlspecialchars($training->getTrainingTime()); ?></td>               
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="select_training" />
                    <input type="hidden" name="trainingCode"
                           value="<?php echo htmlspecialchars($training->getTrainingCode()); ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php include '../view/employee_login_status.php'?>
</main>
<?php include '../view/footer.php'; ?>