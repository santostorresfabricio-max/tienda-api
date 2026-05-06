<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return ClientResource::collection($clients);
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());
        return new ClientResource($client);
    }

    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return new ClientResource($client);
    }

    public function update(UpdateClientRequest $request, string $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->validated());
        return new ClientResource($client);
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(null, 204);
    }
}
