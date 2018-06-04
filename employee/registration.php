<?php include '../view/header.php'; ?>
<main>

    <h2>Register for Training</h2>
<table>
        <tr>
            <th>Name</th>        
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($employees as $employee) : ?>
        <tr>
            <td><?php echo htmlspecialchars($employee->getFullName()); ?></td>         
            <td><form action="." method="post">
                <input type="hidden" name="action"
                      value="select_tech_for_incident" >
                <input type="hidden" name="techID"
                       value="<?php echo htmlspecialchars($employee->getID()); ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
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