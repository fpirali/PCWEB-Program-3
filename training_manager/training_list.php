<?php 
	include '../view/header.php'; 
?>
<main>

        <h2>Training List</h2>
        <table>
            <tr>
                <th>Training Code</th>
                <th>Training Name</th>
                <th>Location</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($trainings as $training) : ?>
            <tr>
                <td><?php echo $training['trainingCode']; ?></td>
                <td><?php echo $training['trainingName']; ?></td>
                <td><?php echo $training['location']; ?></td>
                
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_training" />
                    <input type="hidden" name="trainingCode"
                           value="<?php echo $training['trainingCode']; ?>" />
                    <input type="submit" value="Delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Training</a></p>
</main>
<?php include '../view/footer.php'; ?>
