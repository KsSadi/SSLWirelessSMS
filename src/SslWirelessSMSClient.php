<?php

namespace KsSadi\SSLWirelessSMS;

class SslWirelessSMSClient
{
    protected string $baseUrl;
    protected string $apiToken;
    protected string $sid;
    protected string $domain;
    protected string $messageType;

    public function __construct()
    {
        $this->apiToken = config('sslwireless.api_token');
        $this->sid = config('sslwireless.sid');
        $this->domain = config('sslwireless.domain');
        $this->messageType = config('sslwireless.message_type');
        $this->baseUrl = rtrim($this->domain, '/');
    }

    /**
     * Send an SMS message.
     *
     * @param array $data
     * @param string|null $transactionId
     * @return string
     */
    public function sendSms(array $data, string $transactionId = null): string
    {
        $payload = [
            'api_token' => $this->apiToken,
            'sid' => $this->sid,
        ];

        // Determine if it's a single, bulk, or dynamic SMS
        if (isset($data['phoneNumber']) && isset($data['messageBody'])) {
            // Single SMS
            $payload['sms'] = $data['messageBody'];
            $payload['msisdn'] = $data['phoneNumber'];
            $payload['csms_id'] = $transactionId;
            $endpoint = '/api/v3/send-sms';
        } elseif (isset($data['phoneNumbers']) && isset($data['messageBody'])) {
            // Bulk SMS
            $payload['sms'] = $data['messageBody'];
            $payload['msisdn'] = $data['phoneNumbers'];
            $payload['batch_csms_id'] = $transactionId;
            $endpoint = '/api/v3/send-sms/bulk';
        } elseif (isset($data['messages']) && is_array($data['messages'])) {
            // Dynamic SMS
            $payload['sms'] = array_map(fn($msg) => [
                'msisdn' => $msg['phoneNumber'],
                'text' => $msg['message'],
                'csms_id' => $msg['sms_id'],
            ], $data['messages']);
            $endpoint = '/api/v3/send-sms/dynamic';
        } else {
            throw new \InvalidArgumentException('Invalid SMS data format');
        }

        return $this->sendRequest($endpoint, $payload);
    }

    /**
     * Send a single SMS message.
     *
     * @param string $phoneNumber
     * @param string $messageBody
     * @param string $transactionId
     * @return string
     */
    public function sendSingleSms(string $phoneNumber, string $messageBody, string $transactionId): string
    {
        $payload = [
            'api_token' => $this->apiToken,
            'sid' => $this->sid,
            'sms' => $messageBody,
            'msisdn' => $phoneNumber,
            'csms_id' => $transactionId,
        ];

        $endpoint = '/api/v3/send-sms';
        return $this->sendRequest($endpoint, $payload);
    }

    /**
     * Send a bulk SMS message.
     *
     * @param array $phoneNumbers
     * @param string $messageBody
     * @param string $batchId
     * @return string
     */
    public function sendBulkSms(array $phoneNumbers, string $messageBody, string $batchId): string
    {
        $payload = [
            'api_token' => $this->apiToken,
            'sid' => $this->sid,
            'sms' => $messageBody,
            'msisdn' => $phoneNumbers,
            'batch_csms_id' => $batchId,
        ];

        $endpoint = '/api/v3/send-sms/bulk';
        return $this->sendRequest($endpoint, $payload);
    }

    /**
     * Send dynamic SMS messages.
     *
     * @param array $messages
     * @return string
     */
    public function sendDynamicSms(array $messages): string
    {
        $payload = [
            'api_token' => $this->apiToken,
            'sid' => $this->sid,
            'sms' => array_map(fn($msg) => [
                'msisdn' => $msg['phone_number'],
                'text' => $msg['message'],
                'csms_id' => $msg['sms_id'],
            ], $messages),
        ];

        $endpoint = '/api/v3/send-sms/dynamic';
        return $this->sendRequest($endpoint, $payload);
    }



    /**
     * Send a request to the API.
     *
     * @param string $endpoint
     * @param array $payload
     * @return string
     */
    private function sendRequest(string $endpoint, array $payload): string
    {
        $url = $this->baseUrl . $endpoint;
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json',
                'Content-Length: ' . strlen(json_encode($payload)),
            ],
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
