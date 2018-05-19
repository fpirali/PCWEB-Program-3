<?php
session_start();
if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

require('../model/database_oo.php');
require('../model/database.php');
require('../model/training_db.php');
require('../model/training.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_trainings';
    }
}

switch($action) {
    
case 'list_trainings':
    $trainings = TrainingDB::getTrainings();
    include('training_list.php');
    break;
case 'delete_training':
    $trainingCode = $_POST['trainingCode'];
    TrainingDB::deleteTraining($trainingCode);
    header("Location: .");
    break;
case 'show_add_form':
		include('training_add.php');
		break;
 
case 'add_training':
    
     $trainingName = filter_input(INPUT_POST, 'trainingName');
     $trainingLocation = filter_input(INPUT_POST, 'trainingLocation');
     $trainingDate = filter_input(INPUT_POST, 'trainingDate');
     $trainingTime = filter_input(INPUT_POST, 'trainingTime');

    // Validate the inputs
    if ( empty($trainingName) || empty($trainingLocation) || empty($trainingDate) || empty($trainingTime)) {
        $error = "Invalid training data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $t = new Training( $trainingName, $trainingLocation, $trainingDate, $trainingTime);
        TrainingDB::addTraining($t);
        header("Location: .");
    }

}
?>