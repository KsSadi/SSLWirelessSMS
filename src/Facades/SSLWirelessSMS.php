<?php

namespace KsSadi\SSLWirelessSMS\Facades;

use Illuminate\Support\Facades\Facade;

class SSLWirelessSMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sslwireless';
    }
}
