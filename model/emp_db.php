<?php
function get_employee_by_email($email) {
	global $db;
	$query = "SELECT * FROM employees
			  WHERE email = '$email'";
	$employees = $db->query($query);
	$employee = $employees->fetch();
	return $employee;
}
function is_valid_employee_login($email, $password) {
	global $db;
	$query = 'SELECT * FROM employees
              WHERE email = :email';

		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->execute();
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		return $valid;

}
?>

