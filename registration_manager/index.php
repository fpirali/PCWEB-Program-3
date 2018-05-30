<?php
session_start();

require('../model/database_oo.php');
require('../model/database.php');
require('../model/registration_db.php');
require('../model/registration.php');

if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_registration';
    }
}

switch($action) {
	case 'list_registration':
		$registrations = get_registration();
		include('registration_list.php');
		break;
	case 'delete_registration':
            $regID = filter_input(INPUT_POST, 'regID');
//		$emp_ID = $_POST['empID'];
		delete_registration($regID);
		header("Location: .");
		break;
}

?>