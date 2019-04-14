<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Follower;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index(Request $request) 
    {
        $user = request()->user();
        
        $id = $user->id;

        $users = User::with('followers')->where('id', '<>', $id)->paginate();

        $users2 = $users->map(function ($user) use ($id) {
            $followers = $user->followers->filter(function ($f) use ($id) {
                return $f->follower_id == $id;
            });
            $user['followers'] = $followers;
            $user->followers;
            return [ 
                'id' => $user->id, 
                'name' => $user->name,
                'lastname' => $user->lastname, 
                'category' => $user->profile->subcategory->category->category,
                'subcategory' => $user->profile->subcategory->subcategory,
                'avatar' => $user->avatar(),
                'username' => $user->profile->username,
                'followed' => count($user->followers) > 0
            ];
        });

        return $users2;
    }

    public function follow(Request $request) 
    {
        $request->validate([

        ]);
        $user = request()->user();
        $follower = Follower::updateOrCreate([
           'follower_id' =>  $user->id,
           'user_id' => $request->follower_id
        ]);
        

        return response()->json(['followed' => true]);
    }

    public function unfollow(Request $request) 
    {
        $user = request()->user();
        $follower = Follower::where([
            ['follower_id' , '=', $user->id],
            ['user_id','=', $request->follower_id]
        ])->first();
        $follower->delete();

        return response()->json(['unfollowed' => true]);
    }
}
