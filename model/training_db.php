<?php
function get_trainings() {
	global $db;
	$query = 'SELECT * FROM trainings
			  ORDER BY trainingCode';
	$trainings = $db->query($query);
	return $trainings;
}

function delete_training($training_code) {
	global $db;
	$query = "DELETE FROM trainings
			  WHERE trainingCode = '$training_code'";
	$db->exec($query);
}

function add_training($training_code, $name, $location) {
	global $db;
	$query = "INSERT INTO trainings
			  (trainingCode, trainingName, location)
			  VALUES
			  ('$training_code', '$name', '$location')";
	$db->exec($query);
}
?>