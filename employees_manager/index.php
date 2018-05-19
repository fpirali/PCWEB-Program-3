<?php
session_start();

require('../model/database_oo.php');
require('../model/database.php');
require('../model/employee_db.php');
require('../model/employee.php');

if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_employees';
    }
}

switch($action) {
	case 'list_employees':
		$employees = EmployeeDB::getEmployees();
		include('employee_list.php');
		break;
	case 'delete_employee':
            $emp_ID = filter_input(INPUT_POST, 'empID', FILTER_VALIDATE_INT);
             EmployeeDB::deleteEmployee($emp_ID);
//		$emp_ID = $_POST['empID'];
//		delete_employee($emp_ID);
		header("Location: .");
		break;
	case 'show_add_form':
		include('employee_add.php');
		break;
	case 'add_employees':
		 $first_name = filter_input(INPUT_POST, 'first_name');
                $last_name = filter_input(INPUT_POST, 'last_name');
                $position = filter_input(INPUT_POST, 'position');
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password');


                 if (empty($first_name) || empty($last_name) || empty($position) || 
                 $email === NULL || $email === FALSE || empty($password)) {
                        $error = "Invalid employee data. Check all fields and try again.";
                        include('../errors/error.php');
                } else {
                    // Create technician object
                    $e = new Employee($first_name, $last_name, $email, $position, $password);
                    EmployeeDB::addEmployee($e);
                    header("Location: .");
                }
                break;
}

?>