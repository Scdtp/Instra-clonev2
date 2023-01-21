@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
            
    <div class="row">
      <div class="d-flex align-items-center">
        <div style="padding-right: 15px;">
                    <img src="{{$post->user->profile->profileImage()}}" 
                        alt="profile image" 
                        class="w-100 rounded-circle" 
                        style="max-width: 50px">
                        <div>
                          <div style="font-weight: 700">
                            <a style="text-decoration:none;" href="/profile/{{ $post->user->id }}"> 
                            <span class="text-dark" style="font-weight: 700">{{ $post->user->username }}</span>
                            </a>
                            <a href="#" style="text-decoration: none; padding-left:5px;" class="pl-3">Follow</a>
                          </div>
                        </div>
                        
                </div>
            </div>
          <div class="col-8 offset-2">
            <a href="/profile/{{$post->user->id}}">
            <img src="/storage/{{$post->image}}" class="w-100">
            </a>
          </div>
        </div>
      </div>
    </div>
     <div class="row pt-3 pb-4">
        <div class="col-4 offset-2">
          <p>
              <a style="text-decoration:none;" href="/profile/{{ $post->user->id }}">
                <span class="text-dark" style="font-weight: 700">{{ $post->user->username }}</span>
              </a> 
              {{ $post->caption }}
          </p>
        </div>
      </div>
    
    </div>
      @endforeach 
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        {{ $posts->links('pagination::bootstrap-4')}}
      </div>
    </div>
 
</div>
@endsection
