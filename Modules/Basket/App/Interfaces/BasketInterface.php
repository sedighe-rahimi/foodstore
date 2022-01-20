<?php
namespace Modules\Basket\App\Interfaces;

interface BasketInterface
{
    public function add($cacheName , $instance , $dataArray);
    public function all($cacheName);
    public function addCount($cacheName , $id);
    public function decreaseCount($cacheName , $id , $decCount = 1);
    public function get($cacheName , $id);
    public function deleteBasket($cacheName);
    public function isValid($cacheName , $instance);
    public function setAgain($cacheName , $instance);
}