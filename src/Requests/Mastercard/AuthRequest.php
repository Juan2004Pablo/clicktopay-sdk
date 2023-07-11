<?php

namespace Placetopay\ClicktopayClient\Requests\Mastercard;

use Placetopay\ClicktopayClient\Contracts\AuthContract;

class AuthRequest implements AuthContract
{
    public function __construct(
        private readonly string $url,
        private readonly string $signingKeyAlias,
        private readonly string $signingKeyPassword,
        private readonly string $consumerKey,
        private readonly string $signingKeyFilePath,
    ) {
    }

    public function getCredentials(): array
    {
        return [
            'url' => $this->url,
            'keyAlias' => $this->signingKeyAlias,
            'consumerKey' => $this->consumerKey,
            'keyFilePath' => $this->signingKeyFilePath,
            'keyPassword' => $this->signingKeyPassword,
        ];
    }
}