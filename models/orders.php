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
    
    public function createOrder($orderDate,$customerNo,array $pname,array $price,array $qty)
    {
       
       //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="insert into orders(orderDate,customerNumber) values (:orderDate,:customerNumber)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":orderDate",$orderDate);
        $statement->bindParam(":customerNumber",$customerNo);

        //3. execute
         if($statement->execute())
         {
            $lastId=$this->connection->lastInsertId();
            for($count=0;$count<sizeof($pname[0]);$count++)
            {
                $sql="insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber) values (:orderNumber,:productCode,:quantityOrdered,:priceEach,:orderLineNumber)";
                $statement=$this->connection->prepare($sql);
                $index=$count+1;
                $statement->bindParam(":orderNumber",$lastId);
                $statement->bindParam(":productCode",$pname[0][$count]);
                $statement->bindParam(":quantityOrdered",$qty[0][$count]);
                $statement->bindParam(":priceEach",$price[0][$count]);
                $statement->bindParam(":orderLineNumber",$index);
                $statement->execute();                
            }

         }
         else
        {
            var_dump("No insertion");
        }

    }
}

?>