<?php

namespace gtm;

use Google\Service\TagManager\{CreateContainerVersionRequestVersionOptions, Workspace as GtmWorkspace};


/**
 * Workspace service.
 * 
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @author Alex Tsai <alex.tsai@cyntelli.com>
 * @since 1.0.0
 * @version 2.0.0
 */
class Workspace extends Base
{
    /**
     * @var Google\Client $client
     */
    private $client;

    /**
     * @var gtm\ContainerVersion $containerVersion
     */
    private $containerVersion;

    /**
     * Construct
     * 
     * @var \Google\Client $client
     */
    public function __construct($client)
    {
        $this->client = new \Google\Service\TagManager($client);

        $this->containerVersion = new ContainerVersion($client);
    }

    /**
     * get
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/get
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * 
     * @return array
     */
    public function get(string $accountId, string $containerId, string $workspaceId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces->get($path);

        return $result;
    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/list
     * 
     * @var string $accountId
     * @var string $containerId
     * 
     * @return array
     */
    public function list(string $accountId, string $containerId)
    {
        $path = sprintf('accounts/%s/containers/%s', $accountId, $containerId);

        $result = $this->client->accounts_containers_workspaces->listAccountsContainersWorkspaces($path);

        return $result;
    }

    /**
     * create
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/create
     * 
     * @var string $accountId
     * @var string $containerId
     * @var GtmWorkspace $object
     * 
     * @return array
     */
    public function create(string $accountId, string $containerId, GtmWorkspace $object)
    {
        $path = sprintf('accounts/%s/containers/%s', $accountId, $containerId);

        $result = $this->client->accounts_containers_workspaces->create($path, $object);

        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/update
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var GtmWorkspace $object
     * 
     * @return array
     */
    public function update(string $accountId, string $containerId, string $workspaceId, GtmWorkspace $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces->update($path, $object);

        return $result;
    }

    /**
     * create version
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/create_version
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var CreateContainerVersionRequestVersionOptions $versionOptions
     * 
     * @return array
     */
    public function createVersion(string $accountId, string $containerId, string $workspaceId, CreateContainerVersionRequestVersionOptions $versionOptions)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces->create_version($path, $versionOptions);

        return $result;
    }
}
