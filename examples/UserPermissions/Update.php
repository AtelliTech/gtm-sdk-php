<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\{AccountAccess, ContainerAccess, UserPermission};
use Google\Service\TagManager\{UserPermission as GtmUserPermission, AccountAccess as GtmAccountAccess, ContainerAccess as GtmContainerAccess};


/** generate client */
$clientService = new Client();

$clientService->setClientId($configData['clientId']);
$clientService->setClientSecret($configData['clientSecret']);
$clientService->setDeveloperKey($configData['developerToken']);
$clientService->setScopes($configData['scopes']);

$clientService->setRefreshToken($configData['refreshToken']);


$client = $clientService->generate();

$userPermissionId = '05639987120501042490';
$accountId = '10825770';
$emailAddress = 'alex.tsai@cyntelli.com';
$accountAccess = AccountAccess::USER;
$containerId = '53045390';
$containerAccesses = [ContainerAccess::PUBLISH];

$gtmUserPermission = new GtmUserPermission();
$gtmUserPermission->accountId = $accountId;
$gtmUserPermission->emailAddress = $emailAddress;

$rowAccountAccess = new GtmAccountAccess();
$rowAccountAccess->permission = $accountAccess;
$gtmUserPermission->setAccountAccess($rowAccountAccess);

$rowContainerAccesses = [];

foreach ($containerAccesses as $containerAccesses) {
	$rowContainerAccess = new GtmContainerAccess();

	$rowContainerAccess->containerId = $containerId;
	$rowContainerAccess->permission = $containerAccesses;
	array_push($rowContainerAccesses, $rowContainerAccess);
}

$gtmUserPermission->setContainerAccess($rowContainerAccesses);

$data = (new UserPermission($client))->update($userPermissionId, $accountId, $gtmUserPermission);

var_dump($data);
