<?php
declare(strict_types=1);

namespace Core\Routing;


class Router
{
    /**
     * @var RouteCollection
     */
    private $collection;

    /**
     * Router constructor.
     *
     * @param RouteCollection $collection
     */
    public function __construct(RouteCollection $collection)
    {
        $this->collection = $collection;

        $this->boot();
    }

    public function boot()
    {
        /** @var Route $route */
        foreach ($this->collection as $route) {

        }
    }

    private function matchRoute($route)
    {

    }
}