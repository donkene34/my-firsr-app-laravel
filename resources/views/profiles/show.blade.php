
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
            <img class="rounded-circles" width="150" height="150" src="{{'/storage/'.'avatar/avatar.png' }}" alt="">
            </div>
            <div class="col-8">
                <div class="d-flex">
                <div class="h4 mr-3 pt-2">{{ $username->username }}</div>

                    <form method="POST" class="mt-2" action="{{ route('follows.store',['profile' => $username->id]) }}"">
                        @csrf
                        <button class="btn btn-sm btn-primary">S'abonner</button>
                    </form>
                </div>
                <div class="d-flex mt-3">
                <div class="mr-3"><strong>{{ $postsCount }}</strong>Publications</div>
                <div class="mr-3"><strong>{{ $followersCount }}</strong>abonnés</div>
                <div class="mr-3"><strong>{{ $followingCount }}</strong>abonnement</div>
                </div>
            @can('update', $username->profile)
                    <a class="btn btn-outline-secondary mt-3" href="{{ route('profiles.edit',['username' => $username->username]) }}">modifier mes informations</a>
            @endcan
                <div class="mt-3">
                    <div>{{ $username->profile->title }}</div>
                    <div>{{  $username->profile->description }}</div>
                    <a href="{{ $username->profile->url }}">{{ $username->profile->url }}</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
        @foreach ($username->posts as $posts)
            <div class="col-4">
                <a href="{{ route('posts.show', ['post' => $posts->id]) }}"><img src="{{ asset('storage').'/'.$posts->image }}" height="300" class="w-100 mb-4"></a>
            </div>
        @endforeach
        </div>
    </div>
    @endsection
