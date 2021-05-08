# ENDOR Mail SDK

This package includes a PHP SDK wrapper that can be used to communicate with ENDOR Mail APIs.


## Installation

```bash
composer require jsefton/endor-mail-sdk
```

## Usage

To send email to the API you will need to create a new instance of the EndorMail wrapper. This requires you to create the instance with your API KEY that you have been provided from ENDOR Mail Service.

### Create Instance
```php
$email = (new EndorMail(env('ENDOR_MAIL_KEY')))
```

