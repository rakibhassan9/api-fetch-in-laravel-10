<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    

    public function index(){
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:8000/api/login';
        $data['email'] = 'rakib@gmail.com';
        $data['password'] = '123456';

        $request = $client->post($url, [
            'form_params' => $data
        ]);

        $response = $request->getBody();

        $info = json_decode($response, true);
        
        $token = $info['data']['token'];

        $product_url = 'http://localhost:8000/api/products';

        $product_requests = $client->get($product_url, [
            'headers'=> ['Authorization' => 'Bearer ' .$token,]
        ]);

        $product_response = json_decode($product_requests->getBody(), true);

        $products = $product_response['data'];

        return view('products', compact('products'));

    }
}
