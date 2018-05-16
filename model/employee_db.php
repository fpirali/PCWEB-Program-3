<?php
function get_employees() {
	global $db;
	$query = 'SELECT * FROM employees
			  ORDER BY empID';
	$employees = $db->query($query);
	return $employees;
}

function delete_employee($emp_ID) {
	global $db;
	$query = "DELETE FROM employees
			  WHERE empID = '$emp_ID'";
	$db->exec($query);
}

function add_employee($first_name, $last_name, $email, $phone, $password) {
	global $db;
	$query = "INSERT INTO employees
			 (firstName, lastName, email, phone, password)
			 VALUES
			 ('$first_name', '$last_name', '$email', '$phone', '$password')";
	$db->exec($query);
}

function update_employee($employeeID, $first_name, $last_name, $address, $city,
						 $state, $postal_code, $country_code, $phone, $email, $password) {
	global $db;
	$query = "UPDATE employee
			  SET firstName = '$first_name', lastName = '$last_name', address = '$address',
			  city = '$city', state = '$state', postalCode = '$postal_code', countryCode = '$country_code',
			  phone = '$phone', email = '$email', password = '$password'
			  WHERE employeeID = $employeeID";
	$db->exec($query);
}


function get_employee($empID) {
	global $db;
	$query = 'SELECT * FROM employees
			  WHERE empID = :empID';

		$statement = $db->prepare($query);
		$statement->bindValue(':empID', $empID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;

}

function get_employee_by_email($email) {
	global $db;
	$query = "SELECT * FROM employees
			  WHERE email = '$email'";
	$employees = $db->query($query);
	$employee = $employees->fetch();
	return $employee;
}

function is_valid_employee_login($email) {
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