<?php
class TrainingDB {
    public static function getTrainings() {
	$db = Database::getDB();
	$query = 'SELECT * FROM trainings
			  ORDER BY trainingName';
	$statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
         $trainings = array();
        foreach($rows as $row) {
            $t = new Training(
                    $row['trainingName'],
                    $row['trainingLocation'], $row['trainingDate'], $row['trainingTime']);
            $t->setTrainingCode($row['trainingCode']);
            $trainings[] = $t;
        }
        return $trainings;
}

 public static function deleteTraining($trainingCode) {
	$db = Database::getDB();
	$query = "DELETE FROM trainings
			  WHERE trainingCode = '$trainingCode'";
	$db->exec($query);
}

public static function addTraining($t) {
	$db = Database::getDB();
       
        $query = 'INSERT INTO trainings 
                     (trainingName, trainingLocation, trainingDate, trainingTime)
                  VALUES
                     (:trainingName, :trainingLocation, :trainingDate, :trainingTime)';
        $statement = $db->prepare($query);
 
        $statement->bindValue(':trainingName', $t->getTrainingName());
        $statement->bindValue(':trainingLocation', $t->getTrainingLocation());
        $statement->bindValue(':trainingDate', $t->getTrainingDate());
        $statement->bindValue(':trainingTime', $t->getTrainingTime());
        $statement->execute();
        $statement->closeCursor();
}
//public static function getTraining() {
//	$db = Database::getDB();
//	$query = 'SELECT * FROM trainings
//		  WHERE trainingCode = :trainingCode';
//	
//		$statement = $db->prepare($query);
//		$statement->bindValue(':trainingCode', $trainingCode);
//		$statement->execute();
//		$result = $statement->fetch();
//		$statement->closeCursor();
//		return $result;
//	 
//}
}
?>