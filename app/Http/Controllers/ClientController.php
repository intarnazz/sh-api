<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;


class ClientController extends Controller
{
    function get(Client $client)
    {
        return new SuccessResponse($client);
    }

    function all()
    {
        $clients = Client::all();
        return new SuccessResponse($clients);
    }

    public function add(ClientRequest $request)
    {
        $client = Client::create($request->validated());
        return new SuccessResponse($client);
    }

    public function delete(Client $client)
    {
        $client->delete();
        return new SuccessResponse([]);
    }
}
