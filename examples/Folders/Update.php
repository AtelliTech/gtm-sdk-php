<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use Google\Service\TagManager\Folder as TagManagerFolder;
use gtm\Client;
use gtm\Folder;

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
$folderId = '23';
$name = '測試更新folder';
$notes = '測試更新notes';

$folder = new TagManagerFolder();
$folder->name = $name;
$folder->notes = $notes;

$data = (new Folder($client))->update($accountId, $containerId, $workspaceId, $folderId, $folder);

var_dump($data);
