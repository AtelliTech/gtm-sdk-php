<?php

namespace gtm;

use Exception;
use Google\Service\TagManager\{Parameter, RevertVariableResponse, Variable as GtmVariable};


/**
 * Variable service.
 *
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @author Alex Tsai <alex.tsai@atelli.ai>
 * @since 1.0.0
 * @version 2.0.0
 */
class Variable extends Base
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
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/variables/get
     *
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $variableId
     *
     * @return array
     */
    public function get(string $accountId, string $containerId, string $workspaceId, string $variableId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/variables/%s', $accountId, $containerId, $workspaceId, $variableId);

        $result = $this->client->accounts_containers_workspaces_variables->get($path);

        return $result;
    }

    /**
     * list
     *
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/variables/list
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

        $result = $this->client->accounts_containers_workspaces_variables->listAccountsContainersWorkspacesVariables($path);

        return $result;
    }

    /**
     * create
     *
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/variables/create
     *
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var GtmVariable $object
     *
     * @return array
     */
    public function create(string $accountId, string $containerId, string $workspaceId, GtmVariable $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces_variables->create($path, $object);

        return $result;
    }

    /**
     * update
     *
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/variables/update
     *
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $variableId
     * @var GtmVariable $object
     *
     * @return array
     */
    public function update(string $accountId, string $containerId, string $workspaceId, string $variableId, GtmVariable $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/variables/%s', $accountId, $containerId, $workspaceId, $variableId);

        $result = $this->client->accounts_containers_workspaces_variables->update($path, $object);

        return $result;
    }

    /**
     * delete
     *
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/containers/workspaces/variables/delete
     *
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $variableId
     * @return void
     */
    public function delete(string $accountId, string $containerId, string $workspaceId, string $variableId): void
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/variables/%s', $accountId, $containerId, $workspaceId, $variableId);

        $this->client->accounts_containers_workspaces_variables->delete($path);
    }

    /**
     * revert
     *
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/containers/workspaces/variables/revert
     *
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $variableId
     * @return RevertVariableResponse
     */
    public function revert(string $accountId, string $containerId, string $workspaceId, string $variableId): RevertVariableResponse
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/variables/%s', $accountId, $containerId, $workspaceId, $variableId);

        $result = $this->client->accounts_containers_workspaces_variables->revert($path);

        return $result;
    }
}
