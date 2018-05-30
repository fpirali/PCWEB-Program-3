<?php
    include '../view/header.php';
?>

<main>
    <h2>Admin Menu</h2>
    <ul>
  
        <li><a href="../employees_manager">Manage Employees</a></li>
        <li><a href="../training_manager">Manage Training</a></li>
        <li><a href="../registration_manager">Manage Registration</a></li>

    </ul>
	<?php include '../view/admin_login_status.php'?>
</main>
<?php include '../view/footer.php'; ?>