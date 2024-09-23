<?php

interface OrderInterface {
    public function output($order);
}

class Order
{
    protected $items;
    protected $outputDriver;

    public function __construct($items, OrderInterface $output) {
        $this->items = $items;
        $this->outputDriver = $output;
    }

    public function calculateTotal() {}
    public function getItemsPrice() {}

    public function format() {
        return $this->outputDriver->output([
            'price' => $this->calculateTotal(),
        ]);
    }
}

class OrderRepository
{
    public function load($orderId) {}
    public function save($order) {}
    public function update($order) {}
    public function delete($order) {}
}

class HTMLOutput implements OrderInterface {
    public function output($order)
    {
        return "<h2>This is your order: {$order->totalPrice}</h2>";
    }
}

class JsonOutput implements OrderInterface {
    public function output($order)
    {
        return json_encode($order);
    }
}

$order = new Order([50, 75, 25], new JsonOutput);
$order->calculateTotal();

$orderRepisitory = new OrderRepository();
$orderRepisitory->save($order);

$order->format();
