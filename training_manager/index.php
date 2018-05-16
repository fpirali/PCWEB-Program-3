<?php
session_start();
if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

require('../model/database.php');
require('../model/training_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_trainings';
}

if ($action == 'list_trainings') {

    $trainings = get_trainings();

    include('training_list.php');
} else if ($action == 'delete_training') {
    $training_code = $_POST['training_code'];
    delete_training($training_code);
    header("Location: .");
} else if ($action == 'show_add_form') {
    include('training_add.php');
} else if ($action == 'add_training') {
    $training_code = $_POST['trainingCode'];
    $name = $_POST['trainingName'];
    $location = $_POST['location'];
   

    // Validate the inputs
    if (empty($training_code) || empty($name) || empty($location) ) {
        $error = "Invalid training data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_training($training_code, $name, $location);
        header("Location: .");
    }
}
?>