<?php

function get_registration() {

    global $db;
	$query = 'SELECT * FROM registrations
			  ORDER BY registrationCode';
	$registrations = $db->query($query);
	return $registrations;
}
function delete_registration($registrationCode) {
    global $db;
    $query = 'DELETE FROM registration
              WHERE registrationCode = :registrationCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':registrationCode', $registrationCode);
    $statement->execute();
    $statement->closeCursor();
}

function add_registration($empID, $trainingCode, $trainingName, $trainingDate, $trainingLocation, $firstName, $lastName, $date) {
    global $db;

    $date = date('Y-m-d'); 
    $query = 'INSERT INTO registrations (empID, trainingCode, trainingName, trainingDate, trainingLocation, firstName, lastName, date)
        VALUES
            (:empID, :trainingCode, :trainingName, :trainingDate, :trainingLocation, :firstName, :lastName, :date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':empID', $empID);
    $statement->bindValue(':trainingCode', $trainingCode);
    $statement->bindValue(':trainingName', $trainingName);
    $statement->bindValue(':trainingDate', $trainingDate);
    $statement->bindValue(':trainingLocation', $trainingLocation);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':date', $date);
 //   $statement->execute();
    $statement->closeCursor();
}
?>
