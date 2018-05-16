<?php
function add_registration($employeeID, $training_code, $date) {
	global $db;
	$query = "INSERT INTO registrations
			  (employeeID, trainingCode, registrationDate)
			  VALUES
			  ($employeeID, '$training_code', '$date')";
	$db->exec($query);
}

function get_registrated_products_by_customer($customerID) {
	global $db;
	$query = "SELECT * FROM registrations
			  	INNER JOIN products
			  	ON registrations.productCode = products.productCode
			  WHERE customerID = $customerID";
	$products = $db->query($query);
	return $products;
}

?>