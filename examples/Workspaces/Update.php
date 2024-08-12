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
$workspaceId = '27';
$name = '更新測試Workspace';
$description = '更新測試description';

$workspace = new TagManagerWorkspace();
$workspace->name = $name;
$workspace->description = $description;

$data = (new Workspace($client))->update($accountId, $containerId, $workspaceId, $workspace);

var_dump($data);
