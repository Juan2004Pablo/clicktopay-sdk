<?php

namespace Placetopay\ClicktopayClient\Requests\Mastercard;

use GuzzleHttp\Psr7\Request;
use Placetopay\ClicktopayClient\Constants\Utils;
use Placetopay\ClicktopayClient\Contracts\RequestContract;
use Psr\Http\Message\RequestInterface;

class RegistrationRequest implements RequestContract
{
    public function __construct(
        private array $data
    ) {
    }

    public function getRequest(string $method, array $auth): RequestInterface
    {
        return new Request(
            $method,
            $auth['url'],
            ['Content-Type' => 'application/json'],
            json_encode($this->data)
        );
    }

    public function getProcess(): string
    {
        return Utils::PROCESS_MASTERCARD;
    }
}
