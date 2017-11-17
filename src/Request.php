<?php
declare(strict_types=1);

namespace Core;


class Request
{
    /**
     * @var array
     */
    private $query;

    /**
     * @var array
     */
    private $request;

    /**
     * @var array
     */
    private $server;

    /**
     * Request constructor.
     *
     * @param array $query
     * @param array $request
     * @param array $server
     */
    public function __construct(array $query, array $request, array $server)
    {
        $this->query = $query;
        $this->request = $request;
        $this->server = $server;
    }

    /**
     * @return Request
     */
    public static function create(): self
    {
        $request = new self($_GET, $_POST, $_SERVER);

        return $request;
    }

    /**
     * @return string
     */
    public function getPathInfo(): string
    {
        return $this->server['PATH_INFO'] ?? '/';
    }
}