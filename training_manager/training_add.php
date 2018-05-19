<?php 
	include '../view/header.php'; 
?>
<main>
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
        <input type="text" name="trainingDate" />
        <br />
        
        <label>Training Time:</label>
        <input type="text" name="trainingTime" />
        <br />
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Training" />
        <br />
    </form>
    <p><a href="?action=list_trainings">View Training List</a></p>
</main>
<?php include '../view/footer.php'; ?>