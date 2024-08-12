<?php

namespace gtm;

use Exception;
use Google\Service\TagManager\{Trigger as GtmTrigger};
use gtm\Type as GtmType;

/**
 * Trigger service.
 * 
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @author Alex Tsai <alex.tsai@cyntelli.com>
 * @since 1.0.0
 * @version 2.0.0
 */
class Trigger extends Base
{
    /**
     * @var Google\Client $client
     */
    private $client;

    /**
     * Construct
     * 
     * @var \Google\Client $client
     */
    public function __construct($client)
    {
        $this->client = new \Google\Service\TagManager($client);
    }

    /**
     * get
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/triggers/get
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $triggerId
     * 
     * @return array
     */
    public function get(string $accountId, string $containerId, string $workspaceId, string $triggerId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/triggers/%s', $accountId, $containerId, $workspaceId, $triggerId);

        $result = $this->client->accounts_containers_workspaces_triggers->get($path);

        return $result;
    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/triggers/list
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * 
     * @return array
     */
    public function list(string $accountId, string $containerId, string $workspaceId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces_triggers->listAccountsContainersWorkspacesTriggers($path);

        return $result;
    }

    /**
     * create
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/triggers/create
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var GtmTrigger $object
     * 
     * @return array
     */
    public function create(string $accountId, string $containerId, string $workspaceId, GtmTrigger $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces_triggers->create($path, $object);

        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/triggers/update
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $triggerId
     * @var GtmTrigger $object
     * 
     * @return array
     */
    public function update(string $accountId, string $containerId, string $workspaceId, string $triggerId, GtmTrigger $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/triggers/%s', $accountId, $containerId, $workspaceId, $triggerId);

        $result = $this->client->accounts_containers_workspaces_triggers->update($path, $object);

        return $result;
    }

    /**
     * revert
     * 
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/containers/workspaces/triggers/revert
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $triggerId
     * 
     * @return array
     */
    public function revert(string $accountId, string $containerId, string $workspaceId, string $triggerId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/triggers/%s', $accountId, $containerId, $workspaceId, $triggerId);

        $result = $this->client->accounts_containers_workspaces_triggers->revert($path);

        return $result;
    }

    /**
     * delete
     * 
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/containers/workspaces/triggers/delete
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $triggerId
     * 
     * @return array
     */
    public function delete(string $accountId, string $containerId, string $workspaceId, string $triggerId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/triggers/%s', $accountId, $containerId, $workspaceId, $triggerId);

        $result = $this->client->accounts_containers_workspaces_triggers->delete($path);

        return $result;
    }
}
