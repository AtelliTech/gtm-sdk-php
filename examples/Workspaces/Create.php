<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__.'/../config.php';

use Google\Service\TagManager\Workspace as TagManagerWorkspace;
use gtm\Client;
use gtm\Workspace;


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);
$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();


$accountId = '10825770';
$containerId = '53045390';
$name = '測試Workspace';
$description = '測試description';

$workspace = new TagManagerWorkspace();
$workspace->name = $name;
$workspace->description = $description;

$data = (new Workspace($client))->create($accountId, $containerId, $workspace);


var_dump($data);
