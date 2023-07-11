<?php

namespace Feature\Mastercard;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use Placetopay\ClicktopayClient\MastercardService;
use Placetopay\ClicktopayClient\Requests\Mastercard\AuthRequest;
use Placetopay\ClicktopayClient\Requests\Mastercard\CheckoutRequest;
use Placetopay\ClicktopayClient\Requests\Mastercard\ConfirmationRequest;
use Placetopay\ClicktopayClient\Requests\Mastercard\RegistrationRequest;

class MastercardServiceTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function itMustReturnCheckoutEndpointResult(): void
    {
        $authData = new AuthRequest(
            'https://sandbox.api.mastercard.com/srci/api/checkout', //'https://sandbox.api.mastercard.com/src/api/transaction/credentials',
            'clicktopayMastercard123',
            'juan.pabon@evertecinc.com',
            'ZKRNamOA1q9jKu5jFOjMsuW_WCFqmJ-dl1OT0Quw5e917ba8!3b2978dbbbf94484a9376110aa4112c30000000000000000',
            './clicktopayMastercard123.p12'
        );

        $client = new Client();

        $service = new MastercardService($authData, $client);

        $result = $service->checkout(new CheckoutRequest([
            'dpaTransactionOptions' => [
                'transactionAmount' => [
                    'transactionAmount' => 50000,
                    'transactionCurrencyCode' => 'COP',
                ],
            ],
            'srcDpaId' => 'a2833c3d-f6d6-487d-8c56-77eaeffc5546',
            'correlationId' => '4f339be7.263297c2-eaf8-4509-b6ef-ae4b5083c7c5',
            'checkoutType' => 'CLICK_TO_PAY',
            'checkoutReference' => [
                'type' => 'MERCHANT_TRANSACTION_ID',
                'data' => [
                    'merchantTransactionId' => '0a4e0d3.34f4a04b.dbdba979d4caac43665f0e95c45c472ec59511cb',
                ],
            ],
        ]));

        dd($result, 'checkout');
    }

    /*
     * @test
     * @throws GuzzleException
     */
    /*public function itMustReturnDpaRegistrationEndpointResult(): void
    {
        $authData = new AuthRequest(
            'https://sandbox.api.mastercard.com/srci/onboarding/org/f137455e-d81c-4d90-b2eb-1ce4e86d37ab/dpas/batch',
            'clicktopayMastercard123',
            'juan.pabon@evertecinc.com',
            'ZKRNamOA1q9jKu5jFOjMsuW_WCFqmJ-dl1OT0Quw5e917ba8!3b2978dbbbf94484a9376110aa4112c30000000000000000',
            './clicktopayMastercard123.p12'
        );

        $client = new Client();

        $service = new MastercardService($authData, $client);

        $result = $service->DPARegistration(new RegistrationRequest([
            "dpas" => [
                [
                    "supportedCardBrands" => [
                        "MASTERCARD"
                    ],
                    "dpaData" => [
                        "dpaName" => "dpa example189234",
                        "dpaPresentationName" => "dpa presentation example189234",
                        "dpaUri" => "https://www.abc.com",
                        "originDomains" => [
                            "https://companyuri21.com.es",
                            "https://companyur1i2.com.es"
                        ],
                        "dpaAddress" => [
                            "name" => "name",
                            "line1" => "Line1",
                            "line2" => "line2update",
                            "line3" => "line3",
                            "city" => "city",
                            "state" => "MH",
                            "countryCode" => "IN",
                            "zip" => "41321"
                        ]
                    ],
                    "debitTokenRequested" => false,
                    "merchantCountryCode" => "US",
                    "merchantCategoryCodes" => [
                        "0020",
                        "4444",
                        "1111",
                        "4442",
                        "5732",
                        "5733"
                    ],
                    "supportedCheckoutTypes" => [
                        "CLICK_TO_PAY"
                    ],
                    "threeDSDefaultdata" => [
                        "defaultAcquirerBin" => "bin1",
                        "defaultAcquirerMerchantId" => "MerchId",
                        "defaultMerchantCategoryCode" => "4027"
                    ],
                    "acquirerData" => [
                        [
                            "acquirerIca" => "Ica",
                            "acquirerBin" => "aBin",
                            "acquirerMerchantId" => "MerchId"
                        ]
                    ]
                ]
            ]
        ]));

        dd($result, 'DPARegistration');
    }*/

    /*
     * @test
     * @throws GuzzleException
     */
    /*public function itMustReturnConfirmationsEndpointResult(): void
    {
        $authData = new AuthRequest(
            'https://sandbox.api.mastercard.com/srci/api/checkout/confirmations',
            'clicktopayMastercard123',
            'juan.pabon@evertecinc.com',
            'ZKRNamOA1q9jKu5jFOjMsuW_WCFqmJ-dl1OT0Quw5e917ba8!3b2978dbbbf94484a9376110aa4112c30000000000000000',
            './clicktopayMastercard123.p12'
        );

        $client = new Client();

        $service = new MastercardService($authData, $client);

        $result = $service->confirmations(new ConfirmationRequest([
            "merchantTransactionId" => "0a4e0d3.34f4a04b.dbdba979d4caac43665f0e95c45c472ec59511cb",
            "correlationId" => "43465920-50e4-475f-a8d8-198a842fd3bf",
            "confirmationData" => [
                "checkoutEventType" => "01",
                "checkoutEventStatus" => "01",
                "confirmationStatus" => "01",
                "confirmationReason" => "The payment was successful",
                "confirmationTimestamp" => "2023-07-02T05:15:00.000Z",
                "networkAuthorizationCode" => 2020404,
                "networkTransactionIdentifier" => "mastercard",
                "transactionAmount" => [
                    "transactionAmount" => 50000,
                    "transactionCurrencyCode" => "COP"
                ]
            ]
        ]));

        dd($result, 'confirmations');
    }*/
}
