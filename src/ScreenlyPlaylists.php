<?php namespace ScreenlyApi;

class ScreenlyPlaylists
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
     * Set some preliminary values. ScreenlyAssets constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        
        $this->endpoint = 'https://api.screenlyapp.com/api/v3/playlists/';
        
        $this->headers[ 'Authorization' ] = 'Token ' . $token;
        $this->headers[ 'Content-Type' ] = 'application/json';
    }
    
    /**
     * Get list of playlists
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
     * Create an asset from an uploaded image
     * @param $url | Link to the image / video, etc.
     * @param $folder | Screenly folder to contain the uploaded file
     * @param null $title | Title to display of the image
     *
     * @return bool|mixed
     */
    public function create($url, $folder, $title = null)
    {
        $verb = 'POST';
        $endpoint = $this->endpoint;
        
        $headers = $this->headers;
        $headers[ 'Content-type' ] = 'application/json';
        $headers[ 'User-Agent' ] = 'Mozilla/5.0 (X11; Linux i686; rv:2.0.1) Gecko/20100101 Firefox/4.0.1';
        
        $request_param = [
                'disable_verification' => false,
                'folder_name' => $folder,
                'source_url' => $url,
                'title' => $title,
        ];
        $request_data = json_encode($request_param);
        
        $options = [
                'headers' => $headers,
                'body' => $request_data,
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
