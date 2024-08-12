<?php

namespace gtm;

use Exception;
use Google\Service\TagManager\{Environment as GtmEnvironment};

/**
 * environment service.
 * 
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @since 1.0.0
 * @version 1.0.0
 */
class Environment extends Base
{
    /**
     * @var Google\Client $client
     */
    private $client;

    /**
     * @var gtm\Container $container
     */
    private $container;

    /**
     * Construct
     * 
     * @var \Google\Client $client
     */
    public function __construct($client)
    {
        $this->client = new \Google\Service\TagManager($client);

        $this->container = new Container($client);
    }

    /**
     * getFormattedOutput
     * 
     * @var Google\Service\TagManager\Tag $gtmObj
     * 
     * @return array
     */
    public static function getFormattedOutput($gtmObj)
    {
        return [
            'authorizationCode' => $gtmObj['authorizationCode'],
            'authorizationTimestamp' => $gtmObj['authorizationTimestamp'],
            'accountId' => $gtmObj['accountId'],
            'containerId' => $gtmObj['containerId'],
            'containerVersionId' => $gtmObj['containerVersionId'],
            'environmentId' => $gtmObj['environmentId'],
            'type' => $gtmObj['type'],
            'name' => $gtmObj['name'],
            'notes' => $gtmObj['notes'],
            'path' => $gtmObj['path'],
            'workspaceId' => $gtmObj['workspaceId']
        ];
    }

    /**
     * get
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/environments/get
     * 
     * @var array $config
     * @var string environmentId
     * 
     * @return array
     */
    public function get($config, $environmentId)
    {
        if (!array_key_exists('account_id', $config)) {
            throw new Exception('[Environment] account_id is required');
        }

        if (!array_key_exists('container_id', $config)) {
            throw new Exception('[Environment] container_id is required');
        }

        $accountId = $config['account_id'];
        $containerId = $config['container_id'];

        $path = sprintf('accounts/%s/containers/%s/environments/%s', $accountId, $containerId, $environmentId);

        $environmentObj = $this->client->accounts_containers_environments->get($path);

        $result = [];

        if ($environmentObj) {
            $result = self::getFormattedOutput($environmentObj);
        }

        return $result;

    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/environments/list
     * 
     * @var array $config
     * 
     * @return array
     */
    public function list($config)
    {
        if (!array_key_exists('account_id', $config)) {
            throw new Exception('[Environment] account_id is required');
        }

        if (!array_key_exists('container_id', $config)) {
            throw new Exception('[Environment] container_id is required');
        }

        $accountId = $config['account_id'];
        $containerId = $config['container_id'];

        $path = sprintf('accounts/%s/containers/%s', $accountId, $containerId);

        $result = [];

        try {

            $environmentObjs = $this->client->accounts_containers_environments->listAccountsContainersEnvironments($path);

            foreach ($environmentObjs as $rowKey => $environmentObj) {
                array_push($result, self::getFormattedOutput($environmentObj));
            }

        } catch (Exception $e) {
            throw $e;
        }

        return $result;
    }

    /**
     * create
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/environments/create
     * 
     * @var array $config
     * @var string $name
     * @var string $enableDebug
     * @var string $description
     * @var string $url
     * 
     * @return array
     */
    public function create($config, $name, $enableDebug = 'false', $description = '', $url = '')
    {
        if (!array_key_exists('account_id', $config)) {
            throw new Exception('[Environment] account_id is required');
        }

        if (!array_key_exists('container_id', $config)) {
            throw new Exception('[Environment] container_id is required');
        }

        $accountId = $config['account_id'];
        $containerId = $config['container_id'];

        $path = sprintf('accounts/%s/containers/%s', $accountId, $containerId);

        $gtmEnvironment = new GtmEnvironment();

        $gtmEnvironment->name = $name;

        if (!empty($description)) {
            $gtmEnvironment->description = $description;
        }

        if (!empty($enableDebug)) {
            $gtmEnvironment->enableDebug = $enableDebug;
        }

        if (!empty($url)) {
            $gtmEnvironment->url = $url;
        }

        $environmentObj = $this->client->accounts_containers_environments->create($path, $gtmEnvironment);

        $result = [];

        if ($environmentObj) {
            $result = self::getFormattedOutput($environmentObj);
        }

        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/environments/update
     * 
     * @var array $config
     * @var string $environmentId
     * @var string $name
     * @var string $enableDebug
     * @var string $description
     * @var string $url
     * 
     * @return array
     */
    public function update($config, $environmentId, $name, $enableDebug = false, $description = '', $url = '')
    {
        if (!array_key_exists('account_id', $config)) {
            throw new Exception('[Environment] account_id is required');
        }

        if (!array_key_exists('container_id', $config)) {
            throw new Exception('[Environment] container_id is required');
        }


        $accountId = $config['account_id'];
        $containerId = $config['container_id'];

        $path = sprintf('accounts/%s/containers/%s/environments/%s', $accountId, $containerId, $environmentId);

        $gtmEnvironment = new GtmEnvironment();

        $gtmEnvironment->name = $name;

        if (!empty($description)) {
            $gtmEnvironment->description = $description;
        }

        if (!empty($enableDebug)) {
            $gtmEnvironment->enableDebug = $enableDebug;
        }

        if (!empty($url)) {
            $gtmEnvironment->url = $url;
        }
        $result = [];

        $environmentObj = $this->client->accounts_containers_environments->update($path, $gtmEnvironment);

        if ($environmentObj) {
            $result = self::getFormattedOutput($environmentObj);
        }
       
        return $result;
    }


    /**
     * preview
     * 
     * @var array $config
     * @var string $environmentId
     * 
     * @return array
     */
    public function preview($config, $environmentId)
    {
        if (!array_key_exists('account_id', $config)) {
            throw new Exception('[Environment] account_id is required');
        }

        if (!array_key_exists('container_id', $config)) {
            throw new Exception('[Environment] container_id is required');
        }

        $accountId = $config['account_id'];
        $containerId = $config['container_id'];

        $containerObj = $this->container->get($accountId, $containerId);

        if (!$containerObj) {
            throw new Exception("[Environment] container is not found!");
        }

        $path = sprintf('accounts/%s/containers/%s/environments/%s', $accountId, $containerId, $environmentId);

        $environmentObj = $this->client->accounts_containers_environments->get($path);

        if (!$environmentObj) {
            throw new Exception("[Environment] environment is not found!");
        }


        $publicId = $containerObj['publicId'];
        $gtmAuth = $environmentObj['authorizationCode'];
        $environmentName = sprintf('env-%s', $environmentId);

        $previewLink = sprintf("https://tagassistant.google.com/#/?source=TAG_MANAGER&id=%s&gtm_auth=%s&gtm_preview=%s", $publicId, $gtmAuth, $environmentName);

        return ['preview_link' => $previewLink];
    }
}
