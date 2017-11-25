<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller as Controller;

class OAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Issue Token
     * Request token for authentication
     *
     * @param Request
     * @return JSON String
     */
    public function issueToken($credentials)
    {
        $http = new Client();

        $response = $http->post(url('/oauth/token'), [
            'form_params' => $credentials,
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}