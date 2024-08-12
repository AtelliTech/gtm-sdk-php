<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\Trigger;


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);

$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$accountId = '10825770';
$containerId = '53045390';
$workspaceId = '57';
$triggerId = '41';

$data = (new Trigger($client))->delete($accountId, $containerId, $workspaceId, $triggerId);

var_dump($data);
