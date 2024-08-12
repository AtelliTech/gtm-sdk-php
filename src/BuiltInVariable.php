<?php

namespace gtm;

use Exception;

/**
 * Built-in variable service.
 * 
 * @author Leo Wang <leo.wang@cyntelli.com>
 * @author Alex Tsai <alex.tsai@atelli.ai>
 * @version 2.0.0
 */
class BuiltInVariable extends Base
{
    /**
     * @var \Google\Service\TagManager $client
     */
    private $service;

    /**
     * Construct
     * 
     * @var \Google\Client $client
     */
    public function __construct(\Google\Client $client)
    {
        $this->service = new \Google\Service\TagManager($client);
    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/built_in_variables/list
     * @see https://github.com/googleapis/google-api-php-client-services/blob/master/src/TagManager/Resource/AccountsContainersWorkspacesBuiltInVariables.php
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * 
     * @return object
     */
    public function list(string $accountId, string $containerId, string $workspaceId): object
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->service->accounts_containers_workspaces_built_in_variables->listAccountsContainersWorkspacesBuiltInVariables($path);

        return $result;
    }

    /**
     * create
     *
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/built_in_variables/create
     *
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var array $types
     *
     * @return object
     */
    public function create(string $accountId, string $containerId, string $workspaceId, array $types): object
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->service->accounts_containers_workspaces_built_in_variables->create($path, $types);

        return $result;
    }
}
