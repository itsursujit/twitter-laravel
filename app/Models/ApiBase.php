<?php
namespace App\Models;


use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Config;

class ApiBase extends Authenticatable
{
    public $url;
    public $port;

    public function __construct()
    {
        parent::__construct();
        $this->url = Config::get('services.api.url');
        $this->port = Config::get('services.api.port');
    }

    public function getNow($url, $data) {
        return $this->guzzleTransaction('get', $url, $data);
    }

    public function postNow($url, $data) {
        return $this->guzzleTransaction('post', $url, $data);
    }

    public function putNow($url, $data) {
        return $this->guzzleTransaction('put', $url, $data);
    }

    public function uploadNow($url, $data) {
        $files = [
            array(
                'name' => 'test_image',
                'filename' => $data->getClientOriginalname(),
                'contents' => fopen($data->path(), 'r'),
                'headers' => [
                    'denomination' => 'Test Population',
                    'age' => 25,
                    'content-length' => 100010
                ]
            )
            ];
        return $this->guzzleTransaction('upload', $url, $files);
    }

    public function deleteNow($url, $data) {
        return $this->guzzleTransaction('delete', $url, $data);
    }

    public function guzzleTransaction($type, $url, $data) {
        $url = $this->url . $url;
        try {
            $client = new GuzzleHttpClient();
            $headers = [
                'Accept' => 'application/json'
            ];
            switch($type) {
                case 'get':
                    $apiRequest = $client->get($url,['headers' => $headers,'json' => $data]);
                    break;
                case 'upload':
                    $apiRequest = $client->post($url,['headers' => $headers, 'multipart' => $data ]);
                    break;
                case 'post':
                    $apiRequest = $client->post($url,['headers' => $headers, 'json' => $data ]);
                    break;
                case 'put':
                    $apiRequest = $client->put($url,['headers' => $headers,'json' => $data]);
                    break;
                case 'delete':
                    $apiRequest = $client->delete($url,['headers' => $headers,'json' => $data]);
                    break;
                default:
                    $apiRequest = $client->get($url,['headers' => $headers,'json' => $data]);
                    break;
            }

            $content = json_decode($apiRequest->getBody()->getContents());
            return $content;
        } catch (RequestException $re) {
            return json_encode(["error" => $re->getMessage()]);
            //For handling exception
        }
    }

}