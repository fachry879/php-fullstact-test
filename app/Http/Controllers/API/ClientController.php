<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();

        return response()->json([
            'status' => 'success',
            'data' => ClientResource::collection($client),
        ]);
    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'is_project' => 'required',
            'self_capture' => 'required',
            'client_prefix' => 'required',

        ]);
    }
}
