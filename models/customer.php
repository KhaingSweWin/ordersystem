<?php
include_once __DIR__. "/../vendor/db.php";
class Customer{
    private $connection="";
    public function getCustomerList()
    {
        //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="Select * from customers";
        $statement=$this->connection->prepare($sql);

        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
    public function createNewCustomer($name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$post,$report,$credit)
    {
        //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.sql statement

        $sql="INSERT INTO customers(customerName, contactLastName, contactFirstName, phone,addressLine1,addressLine2,city,state,postalCode,country,salesRepEmployeeNumber,creditLimit)VALUES (:name,:firstname,:lastname,:phone,:address1,:address2,:city,:state,:country,:post,:report,:credit)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":name",$name);
        $statement->bindParam(':firstname',$firstname);
        $statement->bindParam(":lastname",$lastname);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(":address1",$address1);
        $statement->bindParam(':address2',$address2);
        $statement->bindParam(":city",$city);
        $statement->bindParam(':state',$state);
        $statement->bindParam(":country",$country);
        $statement->bindParam(':post',$post);
        $statement->bindParam(":report",$report);
        $statement->bindParam(':credit',$credit);

        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCustomerInfo($id)
    {
        //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.sql statement
        $sql="select customers.*,employees.* from customers join employees
        on customerNumber=:id and customers.salesRepEmployeeNumber=employees.employeeNumber ";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function updateCustomerInfo($id,$name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$post,$report,$credit)
    {
        
        //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.sql statement

        $sql="update customers set customerName=:name,contactFirstName=:firstname,contactLastName=:lastname,phone=:phone,addressLine1=:address1,addressLine2=:address2,
        city=:city,state=:state,country=:country,postalCode=:post,salesRepEmployeeNumber=:report,creditLimit=:credit where customerNumber=:id";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(':firstname',$firstname);
        $statement->bindParam(":lastname",$lastname);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(":address1",$address1);
        $statement->bindParam(':address2',$address2);
        $statement->bindParam(":city",$city);
        $statement->bindParam(':state',$state);
        $statement->bindParam(":country",$country);
        $statement->bindParam(':post',$post);
        $statement->bindParam(":report",$report);
        $statement->bindParam(':credit',$credit);
        $statement->bindParam(':id',$id);

        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function deleteCustomerInfo($id)
    {
        //1. DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="delete from customers where customerNumber=:id";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":id",$id);
        if($statement->execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }
    }
}



?>