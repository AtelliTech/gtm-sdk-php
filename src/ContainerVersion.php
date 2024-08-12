<?php

namespace gtm;

use Google\Service\TagManager\ContainerVersion as GtmContainerVersion;


/**
 * ContainerVersion service.
 * 
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @author Alex Tsai <alex.tsai@atelli.ai>
 * @since 1.0.0
 * @version 2.0.0
 */
class ContainerVersion extends Base
{
    /**
     * @var Google\Client $client
     */
    private $client;

    /**
     * Construct
     * 
     * @var \Google\Client $client
     * @var array $config
     */
    public function __construct($client)
    {
        $this->client = new \Google\Service\TagManager($client);
    }

    /**
     * get
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/versions/get
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $versionId
     * 
     * @return array
     */
    public function get(string $accountId, string $containerId, string $versionId)
    {
        $path = sprintf('accounts/%s/containers/%s/versions/%s', $accountId, $containerId, $versionId);

        $result = $this->client->accounts_containers_versions->get($path);

        return $result;
    }

    /**
     * update
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/versions/update
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $versionId
     * @var GtmContainerVersion $containerVersion
     * 
     * @return array
     */
    public function update(string $accountId, string $containerId, string $versionId, GtmContainerVersion $containerVersion)
    {
        $path = sprintf('accounts/%s/containers/%s/versions/%s', $accountId, $containerId, $versionId);

        $result = $this->client->accounts_containers_versions->update($path, $containerVersion);

        return $result;
    }

    /**
     * live
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/versions/live
     * 
     * @var string $accountId
     * @var string $containerId
     * 
     * @return array
     */
    public function live(string $accountId, string $containerId)
    {
        $path = sprintf('accounts/%s/containers/%s', $accountId, $containerId);

        $result = $this->client->accounts_containers_versions->live($path);

        return $result;
    }

    /**
     * publish
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/versions/publish
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $versionId
     * 
     * @return array
     */
    public function publish(string $accountId, string $containerId, string $versionId)
    {
        $path = sprintf('accounts/%s/containers/%s/versions/%s', $accountId, $containerId, $versionId);

        $result = $this->client->accounts_containers_versions->publish($path);

        return $result;
    }

    /**
     * setLatest
     * 
     * @see https://developers.google.com/tag-manager/api/v2/reference/accounts/containers/versions/set_latest
     * 
     * @var string $accountId
     * @var string $containerId
     * @var string $versionId
     * 
     * @return array
     */
    public function setLatest(string $accountId, string $containerId, string $versionId)
    {
        $path = sprintf('accounts/%s/containers/%s/versions/%s', $accountId, $containerId, $versionId);

        $result = $this->client->accounts_containers_versions->set_latest($path);

        return $result;
    }
}
