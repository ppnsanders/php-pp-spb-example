# php-pp-spb-example

-----

## Description

A simple app using [AngularJS](https://angularjs.org/) and [PHP](http://www.php.net/) to integrate [PayPal Express Checkout](https://developer.paypal.com/docs/integration/direct/express-checkout/integration-jsv4/) with [PayPal REST API](https://developer.paypal.com/docs/api/payments/#payment) and [Smart Payment Buttons](https://developer.paypal.com/demo/checkout/#/pattern/server)

> **Disclaimer:** The applications provided here and all code is provided as-is.  These examples are intended to be **EXAMPLES** and are not intended to be used in a production environment.  I am employed at PayPal, however, the code herein is provided from myself as an example not from PayPal, Inc.  I hope these are helpful to helping you understand the API's, but please do not use in a production environment.

## Setup

### Step 1:

1. Clone, Fork, or download this repo :: `$ git clone https://github.com/ppnsanders/php-pp-spb-example.git`
2. Place the repo at the root of your `htdocs` directory (e.g. `/htdocs/php-pp-spb-example`).
3. [Download the PayPal PHP SDK](https://github.com/paypal/PayPal-PHP-SDK/wiki/Installation-Direct-Download) and extract it into the `php-pp-spb-example` directory (e.g. `/htdocs/php-pp-spb-example/PayPal-PHP-SDK`).

### Step 2: 

To setup your config file, simply copy the content of `/php-pp-spb-example/config/paypal_sample.json` and update the JSON with your actual information.  Where `<YOUR_CLIENT_ID>` would be your actual `client_id` from [developer.paypal.com](https://developer.paypal.com/developer/applications).  Then save that file in the `/php-pp-spb-example/config/` directory as `paypal.json` (i.e. `/php-pp-spb-example/config/paypal.json`).

```json
{ 
	"client_id": "<YOUR_CLIENT_ID>",
	"client_secret": "<YOUR_CLIENT_SECRET>",
	"email": "<YOUR_EMAIL>",
	"payerId": "<YOUR_PAYER_ID>",
	"brandName": "<YOUR_BRAND_NAME>",
	"environment": "sandbox"
}
```

### Step 3:

Update the [/api/paypal/bootstrap.php](https://github.com/ppnsanders/php-pp-spb-example/blob/master/api/paypal/bootstrap.php#L5) file to set the full path to your `autoload.php` file in the `$composerAutoload` variable. 

## Running the Sample

Once you have the Setup & Config File steps complete, fire up your Apache Server and go to [http://localhost:8888/php-pp-spb-example/](http://localhost:8888/php-pp-spb-example/).

> *_Note::_* I was using [MAMP](https://www.mamp.info/en/) so my port was set to `8888` (i.e. `http://localhost:8888/`), _your URL and/or PORT may be different_.
