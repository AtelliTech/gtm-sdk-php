<?php

namespace gtm;

use Exception;
use gtm\Helpers\Formatter;
use gtm\Response;
use Google\Service\TagManager\{UserPermission as GtmUserPermission, AccountAccess as GtmAccountAccess, ContainerAccess as GtmContainerAccess};


/**
 * UserPermission service.
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @author Alex Tsai <alex.tsai@atelli.ai>
 * @since 1.0.0
 * @version 2.0.0
 */
class UserPermission extends Base
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
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/user_permissions/get
     * 
     * @var string $accountId
     * @var string $userPermissionId
     * 
     * @return array
     */
    public function get(string $accountId, string $userPermissionId)
    {
        $path = sprintf('accounts/%s/user_permissions/%s', $accountId, $userPermissionId);

        $result = $this->client->accounts_user_permissions->get($path);

        return $result;

    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/user_permissions/list
     * 
     * @var string $accountId
     * 
     * @return array
     */
    public function list(string $accountId)
    {
        $path = sprintf('accounts/%s', $accountId);

        $result = $this->client->accounts_user_permissions->listAccountsUserPermissions($path);

        return $result;
    }

    /**
     * create
     * 
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/user_permissions/create
     * 
     * @var string $accountId
     * @var GtmUserPermission $gtmUserPermission
     * 
     * @return array
     */
    public function create(string $accountId, GtmUserPermission $gtmUserPermission)
    {
        $path = sprintf('accounts/%s', $accountId);

        $result = $this->client->accounts_user_permissions->create($path, $gtmUserPermission);
       
        return $result;
    }    

    /**
     * update
     * 
     * @see https://developers.google.com/tag-platform/tag-manager/api/v2/reference/accounts/user_permissions/update
     * 
     * @var string $userPermissionId
     * @var string $accountId
     * @var GtmUserPermission $gtmUserPermission
     * 
     * @return array
     */
    public function update(string $userPermissionId, string $accountId, GtmUserPermission $gtmUserPermission)
    {
        $path = sprintf('accounts/%s/user_permissions/%s', $accountId, $userPermissionId);

        $result = $this->client->accounts_user_permissions->update($path, $gtmUserPermission);

        return $result;
    }    

}
