<?php
class RegistrationDB {
    
    public static function add_registration($empID, $trainingCode, $trainingName, $firstName, $lastName, $date) {
	$db = Database::getDB();
	$query = "INSERT INTO registrations
			  (empID, trainingCode, trainingName, firstName, lastName, date)
			  VALUES
			  ($empID, '$trainingCode', '$trainingName', '$firstName', '$lastName', '$date')";
	$db->exec($query);
}

function get_registration_by_employee($empID) {
	global $db;
	$query = "SELECT * FROM registrations
			  	INNER JOIN products
			  	ON registrations.productCode = products.productCode
			  WHERE customerID = $customerID";
	$products = $db->query($query);
	return $products;
}
}
?>