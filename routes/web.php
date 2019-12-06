<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index');

Route::get('/api/datachart/{id}', function ($id) {
    $client = new \GuzzleHttp\Client();
    $url = 'https://api.coingecko.com/api/v3/coins/' . $id . '/market_chart?vs_currency=eur&days=1';
    $response = $client->request('GET', $url);
    $data = json_decode($response->getBody(), true);

    return $data["prices"];
});

