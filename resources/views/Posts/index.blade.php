@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">投稿一覧</div>
                @if (isset($favorites))
                    @foreach ($favorites as $favorite)
                    <div class="card-body bg-primary">
                        <h5 class="card-title">タイトル：{{ $favorite->title }}</h5>
                        <p class="card-text">内容：{{ $favorite->body }}</p>
                        <a href="{{ action('PostController@show', $favorite->post_id) }}" class="btn btn-primary">詳細</a>
                        <p>お気に入り登録中！</p>
                    </div>
                    <div class="card-footer text-muted">投稿日時：{{ $favorite->created_at }}</div>
                    @endforeach
                    @foreach ($posts as $post)
                    <div class="card-body">
                        <h5 class="card-title">タイトル：{{ $post->title }}</h5>
                        <p class="card-text">内容：{{ $post->body }}</p>
                        <a href="{{ action('PostController@show', $post->id) }}" class="btn btn-primary">詳細</a>
                    </div>
                    <div class="card-footer text-muted">投稿日時：{{ $post->created_at }}</div>
                @endforeach
                @else
                @foreach ($posts as $post)
                <div class="card-body">
                    <h5 class="card-title">タイトル：{{ $post->title }}</h5>
                    <p class="card-text">内容：{{ $post->body }}</p>
                    <a href="{{ action('PostController@show', $post->id) }}" class="btn btn-primary">詳細</a>
                </div>
                <div class="card-footer text-muted">投稿日時：{{ $post->created_at }}</div>
                @endforeach
                @endif
            </div>
        </div>
        <div class='col-md-2'>
            <a href='{{ route('posts.create') }}' class='btn btn-primary'>新規投稿</a>
        </div>
    </div>
</div>

@endsection
