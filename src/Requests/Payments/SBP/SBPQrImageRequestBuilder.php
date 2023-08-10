<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait;

class SBPQrImageRequestBuilder extends AbstractRequestBuilder
{
    use PaymentRequestTrait, HasReceipt;

    /**
     * @inheritdoc
     */
    protected function getRequestPayload(): array
    {
        $this->setJsonData(\array_merge($this->json_data ?? [], $this->getReceiptData()));

        return $this->getCommonPaymentParams();
    }

    /**
     * @inheritdoc
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/qr/sbp/image');
    }
}
