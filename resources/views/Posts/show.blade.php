@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">投稿詳細</div>
                <div class="card-body">
                    <h5 class="card-title">タイトル：{{ $post->title }}</h5>
                    <p class="card-text">内容：{{ $post->body }}</p>
                </div>
                <div class="card-footer text-muted">投稿日時：{{ $post->created_at }}</div>
                <div class='mt-3'>
                    @if (is_null($read) || $read->read == false)
                        <a href='{{ route('post.read', ['id' => $post->id]) }}' class='btn btn-secondary btn-sm'>既読にする</a>
                    @else
                        <a href='{{ route('post.read', ['id' => $post->id]) }}' class='btn btn-success btn-sm'>未読にする</a>
                    @endif
                </div>
                <div class='my-3'>
                    @if (is_null($favorite) || $favorite->favorite == false)
                        <a href='{{ route('post.favorite', ['id' => $post->id]) }}' class='btn btn-success btn-sm'>お気に入りに登録する</a>
                    @else
                        <a href='{{ route('post.favorite', ['id' => $post->id]) }}' class='btn btn-secondary btn-sm'>お気に入り解除する</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
