<br>
<a href="https://github.com/KsSadi/SSLWirelessSMS">
<img style="width: 100%; max-width: 100%;" alt="SSL Wireless SMS Laravel Package" src="/image/ssl-wireless-banner.png" >
</a>

# SSL Wireless SMS Laravel Package
<hr>

   
A Laravel package for integrating SSL Wireless SMS service into your Laravel applications. Easily send single, bulk, and dynamic SMS messages using this package.

[![Downloads](https://img.shields.io/packagist/dt/kssadi/sslwirelesssms)](https://packagist.org/packages/kssadi/sslwirelesssms)
[![Starts](https://img.shields.io/packagist/stars/kssadi/sslwirelesssms)](https://packagist.org/packages/kssadi/sslwirelesssms)
![License](https://img.shields.io/badge/license-MIT-blue.svg)

[![Buy Me a Coffee](https://img.shields.io/badge/-Buy%20Me%20a%20Coffee-orange?style=flat&logo=buy-me-a-coffee)](https://www.buymeacoffee.com/yourusername)
## Features

- **Single SMS:** Send a single SMS message to a phone number.
- **Bulk SMS:** Send SMS messages to multiple phone numbers in a single request.
- **Dynamic SMS:** Send SMS messages dynamically with varying content.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Author](#author)
- [Contributing](#contributing)
- [License](#license)

## Requirements

- PHP >= 8.0
- Laravel >= 10


## Installation

1. **Install the package via Composer:**

   ```bash
   composer require kssadi/sslwirelesssms
2. **Publish the configuration file:**

   ```bash
   php artisan vendor:publish --provider="Kssadi\Sslwirelesssms\SslwirelesssmsServiceProvider" --tag="config"
   ```

[//]: # (3. **Publish the controller:**)

[//]: # ()
[//]: # (      ```bash)

[//]: # (   php artisan vendor:publish --provider="Kssadi\Sslwirelesssms\SslwirelesssmsServiceProvider" --tag="controller")

[//]: # (   ```)
    
## Configuration
Add your SSL Wireless SMS credentials to the config/sslwireless.php file:

```php
return [
    'api_token' => env('SSLWIRELESS_API_TOKEN', ''),
    'sid' => env('SSLWIRELESS_SID', ''),
    'domain' => env('SSLWIRELESS_DOMAIN', 'https://smsplus.sslwireless.com'),
    'message_type' => env('SSLWIRELESS_MESSAGE_TYPE', 'EN'),
];
```
Add these values to your .env file:

```bash
SSLWIRELESS_API_TOKEN=your_api_token
SSLWIRELESS_SID=your_sid

```

## Usage
Sending a Single SMS:

```php
use SSLWirelessSMS;

$response = SSLWirelessSMS::sendSingleSms('1234567890', 'Hello, world!', 'TX123');
```

Sending a Bulk SMS:

```php
use SSLWirelessSMS;

$phoneNumbers = ['1234567890', '0987654321'];
$response = SSLWirelessSMS::sendBulkSms($phoneNumbers, 'Hello, world!', 'TX123');
```

Sending a Dynamic SMS:

```php
use SSLWirelessSMS;

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

[![Buy Me a Coffee](https://img.shields.io/badge/-Buy%20Me%20a%20Coffee-orange?style=flat&logo=buy-me-a-coffee)](https://www.buymeacoffee.com/yourusername)

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