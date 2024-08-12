<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\ContainerVersion;
use Google\Service\TagManager\ContainerVersion as GtmContainerVersion;


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
$name = '更新v1';
$description = '更新描述v1';

$containerVersion = new GtmContainerVersion();
$containerVersion->name = $name;

if ($description) {
    $containerVersion->description = $description;
}

$data = (new ContainerVersion($client))->update($accountId, $containerId, $versionId, $containerVersion);

var_dump($data);
