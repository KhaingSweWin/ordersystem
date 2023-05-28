<?php
include_once __DIR__."/../vendor/db.php";

class Order{
    private $connection=null;
    public function getOrderList()
    {
        //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="Select orders.*, customers.customerName from orders join customers 
        on orders.customerNumber=customers.customerNumber";
        $statement=$this->connection->prepare($sql);

        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>