<?php
session_start();

if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

require('../model/database_oo.php');
require('../model/database.php');
require('../model/emp_db.php');
require('../model/employee.php');
require('../model/employee_db.php');
require('../model/training_db.php');
require('../model/registration_db.php');
require('../model/training.php');
require('../model/registration.php');

if (!isset($_SESSION['justice_regist']['is_valid_employee'])) {
	$action = 'login_employee';
}

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_employee';
    }
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
                        $employees = EmployeeDB::getEmployees();
			include('registration.php');
		} else {
			include('employee_login.php');
		}
		break;
	case 'employee_registeration':
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
                        $error_message = 'You must enter Position';
                    } else if ($email === '') {
                        $error_message = 'You must enter Email';
                    } else if ($email !== $_SESSION['email']){
                        $resultEmail =  EmployeeDB::checkEmail($email);
                        if ($resultEmail === "1") {
                            $error_message = 'Email already in Use';
                        }
                     
                } else {                  
                    $error_message = '';
                    $password = password_hash($password, PASSWORD_DEFAULT, $options);
                    $e = new Employee($first_name, $last_name, $email, $position, $password);
                    $_SESSION['email'] = $email;
                   
                    EmployeeDB::addEmployee($e);
                    header("Location: .");
                    include('registration.php');
                    exit();
                     die();
                }
                include('employee_registration.php');
              
                break;
                        
//	case 'show_registration':
//               $trainings = TrainingDB::getTrainings();
//		$employee = get_employee_by_email($_SESSION['justice_regist']['employee_email']);
//		include('registration.php');
//		break;
//        case 'select_training':
//                $employees = EmployeeDB::getEmployees();
//                $_SESSION['justice_regist']['empID'] = $_POST['trainingCode']; 
//                break;
	case 'registration':
             $employees = EmployeeDB::getEmployees();
            $trainings = TrainingDB::getTrainings();
//		$employee = $_SESSION['employee'];
                $empID = filter_input(INPUT_POST, 'employeeCode');
                $trainingCode = filter_input(INPUT_POST, 'trainingCode');
                $trainingName = filter_input(INPUT_POST, 'trainingName');
                $trainingDate = filter_input(INPUT_POST, 'trainingDate');
                $trainingLocation = filter_input(INPUT_POST, 'trainingLocation');
                $firstName = filter_input(INPUT_POST, 'firstName');
                $lastName = filter_input(INPUT_POST, 'lastName');
                $date = filter_input(INPUT_POST, 'date');
		$date = date('Y-m-d');
		add_registration($empID, $trainingCode, $trainingName, $trainingDate, $trainingLocation, $firstName, $lastName, $date);
		include('registration_confirmation.php');
		break;
        case 'show_registration':
             $employees = EmployeeDB::getEmployees();
        if (!isset($_SESSION['employee'])) {
            $email = filter_input(INPUT_POST, 'email');
            $employee = get_employee_by_email($email);
            $_SESSION['employee'] = $employee;
        }else{
        $employee = $_SESSION['employee'];
        $trainings = TrainingDB::getTrainings();
        include('registration.php');
        }
        break;
//    case 'registration':
//        $employee = $_SESSION['employee'];
//        $employee = filter_input(INPUT_POST, 'employeeCode');
//        $trainingCode = filter_input(INPUT_POST, 'trainingCode');
//        $trainingName = filter_input(INPUT_POST, 'trainingName');
//        $trainingDate = filter_input(INPUT_POST, 'trainingDate');
//        $trainingLocation = filter_input(INPUT_POST, 'trainingLocation');
//        $firstName = filter_input(INPUT_POST, 'firstName');
//        $lastName = filter_input(INPUT_POST, 'lastName');
//        $date = filter_input(INPUT_POST, 'date');
//
//        add_registration($employee['employeeCode'], $trainingCode, $trainingName, $trainingDate, $trainingLocation, $firstName, $lastName, $date);
////        $message = "Training ($trainingCode) was registered successfully.";
//        include('registration_confirmation.php');
//        break;

    case 'logout_employee':
	unset($_SESSION['justice_regist']['employee_email']);
	unset($_SESSION['justice_regist']['is_valid_employee']);
	include('employee_login.php');
	break;
    case 'employee_profile':
        include('employee_profile.php');
}
?>