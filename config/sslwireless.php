<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SSLWirelessSMS API Token
    |--------------------------------------------------------------------------
    |
    | This value is the API token provided by SSLWireless to authenticate
    | your requests. Ensure that you keep this token secure and do not share it
    | publicly. You can set this in your .env file as SSLWIRELESS_API_TOKEN.
    |
    */

    'api_token' => env('SSLWIRELESS_API_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | SSLWirelessSMS SID (Sender ID)
    |--------------------------------------------------------------------------
    |
    | This value represents the SID (Sender ID) for your SMS. This should be
    | set to the sender ID provided by SSLWireless. You can set this in
    | your .env file as SSLWIRELESS_SID.
    |
    */

    'sid' => env('SSLWIRELESS_SID', ''),

    /*
    |--------------------------------------------------------------------------
    | SSLWirelessSMS Domain
    |--------------------------------------------------------------------------
    |
    | This is the base domain URL provided by SSLWirelessSMS for sending SMS.
    | It's where your requests will be sent to. You can set this in your .env
    | file as SSLWIRELESS_DOMAIN.
    |
    */

    'domain' => env('SSLWIRELESS_DOMAIN', 'https://smsplus.sslwireless.com'),

    /*
    |--------------------------------------------------------------------------
    | SSLWirelessSMS Message Type
    |--------------------------------------------------------------------------
    |
    | Define the type of message you are sending. Possible values could be 'TEXT'
    | for regular text messages or 'UNICODE' for messages containing special characters.
    | You can set this in your .env file as SSLWIRELESS_MESSAGE_TYPE.
    |
    */

    'message_type' => env('SSLWIRELESS_MESSAGE_TYPE', 'BN'),

];
