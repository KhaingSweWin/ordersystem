<?php
include_once __DIR__. "/../vendor/db.php";
class Employee{
    private $connection="";
    public function getEmployeeList()
    {
        //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="Select * from employees";
        $statement=$this->connection->prepare($sql);

        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}



?>