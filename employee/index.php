<?php
session_start();
if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

require('../model/database.php');
require('../model/employee_db.php');
require('../model/training_db.php');
require('../model/registration_db.php');

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
		if (is_valid_employee_login($username) AND $password == "sesame") {
			$_SESSION['justice_regist']['is_valid_employee'] = true;
			$_SESSION['justice_regist']['employee_email'] = $username;
			$customer = get_employee_by_email($_SESSION['justice_regist']['employee_email']);
			$trainings = get_trainings();
			include('registration.php');
		} else {
			include('employee_login.php');
		}
		break;
	case 'show_registration':
		$customer = get_employee_by_email($_SESSION['justice_regist']['employee_email']);
		$products = get_trainings();
		include('registration.php');
		break;
	case 'registration':
		$employeeID = $_POST['employeeID'];
		$training_code = $_POST['trainingCode'];
		$date = date('Y-m-d');
		add_registration($employeeID, $training_code, $date);
		include('registration_confirmation.php');
		break;
	case 'logout_employee':
		unset($_SESSION['justice_regist']['employee_email']);
		unset($_SESSION['justice_regist']['is_valid_employee']);
		include('employee_login.php');
		break;
}
?>