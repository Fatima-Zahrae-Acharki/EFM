<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function insert(Request $request)
    {
       $data = new Participant();
       $data->email = $request->input('email');
       $data->idea = $request->input('idea');

       $data->save();
        return response()->json($data);
    }

    public function show()
    {
        $data = Participant::all();
        return response()->json($data);
    }

    public function showId(Request $request){

        $idea = Participant::where('id', $request->id)->first();
        return response()->json($idea);

    }

    public function getParticipantsIdea($data)
    {
        $data = Participant::where('email', $data)->exists();

        if($data) {
            return response()->json('existing email', 200);
        }else{
            return response()->json('non existing email', 200);
        }
    }

    public function getIdeas(Request $req)
    {
        // $idea = Participant::where('idea', $req->idea)->all();
        // return response()->json($idea);

        $idea = Participant::all();
        return response()->json($idea);
    }                



    public function status($id, $status)
    {
        $data = Participant::where('id', $id)->first();

        $data->status = $status;
        $data->save();
        return response()->json($data, 201);
    }

    public function validIdea(){

        $data = Participant::where('status', "0");
        return response()->json($data->get());

    }


    public function edit($id)
    {
        $data = Participant::Where('id',$id)->get();
        return response()->json($data);
    }

    public function update(Request $req,$id)
    {
        $data = Participant::Where('id',$id)->first();
       $data->email = $req->input('email');
       $data->idea = $req->input('idea');

       $data->save();
        return response()->json($data);
        
        
    }

    public function delete($id)
    {
        Participant::where('status','0')->delete();
        return response()->json();
    }

    


}
