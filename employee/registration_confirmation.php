<?php include '../view/header.php'; ?>
<?php include '../view/employee_menu.php'?>

<main>
    <h2>Registration Confirmation</h2>
    <p>You registered successfully for this training <?php echo $trainingName; ?>.</p><br><br><br>
    
    <p><a href="?action=show_registration">Training List</a></p>
    <br><br>
    <?php include '../view/employee_login_status.php'?>
</main>

<?php include '../view/footer.php'; ?>