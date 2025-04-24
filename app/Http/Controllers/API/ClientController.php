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

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'slug'          => 'required',
            'is_project'    => 'required',
            'self_capture'  => 'required|max:1',
            'client_prefix' => 'required|max:4',
            'client_logo'   => 'required|image|max:2048',
            'phone_number'  => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'success',
                'data' => $validator->errors(),
                'message' => 'Validation Error',
            ]);
        }

        $client_logo = $request->file('client_logo');
        $client_logo->storeAs('Client Logo', $client_logo->hashName());

        $client = Client::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'is_project' => $request->is_project,
            'self_capture' => $request->self_capture,
            'client_prefix' => $request->client_prefix,
            'client_logo' => $client_logo->hashName(),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => new ClientResource($client),
            'message' => 'Client added successful',
        ]);
    }

    public function show(Client $client)
    {
        $client = Client::where('id', $client->id)->first();

        return response()->json([
            'status' => 'success',
            'data' => new ClientResource($client),
            'message' => 'Success get data Client',
        ]);
    }
}
