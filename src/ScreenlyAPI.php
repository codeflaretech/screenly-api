<?php namespace ScreenlyAPI;

use GuzzleHttp\Client;
use MinistryPlatformAPI\OAuth\oAuthAuthorizationCode;
use MinistryPlatformAPI\OAuth\oAuthClientCredentials;

class ScreenlyAPI
{
    /**
     * OAuth access token and other credentials
     * @var null
     */
    protected $token = null;

    /**
     * Error message from Guzzle requests
     *
     * @var null
     */
    protected $errorMessage = null;

    /**
     * The API endopoint
     * @var null
     */
    protected $apiEndpoint = null;

    /**
     * HTTP Headers for the API requests
     * @var
     */
    protected $headers;


    public function __construct()
    {
        $this->token = 'asdf';
    }
    
    
    
}
