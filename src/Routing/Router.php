<?php
declare(strict_types=1);

namespace Core\Routing;


use Core\Exception\RouteNotFoundException;

class Router
{
    /**
     * @var RouteCollection
     */
    private $collection;

    /**
     * @var string
     */
    private $path;

    /**
     * Router constructor.
     *
     * @param RouteCollection $collection
     * @param string $path
     */
    public function __construct(RouteCollection $collection, string $path)
    {
        $this->collection = $collection;
        $this->path = $path;
    }

    /**
     * @return Route
     *
     * @throws RouteNotFoundException
     */
    public function boot(): Route
    {
        /** @var Route $route */
        foreach ($this->collection as $route) {
            if ($this->matchRoute($route)) {
                return $route;
            }
        }

        throw new RouteNotFoundException($this->path);
    }

    private function matchRoute(Route $route): bool
    {
        $routeElements = explode('/', $route->getPath());
        $pathElements = explode('/', $this->path);

        unset($routeElements[0]);
        unset($pathElements[0]);

        foreach ($routeElements as $key => $routeElement) {
            if (!isset($pathElements[$key])) {
                return false;
            }

            if (!$this->comparePathElements($routeElement, $pathElements[$key])) {
                return false;
            }
        }

        return true;
    }

    private function comparePathElements(string $routeElement, string $pathElement): bool
    {
        if ($routeElement !== $pathElement) {
            if ($this->checkIfParameter($routeElement)) {
                return true;
            }
            return false;
        }

        return true;
    }

    private function checkIfParameter(string $routeElement): bool
    {
        if (strpos($routeElement, '{') === 0 &&
            strpos($routeElement, '}') === (strlen($routeElement) - 1)
        ) {
            return true;
        }

        return false;
    }
}