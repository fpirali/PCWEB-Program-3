<?php 
	include '../view/header.php'; 
?>

<main>

    <h2>Register for Training</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
        <form action="" method="post" id="aligned">
            <input type="hidden" name="action" value="registration">
            <input type="hidden" name="empID"
                       value="<?php echo htmlspecialchars($employee->getID()); ?>">

            <label>Employee:</label>
            <?php foreach ($employees as $employee) : ?>
            <label><?php echo htmlspecialchars(
                   $employee->getFirstName() . ' ' . $employee->getLastName()); ?></label>
                   
            <br>
            <?php endforeach; ?>
            <label>Training:</label>
            <select name="trainingCode">
            <?php foreach ($trainings as $training) : ?>
                <option value="<?php echo htmlspecialchars($training->getTrainingCode()); ?>">
                    <?php echo htmlspecialchars($training->getTrainingName()); ?>
                    <?php echo htmlspecialchars($training->getTrainingLocation());?>
                    <?php echo htmlspecialchars($training->getTrainingDate()); ?>
                    <?php echo htmlspecialchars($training->getTrainingTime()); ?>                    
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Register">
        </form>
    <?php endif; ?>
	<?php include '../view/employee_login_status.php'?>

</main>
<?php include '../view/footer.php'; ?>