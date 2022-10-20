<?php
// include "utilities/DatabaseManager.php";

class Job {

    private $cols = array(
        "job_id" => "ID",
        "job_title" => "Job Title",
        "min_salary" => "Min Salary",
        "max_salary" => "Max Salary"
    );
    
    //paims visus darbus
    public function index() {

        $databaseManager = new DatabaseManager();
        $jobs = $databaseManager->select('jobs');
        return $jobs;

    }

    public function cols() {
        return $this->cols;
    }

    //sukurs nauja darba
    public function createJob() {

    }


    //atnaujins darba
    public function updateJob() {

    }

    //istrinti darba
    public function deleteJob() {

    }


}

$jobsObject = new Job();