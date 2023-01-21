@extends('layouts.app')

@section('content')
<div class="container">
  <!-- This is a test to create a route that will SHOW -->
  <div class="row">
    <div class="col-8">
      <img src="/storage/{{$post->image}}" class="w-100">
    </div>


    <div class="col-4">


       <div class="d-flex align-items-center">
         <div style="padding-right: 15px;">
            <img src="{{$post->user->profile->profileImage()}}" 
                alt="profile image" 
                class="w-100 rounded-circle" 
                style="max-width: 50px">
         </div>
         <div>
            <div style="font-weight: 700">
              <a style="text-decoration:none;" href="/profile/{{ $post->user->id }}"> 
              <span class="text-dark" style="font-weight: 700">{{ $post->user->username }}</span>
              </a>
              <a href="#" style="text-decoration: none; padding-left:5px;" class="pl-3">Follow</a>
            </div>
         </div>
       </div>
       <hr>
       <p>
          <a style="text-decoration:none;" href="/profile/{{ $post->user->id }}">
            <span class="text-dark" style="font-weight: 700">{{ $post->user->username }}</span>
          </a> 
          {{ $post->caption }}
       </p>
    </div>
  </div>
  
  
 
</div>
@endsection
