<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\ContainerVersion;


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);

$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$accountId = '10825770';
$containerId = '53045390';
$versionId = '21';

$data = (new ContainerVersion($client))->publish($accountId, $containerId, $versionId);

var_dump($data);
