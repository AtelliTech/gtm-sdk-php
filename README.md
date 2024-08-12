# GTM SDK

## Installation ##

You can use **Composer** or simply **Download the Release**

### Composer

The preferred method is via [composer](https://getcomposer.org/). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require backend/gtm-sdk
```

Finally, be sure to include the autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

### Usage 

```php=
$clientService = new Client();

$clientService->setClientId('{client-id}']);
$clientService->setClientSecret('{client-secret}']);
$clientService->setDeveloperKey('{developer-token}']);
$clientService->setScopes('{scopes}']);

$clientService->setRefreshToken('{token}');


$client = $clientService->generate();


$accountId = '{account_id}';

$accountData = (new Accounts($client))->get($accountId);
```
