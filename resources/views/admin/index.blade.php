@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row justify-content-center'>
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">投稿一覧</div>
                @foreach ($posts as $post)
                <div class="card-body">
                    <h5 class="card-title">タイトル：{{ $post->title }}</h5>
                    <p class="card-text">内容：{{ $post->body }}</p>
                    <a href="{{ url('/admin/admin', $post->id) }}" class="btn btn-primary">詳細</a>
                </div>
                <div class="card-footer text-muted">投稿日時：{{ $post->created_at }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
