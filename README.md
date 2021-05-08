# ENDOR Mail SDK

This package includes a PHP SDK wrapper that can be used to communicate with ENDOR Mail APIs.


## Installation

```bash
composer require jsefton/endor-mail-sdk
```

## Usage

To send email to the API you will need to create a new instance of the EndorMail wrapper. This requires you to create the instance with your API KEY that you have been provided from ENDOR Mail Service.

Below is a quick full example usage within a Laravel application that will allow you to use the normal views for emails.
You can pass in data to your view with the normal `->with()` method.

```php
(new EndorMail(env('ENDOR_MAIL_KEY')))
    ->to(['info@endor.digital'])
    ->bcc(['bcc@endor.digital'])
    ->from('no-reply@endor.digital')
    ->subject('Email Subject Line')
    ->content(view('{laravel view path e.g. emails.template}')->render())
    ->send();
```

If you want to use this package in an application that is not Laravel then you can use `file_get_contents` to get the content of the email:

```php
(new EndorMail(env('ENDOR_MAIL_KEY')))
    ->to(['info@endor.digital'])
    ->bcc(['bcc@endor.digital'])
    ->from('no-reply@endor.digital')
    ->subject('Email Subject Line')
    ->content(file_get_contents('{path to email template}'))
    ->send();
```
