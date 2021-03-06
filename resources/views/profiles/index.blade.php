@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}"  class="w-100 rounded-circle"/>
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex align-items-center pb-3">

                <div class="h3 pr-4">{{ $user->username }}</div>

                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>

            </div>

            <div class="d-flex justify-content-between align-items-baseline">
                @can('update', $user->profile)
                    <div>
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    </div>
                    <div>
                            <a href="{{ route('p.create') }}">Add New Post</a>
                    </div>
                @endcan
            </div>

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $posts }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100"/>
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection
