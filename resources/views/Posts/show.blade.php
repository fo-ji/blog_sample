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
                <div>
                    @if ($post->is_read())
                        <a href='{{ route('post.unread', ['id' => $post->id]) }}' class='btn btn-success btn-sm'>未読にする</a>
                    @else
                        <a href='{{ route('post.read', ['id' => $post->id]) }}' class='btn btn-secondary btn-sm'>既読にする</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
