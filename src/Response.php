<?php
declare(strict_types=1);

namespace Core;


class Response
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var int
     */
    private $status;

    /**
     * Response constructor.
     *
     * @param string $content
     * @param int $status
     */
    public function __construct(string $content, int $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }

    public function send(): void
    {
        $this->sendHeaders();
        $this->sendContent();
    }

    private function sendHeaders(): void
    {
        header(sprintf('HTTP/1.1 %s OK', $this->status));
    }

    private function sendContent(): void
    {
        echo $this->content;
    }
}