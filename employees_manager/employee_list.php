<?php include '../view/header.php'; ?>
<?php include '../view/admin_menu.php'?>
<main>

    <h1>Employee List</h1>

    <table id="table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Password</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($employees as $employee) : ?>
        <tr>
            <td><?php echo htmlspecialchars($employee->getFirstName()); ?></td>
            <td><?php echo htmlspecialchars($employee->getLastName()); ?></td>
            <td><?php echo htmlspecialchars($employee->getEmail()); ?></td>
            <td><?php echo htmlspecialchars($employee->getPosition()); ?></td>
            <td><?php echo htmlspecialchars($employee->getPassword()); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_employee">
                <input type="hidden" name="empID"
                       value="<?php echo htmlspecialchars($employee->getID()); ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Employee</a></p>
    <br><br>
	<?php include '../view/admin_login_status.php'?>
</main>
<?php include '../view/footer.php'; ?>