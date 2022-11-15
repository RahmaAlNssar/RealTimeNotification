<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Events\NotificationsEvent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Token;
use App\Notifications\notifyNotification;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class ComplainsController extends Controller
{
    public function store(Request $request){
        DB::beginTransaction();
        try{
        $request->validate([
            'body'=>'string|required'
        ]);

       $user = auth('api')->user();

       $complain = Complain::create([
            'user_id'=>$user->id,
            'body'=>$request->body
        ]);
        $complain = $complain->load('user');
      // $complains = Complain::count();
        DB::commit();
        event(new NotificationsEvent($complain));
        // $admin = Admin::where('is_super-admin',1)->first();
        // $admin->notify(new notifyNotification($complain));



       return response()->json(['statusCode'=>200,'success'=>true,'message'=>'sent success']);
    }catch(ThrowException $e){
         return response()->json(['statusCode'=>401,'success'=>false,'errors'=>$e->getMessage()]);
    }
    }
}
