<?php 

include "utilities/DatabaseManager.php";


class Employee {



    private $cols = array(
        "employee_id" => "ID",
        "first_name" => "First Name",
        "last_name" => "Last Name",
        "email" => "Email",
        "phone_number" => "Phone Number",
        "hire_date" => "Hire Date",
        "job_id" => "Job ID",
        "salary" => "Salary",
        "manager_id" => "Manager ID",
        "department_id" => "Department ID"
    );

    //uz duomenu gavima
    public function index() {
        //1. select uzklausa i duomenu baze
        //2. grazina rezultata
        //3. atvaizduojamas pages/employees.php

        //prie duombazes atsidaro
        $databaseManager = new DatabaseManager();
        $employees = $databaseManager->select('employees');


        // $jobs = new Job;
        // $jobs = $jobs->index();
        
        return $employees;
    }

    public function cols() {
        return $this->cols;
    }


    //uz duomenu sukurima
    public function createEmployee() {
        //visus kintamuosius kuriuos paduoda POST metodas
        if(isset($_POST["create"])) {
            $data = $_POST;
            unset($data["create"]);
            unset($data["page"]);

            $cols = array_keys($data);
            $values = array_values($data);

            $databaseManager = new DatabaseManager();
            $databaseManager->insert('employees', $cols, $values);

            header("Location: index.php?page=employees");
            exit();
        }
        
    }

    //uz duomenu redagavima
    public function updateEmployee() {

    }

    //uz duomenu istrynima
    public function deleteEmployee() {
        if(isset($_POST["page"]) && $_POST["page"] == "employees") {
            if(isset($_POST["delete"])) {
                $databaseManager = new DatabaseManager();
                $databaseManager->delete('employees', 'employee_id', $_POST["delete"]);//mygtuko reiksme
                header("Location: index.php?page=employees");
                exit();
            }
        }
    }

}

$employeesObject = new Employee();