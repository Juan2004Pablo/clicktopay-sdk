<?php

namespace Placetopay\ClicktopayClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Placetopay\ClicktopayClient\Contracts\ResponseContract;
use Placetopay\ClicktopayClient\Requests\Mastercard\AuthRequest;
use Placetopay\ClicktopayClient\Requests\Mastercard\CheckoutRequest;
use Placetopay\ClicktopayClient\Requests\Mastercard\ConfirmationRequest;
use Placetopay\ClicktopayClient\Requests\Mastercard\RegistrationRequest;
use Placetopay\ClicktopayClient\Response\CheckoutDataResponse;
use Placetopay\ClicktopayClient\Services\Mastercard\Auth;
use Placetopay\ClicktopayClient\Traits\SendRequest;
use Symfony\Component\HttpFoundation\Request;

class MastercardService
{
    use SendRequest;

    protected Auth $auth;

    public function __construct(
        protected AuthRequest $authData,
        protected ClientInterface $client
    ) {
        $this->auth = new Auth($authData->getCredentials());
    }

    /**
     * @throws GuzzleException
     */
    public function checkout(CheckoutRequest $request): ResponseContract
    {
        return $this->sendRequest($request, Request::METHOD_POST, CheckoutDataResponse::class);
    }

    public function DPARegistration(RegistrationRequest $request): ResponseContract
    {
        return $this->sendRequest($request, Request::METHOD_POST);
    }

    public function confirmations(ConfirmationRequest $request): ResponseContract
    {
        return $this->sendRequest($request, Request::METHOD_POST);
    }
}