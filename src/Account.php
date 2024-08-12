<?php

namespace gtm;

use Exception;
use gtm\Helpers\Formatter;
use gtm\Response;
use Google_Service_TagManager_Account as GtmAccount;



/**
 * Account service.
 * 
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @since 1.0.0
 * @version 1.0.0
 */
class Account extends Base
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
            'accountId' => $gtmObj['accountId'],
            'containerId' => $gtmObj['containerId'],
            'name' => $gtmObj['name'],
            'parentFolderId' => $gtmObj['parentFolderId'],
            'path' => $gtmObj['path']
        ];
    }

    /**
     * get
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/get
     * 
     * @var string $accountId
     * 
     * @return array
     */
    public function get($accountId)
    {
        $path = sprintf('accounts/%s', $accountId);

        $accountObj = $this->client->accounts->get($path);

        $result = [];

        if ($accountObj) {
            $result = self::getFormattedOutput($accountObj);
        }

        return $result;

    }

    /**
     * list
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/list
     * 
     * @return array
     */
    public function list()
    {
        $result = [];

        $accountObjs = $this->client->accounts->listAccounts()->getAccount();

        foreach ($accountObjs as $rowKey => $accountObj) {
            array_push($result, self::getFormattedOutput($accountObj));
        }

        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/update
     * 
     * @var string $accountId
     * @var string $name
     * @var string $shareData
     * 
     * @return array
     */
    public function update($accountId, $name, $shareData)
    {
        // check if path exists
        $path = sprintf('accounts/%s', $accountId);

        $gtmAccount = new GtmAccount();
        $gtmAccount->accountId = $accountId;
        $gtmAccount->name = $name;
        $gtmAccount->shareData = $shareData;

        $accountObj = $this->client->accounts->update($path, $gtmAccount);

        $result = [];

        if ($accountObj) {
            $result = self::getFormattedOutput($accountObj);
        }
       
        return $result;
    }    

}
