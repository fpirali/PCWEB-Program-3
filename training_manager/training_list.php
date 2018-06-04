<?php include '../view/header.php'; ?>
<?php include '../view/admin_menu.php'?>
<main>

        <h2>Training List</h2>
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
                           value="delete_training" />
                    <input type="hidden" name="trainingCode"
                           value="<?php echo htmlspecialchars($training->getTrainingCode()); ?>" />
                    <input type="submit" value="Delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Training</a></p>
        <br><br>
	<?php include '../view/admin_login_status.php'?>
        
</main>
<?php include '../view/footer.php'; ?>
