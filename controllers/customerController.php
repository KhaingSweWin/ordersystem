<?php
include_once __DIR__."/../models/customer.php";

class CustomerController extends Customer{

    public function getAllCustomers(){
        return $this->getCustomerList();
    }
}

?>