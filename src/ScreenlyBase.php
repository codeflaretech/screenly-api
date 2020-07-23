<?php namespace ScreenlyApi;

abstract class ScreenlyBase
{
     use ScreenlyGuzzle;
     
    /**
     * Access token from Screenly
     *
     * @var
     */
    private $token;
    
    /**
     * Headers for HTTP Request.  Will contain token initially
     *
     * @var null
     */
    protected $headers = null;
    
    /**
     * Base endpoint for the Screenly Assets
     *
     * @var string
     */
    protected $endpoint;
    
    /**
     * ScreenlyBase constructor.
     */
    public function __construct()
    {
        $this->token = getenv('SCREENLY_TOKEN');
        
        $this->headers[ 'Authorization' ] = 'Token ' . $this->token;
        $this->headers[ 'Content-Type' ] = 'application/json';
    }
    
    /**
     * Get list of assets
     *
     * @return bool|mixed
     */
    public function list()
    {
        $verb = 'GET';
        $options = [
                'headers' => $this->headers,
        ];
        
        return $this->sendRequest($verb, $this->endpoint, $options);
    }
    
    /**
     * Retrieve asset by id
     *
     * @param $id | ex. 5ef8e72aca233a0013b3e15a
     *
     * @return bool|mixed
     */
    public function get($id)
    {
        $verb = 'GET';
        $endpoint = $this->endpoint . $id . '/';
        
        $headers = $this->headers;
        
        $options = [
                'headers' => $headers,
        
        ];
        
        return $this->sendRequest($verb, $endpoint, $options);
    }
    
    /**
     * Delete an asset using the id
     * @param $id | ex. 5ef8e72aca233a0013b3e15a
     *
     * @return bool|mixed
     */
    public function destroy($id)
    {
        $verb = 'DELETE';
        $endpoint = $this->endpoint . $id . '/';
    
        $headers = $this->headers;
    
        $options = [
                'headers' => $this->headers,
        ];
    
        return $this->sendRequest($verb, $endpoint, $options);
    }
    
}
