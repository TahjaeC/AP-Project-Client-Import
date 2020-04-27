<?php

namespace App\Services;

use App\Cart;
use GuzzleHttp\Client as GuzzleHttpClient;
use Log;

class CartService {
    protected $apiBaseUrl;
    /**
     * @instanceof GuzzleHttp\Client
     */
    protected $client;

    public function __construct($apiBaseUrl="http://localhost:8001/"){
        $this->apiBaseUrl = $apiBaseUrl;
        $this->client = new GuzzleHttpClient([
            // Base URI is used with relative requests
            'base_uri' => $apiBaseUrl,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

    }

    public function confirm($sales_arr, $newStock)
    {
        try{
            $response_prod = $this->client->request('PUT','api/c-confirm',[
                'form_params' => [
                    "stock" => $newStock,
                ]
            ]);

            $response_sales = $this->client->request('POST','api/c-confirm',[
                'form_params' => [
                    "name" => $sales_arr['name'],
                    "sale" => $sales_arr['sale']
                ]
            ]);

            $contents_prod = $response_prod->getBody()->getContents();
            $contents_sales = $response_sales->getBody()->getContents();
            $result_prod = collect(json_decode($contents_prod));
            $result_sales = collect(json_decode($contents_sales));
            return "it was successful";
        }catch(\Exception $e){
            Log::error($e);
            return collect([]);
        }
    }
    public function index()
    {
        try{
            $response = $this->client->request('GET','api/chart/index');
            $contents = $response->getBody()->getContents();
            $report = collect(json_decode($contents));

            return $report;
            
        }catch(\Exception $e){
            Log::error($e);
            return collect([]);
        }
        
    }       

}
