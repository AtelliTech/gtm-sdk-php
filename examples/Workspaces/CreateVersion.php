<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\Workspace;
use Google\Service\TagManager\{CreateContainerVersionRequestVersionOptions, Workspace as GtmWorkspace};

/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);

$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$accountId = '10825770';
$containerId = '53045390';
$workspaceId = '30';

$name = '測試發布 Default Workspace Test';
$notes = '測試Version notes';

$versionOptions = new CreateContainerVersionRequestVersionOptions();

$versionOptions->name = $name;
if ($notes) {
    $versionOptions->notes = $notes;    
}

$data = (new Workspace($client))->createVersion($accountId, $containerId, $workspaceId, $versionOptions);

var_dump($data);
