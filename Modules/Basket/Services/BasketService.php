<?php

namespace Modules\Basket\Services;

use Modules\App\Interfaces\BasketInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class BasketService
{
    protected $timeout = 360;
    protected $service;
    // protected $instance;
    // protected $cacheName;

    /**
     * Create new object of basket service
     * @param string $service : basket service is used for store basket items
     * @param string $cacheName : name of cache is set - this is useful for when we want have different type of items in basket
     * @param object $instance : model of item
     * @return bool
     */
    public function newService(BasketInterface $service , $cacheName , $instance)
    {
        $this->service          = new $service();
        $this->service->timeout = $this->timeout;
        // $this->cacheName        = $cacheName;
        // $this->instance         = $instance;
    }

    public function __call($method , $args)
    {
        if(is_callable([$this->service , $method])) {
            $this->service->$method(...$args);
        }
    }
}