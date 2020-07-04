<?php namespace ScreenlyApi;

class ScreenlyAssets
{
    use ScreenlyGuzzle;

    /**
     * Get an access token from Screenly
     * @return bool|mixed
     */
    public function getAssets($token)
    {
        $verb = 'GET';
        $endpoint = 'https://api.screenlyapp.com/api/v3/assets/';
        
        $headers['Authorization'] = 'Token ' . $token;
        
        $options = [
                'headers' => $headers
        ];
        
        return $this->sendRequest($verb, $endpoint, $options);
    }
}
