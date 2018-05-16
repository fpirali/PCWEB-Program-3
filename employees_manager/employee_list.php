<?php 

	include '../view/header.php'; 
?>
<main>

        <h2>Employee List</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?php echo $employee['firstName']; ?></td>
                <td><?php echo $employee['lastName']; ?></td>
                <td><?php echo $employee['email']; ?></td>
                <td><?php echo $employee['phone']; ?></td>
                <td><?php echo $employee['password']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_employee" />
                    <input type="hidden" name="empID"
                           value="<?php echo $employee['empID']; ?>" />
                    <input type="submit" value="Delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Employee</a></p>
</main>
<?php include '../view/footer.php'; ?>
