<?php 
class Departament {
    private $col = array(
        "department_id" => "ID",
        "department_name" => "Department Name",
        "location_id" => "Location ID"
    );

    public function index() {
        $databaseManager = new DatabaseManager();
        $departaments = $databaseManager->select('departments');
        return $departaments;
    } 
    
}

$departmentsObject = new Departament();