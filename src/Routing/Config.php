<?php
declare(strict_types=1);

namespace Core\Routing;


class Config
{
    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $method;

    /**
     * Config constructor.
     *
     * @param string $controller
     * @param string $method
     */
    public function __construct(string $controller, string $method)
    {
        $this->controller = $controller;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}