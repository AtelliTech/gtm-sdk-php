<?php

namespace gtm;

/**
 * Client.
 * 
 * @author Edward Ai <edward.ai@adgeek.com.tw>
 * @since 1.0.0
 * @version 1.0.0
 */
class Client
{
    private $client;

    /**
     * @var string $applicationName
     */
    private $applicationName;

    /**
     * @var string $developerKey
     */
    private $developerKey;

    /**
     * @var string $clientId
     */
    private $clientId;

    /**
     * @var string $clientSecret
     */
    private $clientSecret;

    /**
     * @var array $scopeList
     */
    private $scopeList;

    /**
     * @var string $refreshToken
     */
    private $refreshToken;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->client = new \Google\Client();
    }

    /**
     * set application name
     * 
     * @param string $name
     */
    public function setApplicationName(string $name)
    {
        $this->applicationName = $name;
    }

    /**
     * set developer key
     * 
     * @param string $key
     */
    public function setDeveloperKey(string $key)
    {
        $this->developerKey = $key;
    }

    /**
     * set client id
     * 
     * @param string $id
     */
    public function setClientId(string $id)
    {
        $this->clientId = $id;
    }

    /**
     * set scope
     * 
     * @param array $scopes
     */
    public function setScopes(array $scopes)
    {
        $this->scopeList = $scopes;
    }

    /**
     * set client secret
     * 
     * @param string $secret
     */
    public function setClientSecret(string $secret)
    {
        $this->clientSecret = $secret;
    }

    /**
     * set refresh token
     * 
     * @param string $token
     */
    public function setRefreshToken(string $token)
    {
        $this->refreshToken = $token;
    }


    /**
     * generate.
     */
    public function generate()
    {
        if (empty($this->clientSecret)) {
            throw new Exception("Please use setClientSecret() function to set clientSecret parameter.", 400);
        }

        if (empty($this->refreshToken)) {
            throw new Exception("Please use setRefreshToken() function to set refreshToken parameter.", 400);
        }

        $this->client->setApplicationName($this->applicationName);
        $this->client->setDeveloperKey($this->developerKey);
        $this->client->setAccessType('offline');
        $this->client->setClientId($this->clientId);
        $this->client->setClientSecret($this->clientSecret);
        $this->client->setScopes($this->scopeList);
        $this->client->fetchAccessTokenWithRefreshToken($this->refreshToken);

        return $this->client;
    }

}
