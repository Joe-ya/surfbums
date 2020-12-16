<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Micropost;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function create()
    {
        $micropost = new Micropost;
        
        return view('microposts.create',[
                'micropost' => $micropost
            ]);
    }
    
    public function store (Request $request) 
    {
        $this->validate($request, [
           'content' => 'required|max:191', 
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $postimage = $request->image;
        $path = Storage::disk('s3')->putFile('/postimages', $postimage, 'public');
        $request->user()->microposts()->create([
            'content' => $request->content, 
            'image' => $request->image = $path,
        ]);
        
        return redirect('/');
    }

    public function edit($id)
    {
        $micropost = Micropost::find($id);
        return view('microposts.edit',[
            'micropost' => $micropost
            ]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'content' => 'required|max:191', 
        ]);
        
        $micropost = Micropost::find($id);
        $micropost->content = $request->content;
        $micropost->save();
        
        return redirect('/');
    }
    
        public function destroy($id)
    {
        $micropost = Micropost::find($id);

        if (\Auth::id() === $micropost->user_id) {
            Storage::disk('s3')->delete($micropost->image);
            $micropost->delete();
        }

        return back();
    }
}
