<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use gtm\Client;
use gtm\Variable;
use Google\Service\TagManager\{Parameter, Variable as GtmVariable};


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
$variableId = '49';
$name = 'Variable-GTM-更新測試';
$notes = '測試更新GTM Variable';
$type = 'jsm';
$parameter = [
    [
        [
            'type' => 'template',
            'key' => 'javascript',
            'value' => 'function() { return false; }'
        ]
    ]
];

// set template parameters and conditions
$variable = new GtmVariable();
$variable->name = $name;
$variable->type = $type;
$variable->notes = $notes;
$variable->parentFolderId = '4';

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

$variable->setParameter($conditions);

$data = (new Variable($client))->update($accountId, $containerId, $workspaceId, $variableId, $variable);

var_dump($data);
