<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(){
        //Look for clients in DB
        $clients = Client::all();
        //Return clients
        return response()->json($clients);
    }

    public function show($id){
        $client = Client::find($id);
        return response()-> json($client);
    }

    public function store(StoreClientRequest $request){
        
        $client = Client::create($request->validated());
        return response()->json($client);
    }  

    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::find($id);

        $client->update($request->validated());

        //Return the updated client
        return response()->json($client);
    }
    
    public function destroy($id){
        $client = Client::find($id);

        if($client){
            $client->delete();
            return response()->json(['message' => 'Client deleted successfully', $client->name]);
        }else{
            return response()->json(['message' => 'Client not found'], 404);
        }
    }
}
