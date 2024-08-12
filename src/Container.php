<?php

namespace gtm;

use Exception;
use gtm\Helpers\Formatter;
use gtm\Response;
use Google\Service\TagManager\{AccountsContainers, Container as GtmContainer};

/**
 * Container service.
 * 
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @since 1.0.0
 * @version 1.0.0
 */
class Container extends Base
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
     * @var Google\Service\TagManager\Account $gtmObj
     * 
     * @return array
     */
    public static function getFormattedOutput($gtmObj)
    {
        return [
            'publicId' => $gtmObj['publicId'],
            'tagManagerUrl' => $gtmObj['tagManagerUrl'],
            'accountId' => $gtmObj['accountId'],
            'containerId' => $gtmObj['containerId'],
            'name' => $gtmObj['name'],
            'usageContext' => $gtmObj['usageContext'],
            'path' => $gtmObj['path']
        ];
    }

    /**
     * get
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/get
     * 
     * @var string $accountId
     * @var string $containerId
     * 
     * @return array
     */
    public function get($accountId, $containerId)
    {
        $path = sprintf('accounts/%s/containers/%s', $accountId, $containerId);

        $containerObj = $this->client->accounts_containers->get($path);

        $result = [];

        if ($containerObj) {
            $result = self::getFormattedOutput($containerObj);
        }

        return $result;

    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/list
     * 
     * @var string $accountId
     * 
     * @return array
     */
    public function list($accountId)
    {
        $result = [];
        $path = sprintf('accounts/%s', $accountId);

        $containerObjs = $this->client->accounts_containers->listAccountsContainers($path);

        foreach ($containerObjs as $rowKey => $containerObj) {
            array_push($result, self::getFormattedOutput($containerObj));
        }

        return $result;
    }

    /**
     * create
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/create
     * 
     * @var string $accountId
     * @var string $name
     * @var array $usageContext
     * 
     * @return array
     */
    public function create($accountId, $name, $usageContext)
    {
        // check if path exists
        $path = sprintf('accounts/%s', $accountId);

        $gtmAccount = new GtmContainer();
        $gtmAccount->accountId = $accountId;
        $gtmAccount->name = $name;
        $gtmAccount->usageContext = $usageContext;

        $containerObj = $this->client->accounts_containers->create($path, $gtmAccount);

        $result = [];

        if ($containerObj) {
            $result = self::getFormattedOutput($containerObj);
        }
       
        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/update
     * 
     * @var string $containerId
     * @var string $accountId
     * @var string $name
     * @var array $usageContext
     * 
     * @return array
     */
    public function update($containerId, $accountId, $name, $usageContext)
    {
        // check if path exists
        $path = sprintf('accounts/%s', $accountId);

        $gtmAccount = new GtmContainer();
        $gtmAccount->containerId = $containerId;
        $gtmAccount->accountId = $accountId;
        $gtmAccount->name = $name;
        $gtmAccount->usageContext = $usageContext;

        $containerObj = $this->client->accounts_containers->update($path, $gtmAccount);

        $result = [];

        if ($containerObj) {
            $result = self::getFormattedOutput($containerObj);
        }
       
        return $result;
    }
}
