<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\Folder;


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);
$clientService->setScopes($configData['scopes']);

$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$config = [
    'account_id' => '6004677764',
    'container_id' => '50828248',
    'workspace_id' => '51',
];

$folderId = '45';

$data = (new Folder($client))->entities($config, $folderId);

var_dump($data);
