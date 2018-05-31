<?php

function get_registration() {
//	$query = 'SELECT * FROM registrations
//                  ORDER BY registrationCode';
//        $statement = $db->prepare($query);
//        $statement->execute();
//        $rows = $statement->fetchAll();
//        $statement->closeCursor();
//        
//        $registration = array();
//        foreach($rows as $row) {
//            $t = new Employee(
//                    $row['trainingName'],['trainingDate'],['trainingLocation'],['firstName'], $row['lastName'],
//                    $row['date']);
//            $t->setID($row['registrationCode']);
//            $registration[] = $t;
//        }
//        return $registration;
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
// function add_registration($empID, $trainingCode, $trainingName, $trainingDate, $trainingLocation, $firstName, $lastName, $date) {
//	global $db;
//	$query = "INSERT INTO registrations
//			  (empID, trainingCode, trainingName, trainingDate, registrationDate, trainingLocation, firstName, lastName, date)
//			  VALUES
//			  ($empID, '$trainingCode','$trainingName', '$trainingDate', '$trainingLocation','$firstName','$lastName','$date')";
//	$db->exec($query);
//}

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
//    $statement->execute();
    $statement->closeCursor();
}
?>