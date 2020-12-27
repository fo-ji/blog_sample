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
                    <p class="card-text">既読回数：{{ $post->reads->count() }}</p>
                    @foreach ($readers as $reader)
                        <p class="card-text">既読者：{{ $reader->name }}</p>
                    @endforeach
                </div>
                <div class="card-footer text-muted">投稿日時：{{ $post->created_at }}</div>
            </div>
        </div>
    </div>
</div>

@endsection
