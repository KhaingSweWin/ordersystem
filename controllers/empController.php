<?php
include_once __DIR__."/../models/employee.php";

class EmployeeController extends Employee{

    public function getAllEmployees(){
        return $this->getEmployeeList();
    }
}

?>