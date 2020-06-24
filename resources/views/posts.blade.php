@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="posts col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="/public/img/like.svg" alt="image">
                        <div class="card-body">
                            <p class="card-text">{{$post->description}}</p>
                        </div>
                        <div class="card-body">
                            <img class="card-img-bottom" src="/public/img/like.svg" alt="like">
                            <a href="#" class="card-link" id="openModal">leave a comment</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container" id="CommentModal">
        <form action="#" method="post">
            <span class="close">&times;</span>
            <textarea name="text"></textarea>
            <button class="btn-success" id="commentButton">Send</button>
        </form>
    </div>
@stop


