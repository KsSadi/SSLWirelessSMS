<br>
<a href="https://github.com/KsSadi/SSLWirelessSMS">
<img style="width: 100%; max-width: 100%;" alt="SSL Wireless SMS Laravel Package" src="/image/ssl-wireless-banner.png" >
</a>

# **SSL Wireless SMS Laravel Package**
<hr>

   
A Laravel package for integrating SSL Wireless SMS service into your Laravel applications. Easily send single, bulk, and dynamic SMS messages using this package.

![GitHub Repo stars](https://img.shields.io/github/stars/KsSadi/SSLWirelessSMS.svg)
[![Downloads](https://img.shields.io/packagist/dt/kssadi/sslwirelesssms)](https://packagist.org/packages/kssadi/sslwirelesssms)
![GitHub license](https://img.shields.io/github/license/KsSadi/SSLWirelessSMS.svg)
![GitHub top language](https://img.shields.io/github/languages/top/KsSadi/SSLWirelessSMS.svg)
![Packagist Version](https://img.shields.io/packagist/v/kssadi/sslwirelesssms.svg)


# Features

- **Single SMS:** Send a single SMS message to a phone number.
- **Bulk SMS:** Send SMS messages to multiple phone numbers in a single request.
- **Dynamic SMS:** Send SMS messages dynamically with varying content.

# Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Author](#author)
- [Contributing](#contributing)
- [License](#license)

# Requirements

- PHP >= 8.0
- Laravel >= 10


# Installation

1. ### **Install the package via Composer:**

   ```bash
   composer require kssadi/sslwirelesssms
2. ### **Publish the configuration file:**

   ```bash
   php artisan vendor:publish --provider="KsSadi\SSLWirelessSMS\SSLWirelessSMSServiceProvider" --tag="config"
   ```
   This will publish the `sslwireless.php` configuration file to your `config` directory.


    
# Configuration
Add your SSL Wireless SMS credentials to the `config/sslwireless.php` file

```php
return [
    'api_token' => env('SSLWIRELESS_API_TOKEN', ''),
    'sid' => env('SSLWIRELESS_SID', ''),
    'domain' => env('SSLWIRELESS_DOMAIN', 'https://smsplus.sslwireless.com'),
    'message_type' => env('SSLWIRELESS_MESSAGE_TYPE', 'EN'),
];
```
Add these values to your `.env` file:

```bash
SSLWIRELESS_API_TOKEN=your_api_token
SSLWIRELESS_SID=your_sid

```

# Usage
With this package, you can send single, bulk, or dynamic SMS messages using a unified method sendSms(). This method simplifies the process by handling all types of SMS through a single function. If you prefer, you can also use separate methods for each type of SMS.

## Unified SMS Sending

The `sendSms()` method allows you to send different types of SMS with a single function, depending on the data you provide:

**Single SMS:** Send a single SMS message to one phone number. <br>
**Bulk SMS:** Send the same SMS message to multiple phone numbers. <br>
**Dynamic SMS:** Send different SMS messages to multiple phone numbers. <br>

### `Example: Sending Single SMS`

```bash
use KsSadi\SSLWirelessSMS\Facades\SSLWirelessSMS;

$response = SSLWirelessSMS::sendSms([
'phoneNumber' => '1234567890',
'messageBody' => 'Hello World'
], 'txn123');

```

### `Example: Sending Bulk SMS`

```bash
use KsSadi\SSLWirelessSMS\Facades\SSLWirelessSMS;

$response = SSLWirelessSMS::sendSms([
    'phoneNumbers' => ['1234567890', '0987654321'],
    'messageBody' => 'Hello, this is a test message for bulk SMS.'
], 'batch123');

```
### `Example: Sending Dynamic SMS`

```bash
use KsSadi\SSLWirelessSMS\Facades\SSLWirelessSMS;

$response = SSLWirelessSMS::sendSms([
    'messages' => [
        ['phoneNumber' => '1234567890', 'message' => 'Hello, User 1!', 'sms_id' => 'sms1'],
        ['phoneNumber' => '0987654321', 'message' => 'Hello, User 2!', 'sms_id' => 'sms2']
    ]
]);

```

## Separate Methods

If you prefer to use separate methods for each type of SMS, you can do so as follows:

**`sendSingleSms()`:** Send a single SMS message. <br>
**`sendBulkSms()`:** Send SMS messages to multiple phone numbers. <br>
**`sendDynamicSms()`:** Send different SMS messages to multiple phone numbers. <br>

### `Example: Sending Single SMS`

```php
use KsSadi\SSLWirelessSMS\Facades\SSLWirelessSMS;

$response = SSLWirelessSMS::sendSingleSms('1234567890', 'Hello, world!', 'TX123');
```

### `Example: Sending a Bulk SMS`

```php
use KsSadi\SSLWirelessSMS\Facades\SSLWirelessSMS;

$phoneNumbers = ['1234567890', '0987654321'];
$response = SSLWirelessSMS::sendBulkSms($phoneNumbers, 'Hello, world!', 'TX123');
```

### `Example: Sending a Dynamic SMS`

```php
use KsSadi\SSLWirelessSMS\Facades\SSLWirelessSMS;

$messageData = [
    [
        'phone_number' => '1234567890',
        'message' => 'Hello, John!',
        "sms_id" => uniqid() //must be unique
    ],
    [
        'phone_number' => '0987654321',
        'message' => 'Hello, Jane!',
        "sms_id" => uniqid() //must be unique
    ]
];

$response = SSLWirelessSMS::sendDynamicSms($messageData);

```



## Author

**Name:** Khaled Saifullah Sadi  
**Email:** [mdsadi4@gmail.com](mailto:mdsadi4@gmail.com) <br>

[![Buy Me a Coffee](https://img.shields.io/badge/-Buy%20Me%20a%20Coffee-orange?style=flat&logo=buy-me-a-coffee)](https://www.buymeacoffee.com/kssadi)

### Social Handles

<p align="center">

<a href="https://www.linkedin.com/in/kssadi/" target="_blank"><img alt="LinkedIn" title="LinkedIn" src="https://img.shields.io/badge/LinkedIn-%230077B5.svg?&style=for-the-badge&logo=linkedin&logoColor=white"/>
</a>
<a href="https://facebook.com.com/mdsadi100" target="_blank"><img alt="Facebook" title="Facebook" src="https://img.shields.io/badge/-Facebook-1DA1F2?style=for-the-badge&logo=facebook&logoColor=white"/>
<a href="https://insta.com/Ks.Sadi" target="_blank"><img alt="Instagram" title="Instagram" src="https://img.shields.io/badge/-Instagram-C13584?style=for-the-badge&logo=instagram&logoColor=white"/>
<a href="https://twitter.com/Ks.Sadi" target="_blank"><img alt="Twitter" title="Twitter" src="https://img.shields.io/badge/-Twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white"/>
</a>
<a href="https://github.com/KsSadi" target="_blank"><img alt="Github" title="Github" src="https://img.shields.io/badge/github-%23323330.svg?&style=for-the-badge&logo=github&logoColor=%23F7DF1E"/>
</a>

</p>

## Contributing

Please feel free to contribute to this package and submit a pull request.


## License

This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).



### Key Sections:
- **Features:** Highlights the capabilities of the package.
- **Table of Contents:** Provides an overview for easy navigation.
- **Installation:** Instructions to install the package.
- **Configuration:** Details on setting up configuration.
- **Usage:** Examples of how to use the package functions.
- **Testing:** Instructions for running tests.
- **Author:** Information about the package author.
- **Contributing:** Guidelines for contributing to the project.
- **License:** Information about the package's licensing.



Feel free to adjust the content as needed based on your specific use cases or additional features.

Copyright 2024 [Khaled Saifullah Sadi]()