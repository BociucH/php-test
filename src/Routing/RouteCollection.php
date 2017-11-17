<?php
declare(strict_types=1);

namespace Core\Routing;


use ArrayIterator;

class RouteCollection implements \IteratorAggregate
{
    /**
     * @var Route[]
     */
    private $routes;

    /**
     * @param Route $route
     */
    public function add(Route $route): void
    {
        $this->routes[$route->getName()] = $route;
    }

    /**
     * @param string $routeName
     *
     * @return Route|null
     */
    public function get(string $routeName): ?Route
    {
        return array_key_exists($routeName, $this->routes) ? $this->routes[$routeName] : null;
    }

    /**
     * @inheritdoc
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->routes);
    }
}