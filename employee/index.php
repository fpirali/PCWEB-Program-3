<?php
session_start();

if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

require('../model/database_oo.php');
require('../model/database.php');
require('../model/emp_db.php');
require('../model/employee_db.php');
require('../model/training_db.php');
require('../model/registration_db.php');
require('../model/training.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'show_registration';
}

if (!isset($_SESSION['justice_regist']['is_valid_employee'])) {
	$action = 'login_employee';
}

switch($action) {
	case 'login_employee':
		if (isset($_POST['email']) AND isset($_POST['password'])) {
			$username = $_POST['email'];
			$password = $_POST['password'];
		}
		if (is_valid_employee_login($username, $password)) {
			$_SESSION['justice_regist']['is_valid_employee'] = true;
			$_SESSION['justice_regist']['employee_email'] = $username;
			$employee = get_employee_by_email($_SESSION['justice_regist']['employee_email']);
			$trainings = TrainingDB::getTrainings();
			include('registration.php');
		} else {
			include('employee_login.php');
		}
		break;
	case 'show_registration':
               $trainings = TrainingDB::getTrainings();
		$employee = get_employee_by_email($_SESSION['justice_regist']['employee_email']);
		//$trainings = TrainingDB::getTrainings();
		include('registration.php');
		break;
        case 'select_training':
                $employees = EmployeeDB::getEmployees();
                $_SESSION['justice_regist']['empID'] = $_POST['trainingCode'];
              //  $message = "This incident was added to our database.";
                include('select_tech_for_incident.php');        
                break;
	case 'registration':
		$empID = $_POST['empID'];
		$trainingCode = $_POST['trainingCode'];
		$date = date('Y-m-d');
		add_registration($empID, $trainingCode, $trainingName, $firstName, $lastName, $date);
		include('registration_confirmation.php');
		break;
	case 'logout_employee':
		unset($_SESSION['justice_regist']['employee_email']);
		unset($_SESSION['justice_regist']['is_valid_employee']);
		include('employee_login.php');
		break;
}
?>