<?php include '../view/header.php'; ?>
<?php include '../view/admin_menu.php'?>
<main id='aligned'>
    <h1>Add Training</h1>
    <form action="" method="post" >
        <input type="hidden" name="action" value="add_training" />

        <label>Training Name:</label>
        <input type="text" name="trainingName" />
        <br />

        <label>Training Location:</label>
        <input type="text" name="trainingLocation" />
        <br />
        
        <label>Training Date:</label>
        <input type="text" name="trainingDate" /><label>&nbsp;yyyy-mm-dd</label>
        <br />
        
        <label>Training Time:</label>
        <input type="text" name="trainingTime" /><label>&nbsp;HH:MM AM/PM</label>
        <br />
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Training" />
        <br />
    </form><br><br>
    <p><a href="?action=list_trainings">View Training List</a></p>
    <br><br>
	<?php include '../view/admin_login_status.php'?>
</main>
<?php include '../view/footer.php'; ?>
