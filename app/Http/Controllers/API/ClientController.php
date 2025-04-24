<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Resources\ClientResource;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::latest()->paginate(5);

        return new ClientResource(true, 'List Client', $client);
    }
}
