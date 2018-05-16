<?php
session_start();
if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

require('../model/database.php');
require('../model/employee_db.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'list_employees';
}

switch($action) {
	case 'list_employees':
		$employees = get_employees();
		include('employee_list.php');
		break;
	case 'delete_employee':
		$emp_ID = $_POST['empID'];
		delete_employee($emp_ID);
		header("Location: .");
		break;
	case 'show_add_form':
		include('employee_add.php');
		break;
	case 'add_employees':
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		// Validate the inputs
		if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password)) {
//			$error = "Invalid employee data. Check all fields and try again.";
			include('../errors/error.php');
		} else {
			add_employee($first_name, $last_name, $email, $phone, $password);
			header("Location: .");
		}
		break;
}

?>