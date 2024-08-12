<?php

require __DIR__ . '/../../vendor/autoload.php';

require __DIR__.'/../config.php';

use Google\Service\TagManager\Condition;
use Google\Service\TagManager\Parameter;
use Google\Service\TagManager\Trigger as GtmTrigger;
use gtm\Client;
use gtm\Trigger;
use gtm\Type;
use gtm\trigger\Type as TriggerType;

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
$workspaceId = '27';
$name = 'Rule-測試-V2-Update-WL';
$type = TriggerType::WINDOW_LOADED;
$parameter = [
    [
        'equals' => [
            ['value' => '{{Page Hostname}}'],
            ['value' => 'www.demo.com.tw']
        ],
    ],
    [
        'equals' => [
            ['value' => '{{Page URL}}'],
            ['value' => 'www.demo-2.com.tw']
        ]
    ]
];

// get trigger object
$trigger = new GtmTrigger();
$trigger->name = $name;
$trigger->type = $type;
$trigger->parentFolderId = '4';

// set filter
$conditions = [];
foreach ($parameter as $itemKey => $rowItemParameters) {

    foreach ($rowItemParameters as $filterType => $rowParameters) {
        $condition = new Condition();
        $condition->setType($filterType);
        $tmpConditionResult = [];

        foreach ($rowParameters as $rowKey => $rowParameter) {
            $parameter = new Parameter();

            $parameter->type = Type::TEMPLATE;

            /** add arg */
            $parameter->key = sprintf('arg'.$rowKey);
            $parameter->value = $rowParameter['value'];

            array_push($tmpConditionResult, $parameter);
        }

        $condition->setParameter($tmpConditionResult);
        unset($tmpConditionResult);

        array_push($conditions, $condition);
    }
}

$trigger->setFilter($conditions);

$data = (new Trigger($client))->create($accountId, $containerId, $workspaceId, $trigger);

var_dump($data);
