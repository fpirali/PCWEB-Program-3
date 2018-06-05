<?php include '../view/header.php'; ?>
<?php include '../view/admin_menu.php'?>
<main>

    <h1>Employee List</h1>

    <table id="table">
        <tr>
            <th>Training Name</th>
            <th>Training Date</th>
            <th>Training Location</th>
            <th>Employee First Name</th>
            <th>Employee Last Name</th> 
            <th>Date Registered</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($registrations as $registration) : ?>
        <tr>
             <td><?php echo $registration['trainingName']; ?></td>
                <td><?php echo $registration['trainingDate']; ?></td>
                <td><?php echo $registration['trainingLocation']; ?></td>
                <td><?php echo $registration['firstName']; ?></td>
                <td><?php echo $registration['lastName']; ?></td>
                 <td><?php echo $registration['date']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_registration">
                <input type="hidden" name="registrationCode"
                       value="<?php echo $registration['registrationCode']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
<br><br>
<?php include '../view/admin_login_status.php'?>
</main>
<?php include '../view/footer.php'; ?>
