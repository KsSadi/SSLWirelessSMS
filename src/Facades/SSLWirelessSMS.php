<?php

namespace KsSadi\SSLWirelessSMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed sendSms(array $data, string $transactionId = null)
 * @method static mixed sendSingleSms(string $phoneNumber, string $messageBody, string $transactionNo)
 * @method static mixed sendBulkSms(array $phoneNumbers, string $messageBody, string $transactionNo)
 * @method static mixed sendDynamicSms(array $messageData)
 */

class SSLWirelessSMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sslwireless'; // This matches the binding name in the service provider
    }
}
