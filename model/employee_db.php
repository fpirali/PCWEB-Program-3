<?php
class EmployeeDB {

    public static function getEmployees() {
        $db = Database::getDB();

        $query = 'SELECT * FROM employees
                  ORDER BY lastName';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $employees = array();
        foreach($rows as $row) {
            $t = new Employee(
                    $row['firstName'], $row['lastName'],
                    $row['email'], $row['position'], $row['password']);
            $t->setID($row['empID']);
            $employees[] = $t;
        }
        return $employees;
    }

    public static function deleteEmployee($employee_id) {
        $db = Database::getDB();

        $query = 'DELETE FROM employees
                 WHERE empID = :employee_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':employee_id', $employee_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function addEmployee($t) {
        $db = Database::getDB();
        
        $query = 'INSERT INTO employees
                     (firstName, lastName, email, position, password)
                  VALUES
                     (:first_name, :last_name, :email, :position, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $t->getFirstName());
        $statement->bindValue(':last_name', $t->getLastName());
        $statement->bindValue(':email', $t->getEmail());
         $statement->bindValue(':position', $t->getPosition());
        $statement->bindValue(':password', $t->getPassword());
        $statement->execute();
        $statement->closeCursor();
    }
    public static function getEmployee($empID) {
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

}
?>