<?php
declare(strict_types=1);

namespace Core\Routing;


class Route
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $path;

    /**
     * @var Config
     */
    private $config;

    /**
     * Route constructor.
     *
     * @param string $name
     * @param string $path
     * @param Config $config
     */
    public function __construct(string $name, string $path, Config $config)
    {
        $this->name = $name;
        $this->path = $path;
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }
}