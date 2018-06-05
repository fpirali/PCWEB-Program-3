<?php include '../view/header.php';?>
<?php include '../view/admin_menu.php'?>

<main >
    <h1>Add Employee</h1><br><br>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_employees" />

        <label>First Name:</label>
        <input type="text" name="first_name" />
        <br />

        <label>Last Name:</label>
        <input type="text" name="last_name" />
        <br />

        <label>Email:</label>
        <input type="text" name="email" />
        <br />

        <label>Position:</label>
        <input type="text" name="position" />
        <br />
        
        <label>Password:</label>
        <input type="text" name="password" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Add Employee" />
        <br />
    </form>
     <br><br><?php if(!empty($error_message)) { ?>
            <h2 class="error"><?php echo ($error_message); ?></h2>
            <?php } ?> <br>
    <p><a href="?action=list_employees">View Employee List</a></p>
    <br><br>
	<?php include '../view/admin_login_status.php'?>
</main>

<?php include '../view/footer.php'; ?>