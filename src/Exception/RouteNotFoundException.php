<?php
declare(strict_types=1);

namespace Core\Exception;


class RouteNotFoundException extends \Exception
{
    public function __construct(string $path)
    {
        parent::__construct("Path: $path not found");
    }
}