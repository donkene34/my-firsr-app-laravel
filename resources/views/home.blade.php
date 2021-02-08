@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}"><img src="{{ asset('storage').'/'.$post->image }}" height="300" class="w-100 mb-4"></a>
                    <hr>
                    <div class="mb-5">
                        posté par <strong> {{ $post->user->username }} </strong> le {{ $post->created_at }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
