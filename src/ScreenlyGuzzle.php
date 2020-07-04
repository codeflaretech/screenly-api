<?php namespace ScreenlyAPI;

use GuzzleHttp;

trait ScreenlyGuzzle
{
    /**
     * General send an HTTP request via Guzzle
     */
    protected static function sendRequest($verb, $endpoint, $options)
    {
        // Send the request
        $client = new Client(); //GuzzleHttp\Client
        
        try {
            $response = $client->request($verb, $endpoint, $options);
        } catch (\GuzzleException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            return false;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            return false;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            return false;
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            return false;
        }
        
        return json_decode($response->getBody(), true);
    }
}
