<?php

namespace gtm;

use Exception;
use Google\Service\TagManager\{Condition, Tag as GtmTag, Parameter};


/**
 * Tag service.
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @author Alex Tsai <alex.tsai@atelli.ai>
 * @since 1.0.0
 * @version 2.0.0
 */
class Tag extends Base
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
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/tags/get
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $tagId
     * 
     * @return array
     */
    public function get(string $accountId, string $containerId, string $workspaceId, string $tagId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/tags/%s', $accountId, $containerId, $workspaceId, $tagId);

        $result = $this->client->accounts_containers_workspaces_tags->get($path);

        return $result;
    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/tags/list
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

        $result = $this->client->accounts_containers_workspaces_tags->listAccountsContainersWorkspacesTags($path);

        return $result;
    }

    /**
     * create
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/tags/create
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var GtmTag $object
     * 
     * @return array
     */
    public function create(string $accountId, string $containerId, string $workspaceId, GtmTag $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces_tags->create($path, $object);

        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/tags/update
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $tagId
     * @var GtmTag $object
     * 
     * @return array
     */
    public function update(string $accountId, string $containerId, string $workspaceId, string $tagId, GtmTag $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/tags/%s', $accountId, $containerId, $workspaceId, $tagId);

        $result = $this->client->accounts_containers_workspaces_tags->update($path, $object);
       
        return $result;
    }

    /**
     * delete
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/tags/delete
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $tagId
     * 
     * @return array
     */
    public function delete(string $accountId, string $containerId, string $workspaceId, string $tagId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/tags/%s', $accountId, $containerId, $workspaceId, $tagId);

        $result = $this->client->accounts_containers_workspaces_tags->delete($path);

        return $result;
    }

    /**
     * revert
     * 
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/containers/workspaces/tags/revert
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $tagId
     * 
     * @return array
     */
    public function revert(string $accountId, string $containerId, string $workspaceId, string $tagId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/tags/%s', $accountId, $containerId, $workspaceId, $tagId);

        $result = $this->client->accounts_containers_workspaces_tags->revert($path);

        return $result;
    }
}
