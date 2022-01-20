<?php
namespace Modules\Basket\Facades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class basket
 * @method static basket add(string $cacheName , collection $instance , array $dataArray)
 * @method static basket all(string $cacheName)
 * @method static basket get(string $cacheName , int $id)
 * @method static basket deleteBasket(string $cacheName)
 * @method static basket addCount(string $cacheName , int $id)
 * @method static basket decreaseCount(string $cacheName , int $decCount = 1 , array $dataArray)
 * @method static basket isValid(string $cacheName , collection $instance)
 * @method static basket setAgain(string $cacheName , collection $instance)
 */
class BasketCache extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'basketCache';
    }
}
