<?php include '../view/header.php'; ?>

<main>
    <h2>Registration Confirmation</h2>
    <p>  You registered successfully for this training <?php echo $trainingName; ?>.</p>
</main>
<p><a href="?action=show_registration">Training List</a></p>
<br><br>
<?php include '../view/employee_login_status.php'?>
<?php include '../view/footer.php'; ?>