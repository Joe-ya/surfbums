<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
       public function edit($id)
    {
        $user = User::find($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
        public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);
            
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $user->name = $request->name;
        $user->save();
        
         $data = [
            'user' => $user,
            'microposts' => $microposts,
         ];
         
         $data += $this->counts($user);
         
         return view('users.show', $data);
    }
    
        public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect('/');
    }

    
        public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }

}
