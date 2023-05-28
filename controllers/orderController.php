<?php
include_once __DIR__."/../models/orders.php";

class OrderController extends Order{
    public function getAllOrders()
    {
        return $this->getOrderList();
    }
}


?>