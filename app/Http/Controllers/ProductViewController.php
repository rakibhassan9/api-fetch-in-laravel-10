<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    

    public function index(){
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:8000/api/login';
        $date['email'] = 'rakib@gmail.com';
        $data['password'] = '123456';

        $request = $client->post($url, [
            'form_params' => $data
        ]);

        $response = $request->getBody();
    }
}
