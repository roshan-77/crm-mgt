<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
        $validateData = Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:50',
            'number'=>'required|string|max:15',
            'company'=>'required|boolean',
            'address'=>'required|string|max:50',
            'referred_by'=>'required|string|max:50',
        ]);

        if($validateData->fails()){
            return response()->json([
                'message' => 'Validation Failed.',
                'errors' => $validateData->errors()
            ]);
        }

        $client = Client::create($validateData->validated());
        return response()->json($client);
    }  

    public function update(Request $request, $id){
       //Validate
        $validatedData = Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:50',
            'number'=>'required|string|max:15',
            'company'=>'required|boolean',
            'address'=>'required|string|max:50',
            'referred_by'=>'required|string|max:50',
        ]);

        if($validatedData->fails()){
            return response()->json([
                'message' => 'Validation Failed.',
                'errors' => $validatedData->errors()
            ]);
        }
        $client = Client::find($id);

        $client->update($validatedData);

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
