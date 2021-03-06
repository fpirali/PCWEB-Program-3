<?php
session_start();
if (empty($_SESSION['justice_regist'])) $_SESSION['justice_regist'] = array();

require('../model/database.php');
require('../model/admin_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_admin_menu';
    }
}
if (!isset($_SESSION['justice_regist']['is_valid_admin'])) {
	$action = 'login_administrator';
}

switch($action) {
	case 'login_administrator':
		if (isset($_POST['username']) AND isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
		}
		if (is_valid_admin_login($username, $password)) {
			$_SESSION['justice_regist']['is_valid_admin'] = true;
			$_SESSION['justice_regist']['admin_username'] = $username;
			include('admin_menu.php');
		} else {
                        $error_message = 'Invalid username or password! Try again';
                        include('admin_login_form.php');
		}
		break;
	case 'show_admin_menu':
		include('admin_menu.php');
		break;
	case 'logout_administrator':
		unset($_SESSION['justice_regist']['is_valid_admin']);
		unset($_SESSION['justice_regist']['admin_username']);
		include('admin_login_form.php');
		break;
} 
?>
