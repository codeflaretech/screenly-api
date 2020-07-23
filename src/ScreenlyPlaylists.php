<?php namespace ScreenlyApi;

class ScreenlyPlaylists extends ScreenlyBase
{
    protected $endpoint = 'https://api.screenlyapp.com/api/v3/playlists/';
    
    public function create($assets, $groups, $predicate, $title, $priority=0)
    {
        $verb = 'POST';
        $endpoint = $this->endpoint;
    
        $headers = $this->headers;
        $headers[ 'User-Agent' ] = 'Mozilla/5.0 (X11; Linux i686; rv:2.0.1) Gecko/20100101 Firefox/4.0.1';
    
        $request_param = [
                'assets' => $assets,
                'groups' => $groups,
                'predicate' => $predicate,
                'title' => $title,
                'priority' => $priority
        ];
        $request_data = json_encode($request_param);
    
        $options = [
                'headers' => $headers,
                'body' => $request_data,
        ];
    
        return $this->sendRequest($verb, $endpoint, $options);
    }
}
