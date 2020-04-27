<?php

namespace App\Services;

use App\Products;
use GuzzleHttp\Client as GuzzleHttpClient;
use Log;

/**
 * @group Products Service 
 * 
 * Part of API that performs the requests
 */
class ProductService {
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
    public function searchByName($query){
        try{
            $response = $this->client->request('GET','api/products/searchByName',[
                'query' => [
                    'query' => $query
                ]
            ]);
            $contents = $response->getBody()->getContents();
            $result = collect(json_decode($contents));

            return $result;
        }catch(\Exception $e){
            Log::error($e);
            return collect([]);
        }
    }

    public function disp(){
        try{
            $response = $this->client->request('GET','api/products/disp');
            $contents = $response->getBody()->getContents();
            $result = collect(json_decode($contents));

            return $result;
        }catch(\Exception $e){
            Log::error($e);
            return collect([]);
        }
    }

    public function display(){
        try{
            $response = $this->client->request('GET','api/products/display');
            $contents = $response->getBody()->getContents();
            $result = collect(json_decode($contents));

            return $result;
        }catch(\Exception $e){
            Log::error($e);
            return collect([]);
        }
    }
    /**
     * @param $update_arr - object of updated product details
     */
    public function update($update_arr)
    {

        //eve though the variable $update_arr is named "arr", using the arrow
        //notation below it is being treated like an object
        //i will perform some checks to always ensure it is an object
        /*if(is_array($update_arr)){ //convert to object
            $update_arr = json_decode(json_encode($update_arr));
        }*/
        
        try{
            $response = $this->client->request('PUT','api/products/update',[
                'form_params' => [
                    "id" => $update_arr['id'],
                    "name" => $update_arr['name'],
                    "cost" => $update_arr['cost'],
                    "category" => $update_arr['category'],
                    "stock" => $update_arr['stock'],
                    "item_image" => $update_arr['iimage'],
                    "image" => $update_arr['image'],
                    "audio" => $update_arr['audio'],
                    "creator" => $update_arr['creator']
                ]
            ]);
            $contents = $response->getBody()->getContents();
            $result = collect(json_decode($contents));
            return "item updated in database";

        }catch(\Exception $e){
            Log::error($e);
            return "item not updated successfully";
        }
    }

    public function destroy($id)
    {
        try{
            
            $result = $this->client->delete("api/products/destroy/$id");
            return "item succesfully deleted";
            
        }catch(\Exception $e){
            Log::error($e);
            return collect([]);
        }
    }

    public function store($product)
    {
        try{
            $response = $this->client->request('POST','api/products/store',[
                'form_params' => [
                    "name" => $product['name'],
                    "cost" => $product['cost'],
                    "category" => $product['category'],
                    "stock" => $product['stock'],
                    "item_image" => $product['iimage'],
                    "image" => $product['image'],
                    "audio" => $product['audio'],
                    "created_by" => $product['creator']
                ]
            ]);

            $contents = $response->getBody()->getContents();
            $result = collect(json_decode($contents));
            return "item add to database";
            return $result;
        }catch(\Exception $e){
            Log::error($e);
            return collect([]);
        }
    }
}
