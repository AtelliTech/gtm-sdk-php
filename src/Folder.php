<?php

namespace gtm;

use Google\Service\TagManager\{Folder as GtmFolder};



/**
 * Folder service.
 * 
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @author Alex Tsai <alex.tsai@cyntelli.com>
 * @since 1.0.0
 * @version 2.0.0
 */
class Folder extends Base
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
     * getFormattedOutput
     * 
     * @var Google\Service\TagManager\Tag $gtmObj
     * 
     * @return array
     */
    public static function getFormattedOutput($gtmObj)
    {
        return [
            'accountId' => $gtmObj->accountId,
            'containerId' => $gtmObj->containerId,
            'folderId' => $gtmObj->folderId,
            'name' => $gtmObj->name,
            'notes' => $gtmObj->notes,
            'path' => $gtmObj->path,
            'workspaceId' => $gtmObj->workspaceId
        ];
    }

    /**
     * get
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/folders/get
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $folderId
     * 
     * @return array
     */
    public function get(string $accountId, string $containerId, string $workspaceId, string $folderId)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/folders/%s', $accountId, $containerId, $workspaceId, $folderId);

        $result = $this->client->accounts_containers_workspaces_folders->get($path);

        return $result;
    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/folders/list
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

        $result = $this->client->accounts_containers_workspaces_folders->listAccountsContainersWorkspacesFolders($path);

        return $result;
    }

    /**
     * create
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/folders/create
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var GtmFolder $object
     * 
     * @return array
     */
    public function create(string $accountId, string $containerId, string $workspaceId, GtmFolder $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s', $accountId, $containerId, $workspaceId);

        $result = $this->client->accounts_containers_workspaces_folders->create($path, $object);

        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/folders/update
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $workspaceId
     * @var string $folderId
     * @var GtmFolder $object
     * 
     * @return array
     */
    public function update(string $accountId, string $containerId, string $workspaceId, string $folderId, GtmFolder $object)
    {
        $path = sprintf('accounts/%s/containers/%s/workspaces/%s/folders/%s', $accountId, $containerId, $workspaceId, $folderId);

        $result = $this->client->accounts_containers_workspaces_folders->update($path, $object);

        return $result;
    }

    // /**
    //  * entities
    //  * 
    //  * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/workspaces/folders/entities
    //  * 
    //  * @var array $config
    //  * @var string $folderId
    //  * 
    //  * @return array
    //  */
    // public function entities($config, $folderId)
    // {
    //     if (!array_key_exists('account_id', $config)) {
    //         throw new Exception('[Folder] account_id is required');
    //     }

    //     if (!array_key_exists('container_id', $config)) {
    //         throw new Exception('[Folder] container_id is required');
    //     }

    //     if (!array_key_exists('workspace_id', $config)) {
    //         throw new Exception('[Folder] workspace_id is required');
    //     }

    //     $accountId = $config['account_id'];
    //     $containerId = $config['container_id'];
    //     $workspaceId = $config['workspace_id'];

    //     $path = sprintf('accounts/%s/containers/%s/workspaces/%s/folders/%s', $accountId, $containerId, $workspaceId, $folderId);

    //     $result = [];


    //     $folderEntitiesObj = $this->client->accounts_containers_workspaces_folders->entities($path);

    //     if ($folderEntitiesObj) {

    //         $tagObjs = $folderEntitiesObj->getTag();
    //         $triggerObjs = $folderEntitiesObj->getTrigger();
    //         $variableObjs = $folderEntitiesObj->getVariable();

    //         foreach ($tagObjs as $rowKey => $tagObj) {
    //             $result['tag'][$rowKey] = Tag::getFormattedOutput($tagObj);
    //         }
    //         foreach ($triggerObjs as $rowKey => $triggerObj) {
    //             $result['trigger'][$rowKey] = Trigger::getFormattedOutput($triggerObj);
    //         }
    //         foreach ($variableObjs as $rowKey => $variableObj) {
    //             $result['variable'][$rowKey] = Variable::getFormattedOutput($variableObj);
    //         }
    //     }
       
    //     return $result;
    // }
}
