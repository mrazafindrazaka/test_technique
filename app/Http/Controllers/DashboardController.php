<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DashboardController extends Controller
{
    public function index() {
        $client = new \GuzzleHttp\Client();
        $url = 'https://api.coingecko.com/api/v3/coins/list';
        $response = $client->request('GET', $url);
        $data = json_decode($response->getBody(), true);

        return view('dashboard', [
            'coins_info' => $data,
            'title' => 'Dashboard',
            'base_url' => URL::to('/')
        ]);
    }
}
