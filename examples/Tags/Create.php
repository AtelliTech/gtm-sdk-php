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
$workspaceId = '20';
$name = 'Code-GTM測試新增-V1-Tag-WL';
$type = 'html';
$priority = '500';
$parameter = [
    [
        [
            'type' => 'template',
            'key' => 'html',
            'value' => '<h1>新增Tag</h1>'
        ],
        [
            'type' => 'boolean',
            'key' => 'supportDocumentWrite',
            'value' => 'false'
        ]
    ]
];
$firingTriggerId = [7,8];
$blockingTriggerId = [13];

$tag = new GtmTag();
$tag->setFiringTriggerId($firingTriggerId);
$tag->setBlockingTriggerId($blockingTriggerId);
$tag->parentFolderId = '4';
$tag->name = $name;
$tag->type = $type;

// set template parameters and conditions
$conditions = [];
foreach ($parameter as $key => $rows) {

    foreach ($rows as $row) {
        $rowType = $row['type'];
        $rowKey = $row['key'];
        $rowValue = $row['value'];

        $parameter = new Parameter();
        $parameter->type = $rowType;
        $parameter->key = $rowKey;
        $parameter->value = $rowValue;

        array_push($conditions, $parameter);

        unset($parameter);
    }
}

$tag->setParameter($conditions);

// set priority
$parameter = new Parameter();

$parameter->type = 'integer';
$parameter->value = $priority;

$tag->setPriority($parameter);

$data = (new Tag($client))->create($accountId, $containerId, $workspaceId, $tag);

var_dump($data);
