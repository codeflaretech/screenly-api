<?php namespace ScreenlyApi;

use GuzzleHttp\Client;

trait ScreenlyGuzzle
{
    /**
     * General send an HTTP request via Guzzle
     */
    protected function sendRequest($verb, $endpoint, $options)
    {
        // Send the request
        $client = new Client(); //GuzzleHttp\Client
        
        try {
            $response = $client->request($verb, $endpoint, $options);
        } catch (\GuzzleException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            echo $this->errorMessage;
            return false;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            echo $this->errorMessage;
            return false;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            echo $this->errorMessage;
            return false;
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            $this->errorMessage = $e->getResponse()->getBody()->getContents();
            echo $this->errorMessage;
            return false;
        }
        
        return json_decode($response->getBody(), true);
    }
}
