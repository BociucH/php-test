<?php
declare(strict_types=1);

namespace Core\Routing;


use ArrayIterator;
use Traversable;

class RouteCollection implements \IteratorAggregate
{
    /**
     * @var Route[]
     */
    private $items;

    /**
     * @param Route $route
     */
    public function add(Route $route): void
    {
        $this->items[$route->getName()] = $route;
    }

    /**
     * @param string $routeName
     *
     * @return Route|null
     */
    public function get(string $routeName): ?Route
    {
        return array_key_exists($routeName, $this->items) ? $this->items[$routeName] : null;
    }

    /**
     * @inheritdoc
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}