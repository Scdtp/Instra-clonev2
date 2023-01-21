@extends('layouts.app')

@section('content')
<div class="container">
    </div> 
    <div class="row">
        <div class="col-3 p-5">
            <!-- <img src="/images/69251953_415623215971423_6357224280152866816_n.jpg" class="rounded-circle" style="height: 200px; width: 200px;" alt="DogPhoto">            -->
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="height: 200px; width: 200px;" alt="profileImage">           
        </div>
        <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h3 ">{{ $user->username }}</div>
                        <!-- <button class="btn btn-primary" style="margin-left:10px">Follow</button> -->
                        <follow-button user-id="{{$user->id}}" follows={{$follows}}></follow-button>
                    </div>
                    
                    @can('update', $user->profile)
                        <a href="/p/create" class="btn btn-primary"> Add New Post</a>
                    @endcan
                </div>
                <!-- BLADE DIRECTIVE -->
                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit"  class="btn btn-primary">Edit Profile</a> 
                @endcan
                <div class="d-flex pt-3">
                   <!--  <div style="padding-right: 4%"><strong>{{ $user->posts->count()}}</strong> posts</div>
                    <div style="padding-right: 4%"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                    <div style="padding-right: 4%"><strong>{{$user->following->count()}}</strong> following</div> -->
                    <div style="padding-right: 4%"><strong>{{ $postCount }}</strong> posts</div>
                    <div style="padding-right: 4%"><strong>{{  $followersCount }}</strong> followers</div>
                    <div style="padding-right: 4%"><strong>{{ $followingCount }}</strong> following</div>
                </div>
                <div class="pt-4" style="font-weight: bold;">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
            </div>

            
              <div class="row">
               
               @foreach($user->posts as $post)
               <div class="col-4">
                    <a href="/p/{{ $post->id }}">
                        <img class="w-100 pt-5" src="/storage/{{$post->image}}" alt="">
                    </a>
                </div>
                
               @endforeach
             </div>
           <!--  <div class="row">
                <div class="col-4"><img class="w-100 pt-5" src="https://source.unsplash.com/1600x900/?computers
" alt=""></div>
                <div class="col-4"><img class="w-100 pt-5" src="https://source.unsplash.com/1600x900/?langscape
" alt=""></div>
                <div class="col-4"><img class="w-100 pt-5" src="https://source.unsplash.com/1600x900/?forest
" alt=""></div>
            </div> -->
    </div>
</div>
@endsection
