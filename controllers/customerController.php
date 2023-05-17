<?php
include_once __DIR__."/../models/customer.php";

class CustomerController extends Customer{

    public function getAllCustomers(){
        return $this->getCustomerList();
    }
    public function addNewCustomer($name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$post,$report,$credit){
        return $this->createNewCustomer($name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$post,$report,$credit);
    }
}

?>