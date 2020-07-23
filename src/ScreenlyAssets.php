<?php namespace ScreenlyApi;

class ScreenlyAssets extends ScreenlyBase
{
    protected $endpoint = 'https://api.screenlyapp.com/api/v3/assets/';
    
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
}
