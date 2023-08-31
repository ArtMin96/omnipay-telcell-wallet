# Omnipay: TelCell

**TelCell driver for the Omnipay Laravel payment processing library**

[![Latest Stable Version](https://poser.pugx.org/razmiksaghoyan/omnipay-telcell/version.png)](https://packagist.org/packages/razmiksaghoyan/omnipay-telcell)
[![Total Downloads](https://poser.pugx.org/razmiksaghoyan/omnipay-telcell/d/total.png)](https://packagist.org/packages/razmiksaghoyan/omnipay-telcell)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.5+. This package implements TelCell support for Omnipay.

## Basic Usage

1. Use Omnipay gateway class:

```php
    use Omnipay\Omnipay;
```

2. Initialize TelCell gateway:

```php

    $gateway = Omnipay::create('Telcell');
    $gateway->setShopId(env('SHOP_ID'));
    $gateway->setShopKey(env('SHOP_KEY'));
    $gateway->setSum(10); // Amount to charge
    $gateway->setInfo([]); // Additional information
    $gateway->setTransactionId(XXXX); // Transaction ID from your system

```

3. Call purchase, it will automatically redirect to TelCell's hosted page

```php

    $purchase = $gateway->purchase()->send();
    $purchase->redirect();

```

4. Create a webhook controller to handle the callback request at your `RETURN_URL` and catch the webhook as follows

```php

    $gateway = Omnipay::create('Telcell');
    $gateway->setShopId(env('SHOP_ID'));
    $gateway->setShopKey(env('SHOP_KEY'));
    
    $purchase = $gateway->completePurchase()->send();
    
    // Do the rest with $purchase and response with 'OK'
    if ($purchase->isSuccessful()) {
        
        // Your logic
        
    }
    
    return new Response('OK');

```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.
