<?php
class Order
{
    public $order_status;

    public function createOrder()
    {
        $this->order_status = 'Order Created';
        return $this; // important
    }

    public function sendOrderEmail()
    {
        $this->order_status = 'Email Sent';
        return $this;
    }

    public function createShipment()
    {
        $this->order_status = 'Shipment Created';
        return $this;
    }
}
$a = new Order();
$a->createOrder();
var_dump($a);
$a->createOrder()->sendOrderEmail();
var_dump($a);
$a->createOrder()->sendOrderEmail()->createShipment();
$a->sendOrderEmail()->createShipment();
var_dump($a->order_status);
?>