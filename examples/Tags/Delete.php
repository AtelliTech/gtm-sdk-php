<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\Tag;
use Google\Service\TagManager\{Tag as GtmTag, Parameter};


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);

$clientService->setRefreshToken($configData['refreshToken']);

$client = $clientService->generate();

// get parameter
$accountId = '10825770';
$containerId = '53045390';
$workspaceId = '57';
$tagId = '67';

$data = (new Tag($client))->delete($accountId, $containerId, $workspaceId, $tagId);

var_dump($data);
