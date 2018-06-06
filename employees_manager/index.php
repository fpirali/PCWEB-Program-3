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
                $options = ['cost' => 11];
		 $first_name = filter_input(INPUT_POST, 'first_name');
                $last_name = filter_input(INPUT_POST, 'last_name');
                $position = filter_input(INPUT_POST, 'position');
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password');
                
        if ($first_name === '') {
            $error_message = 'You must enter First name';
        } else if ($last_name === '') {
            $error_message = 'You must enter Last name';
        } else if ($position === '') {
            $error_message = 'You must enter UserName';
        } else if ($email === FALSE) {
            $error_message = 'You must enter Email';
        } else if ($password === '') {
            $error_message = 'Must create a password';
                } else {
                   $error_message = '';
                    $password = password_hash($password, PASSWORD_DEFAULT, $options);
                    $e = new Employee($first_name, $last_name, $email, $position, $password);
                    EmployeeDB::addEmployee($e);
                    $_SESSION['email'] = $email;
                    
                    
                    header("Location: .");
                }
            if ($error_message != '') {
            include('employee_add.php');
            exit();
            die();
        }
                break;
}

?>
