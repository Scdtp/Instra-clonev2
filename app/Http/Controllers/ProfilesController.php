<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        /*  $postCount = $user->posts->count();
         $followersCount = $user->profile->followers->count();
         $followingCount = $user->following->count(); */
            // We will need to have a key setup cache key 
        $postCount = Cache::remember(
            'count.posts.' . $user->id, // cache key 
            now()->addSeconds(30), // we just want to store for 30seconds, if not we run the callback function 
            function () use($user) { //call back function 
                return $user->posts->count();
            });


        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30), 
            function () use($user) {
                return $user->profile->followers->count();
             });
         
        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30), 
            function () use($user) {
                return   $user->following->count();
             });
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data  = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
      
        

        if(request('image')){
            $imagePath = (request('image')->store('profile', 'public'));  // public driver 
          

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

     /*    dd(array_merge(
            $data,
            ['image' => $imagePath]
        )); */
        auth()->user()->profile->update(array_merge(
            $data,
            // ['image' => $imagePath ?? null]  this will be deleting our profile image
            $imageArray ?? [] // we dont override anythin in our data
        ));

        return redirect("/profile/{$user->id}");
    }
}






