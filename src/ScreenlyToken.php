<?php namespace ScreenlyApi;

class ScreenlyToken
{
    use ScreenlyGuzzle;

    /**
     * Screenly account username
     * @var array|false|string|null
     */
    private $username;
    
    /**
     * Screenly account password
     * @var array|false|string|null
     */
    private $password;
    
    /**
     * name returned from token request
     * @var null
     */
    public $name = null;
    
    /**
     * Token scope returned with token request
     * @var null
     */
    public $scope = null;
    
    /**
     * Access token
     *
     * @var null
     */
    public $token = null;
    
    /**
     * Date token was created
     * @var null
     */
    public $created_at = null;
    
    /**
     * url for the generated token
     * @var null
     */
    public $url = null;
    
    /**
     * get username and password from config file
     *
     * ScreenlyAPI constructor.
     */
    public function __construct()
    {
        // Get username and password from the .env file
        $this->username = getenv('SCREENLY_USERNAME', null);
        $this->password = getenv('SCREENLY_PASSWORD', null);
    }
    
    /**
     * Authenticate and get access token
     * @return array|null
     */
    public function get()
    {
        $token = $this->retrieveToken();
        
        $this->name = $token['name'];
        $this->scope = $token['scope'];
        $this->token = $token['token'];
        $this->created_at = $token['created_at'];
        $this->url = $token['url'];
        
        return $this;
    }
    
    /**
     * Get an access token from Screenly
     * @return bool|mixed
     */
    public function retrieveToken()
    {
        $verb = 'POST';
        $endpoint = 'https://api.screenlyapp.com/api/v3/tokens/';
        
        $headers = ['Content-Type' => 'application/json'];
        $request_param = [
                'username' => $this->username,
                'password' => $this->password,
        ];
        $request_data = json_encode($request_param);
        
        $options = [
                'headers' => $headers,
                'body' => $request_data,
        ];
        
        return $this->sendRequest($verb, $endpoint, $options);
    }
}
