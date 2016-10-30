<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function store(Request $request, $user)
    {
        $user = Auth::user();



        $this->validate($request, [
            'clientUuid' => 'required|client_exist',
        ]);
        $cl = $request->get('clientUuid');
//
//        $client = Client::where('id','=',$cl)->first();
//        if($client==null){
//
//        }
        Client::create([
            'id'=>$cl,
            'user_id'=>$user->id,
            'created_at'=>Carbon::now(),
        ]);

        return response()->json(['status'=>'Success!']);

//        else{
//            Session::flash('fail','Client already exists.');
//            return redirect()->back();
//        }


    }
}
