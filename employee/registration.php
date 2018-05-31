<?php 
	include '../view/header.php'; 
?>

<main>

    <h2>Register for Training</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
<!--        <form action="" method="post" id="aligned">
            <input type="hidden" name="action" value="registration">-->

            <label>Employee:</label>
            <?php foreach ($employees as $employee) : ?>
            <label><?php echo htmlspecialchars($employee->getFullName()); ?></label>
                   
            <br>
            <?php endforeach; ?>
            <label>Training:</label>
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
                           value="registration" />
                    <input type="hidden" name="trainingCode"
                           value="<?php echo htmlspecialchars($training->getTrainingCode()); ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
<!--            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Register">
        </form>-->
    <?php endif; ?>
	<?php include '../view/employee_login_status.php'?>

</main>
<?php include '../view/footer.php'; ?>