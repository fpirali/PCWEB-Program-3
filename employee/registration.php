<?php include '../view/header.php'; ?>
<?php include '../view/employee_menu.php'?>
<main>

    <h2>Register for Training</h2>
    <p>Account: <?php echo $_SESSION['justice_regist']['employee_email'];?></p>
            <p>Training:</p>
<table id="table">
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
                    <input type="submit" value="Register" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>

	<?php include '../view/employee_login_status.php'?>

</main>
<?php include '../view/footer.php'; ?>