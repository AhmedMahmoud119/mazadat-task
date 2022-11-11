<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AbilityResource;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriesController extends Controller
{
    public function getAllCats(){
        $client = new Client();
        try {
            $response = $client->request('GET', 'https://staging.mazaady.com/api/get_all_cats');

        } catch (Exception $e) {
        }
        $response = json_decode($response->getBody()->getContents(), true);

        return $response['data']['categories'];
    }

    public function getProperties(Request $request){
        $client = new Client();
        try {
            $response = $client->request('GET', 'https://staging.mazaady.com/api/properties?cat='.$request->category_child_id);
        } catch (Exception $e) {}
        $response = json_decode($response->getBody()->getContents(), true);

        return $response['data'];
    }


}
