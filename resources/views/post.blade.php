@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                <div class="posts">
                    <div class="card post_card_id">
                        <img class="card-img-top image_post" src="/img/cat.jpg" alt="image">
                        <div class="card-body">
                            <p class="card-text">{{$post->description}}</p>
                            <p class="card-text">{{$post->id}}</p>
                        </div>
                        <p><h1>COMMENTS:</h1></p>
                        @if($post && $post->comments)
                        @foreach($post->comments as $comment)
                        <div class="card-body">
                            <p class="card-text">User:{{$comment->user_id}}</p>
                            <p class="card-text">{{$comment->text}}</p>
                        </div>
                        @endforeach
                        @else
                            <h2>There is no comments. You may be the first!</h2>
                        @endif
                        <div class="footer">
                            <form name="FormComment" action="/posts/{{$post->id}}/addComment" enctype="multipart/form-data" method="post" >
                                @csrf
                                <input hidden class="form-control" type="text" name="post_id" value="{{$post->id}}" >
                                <div>
                                    <textarea class="form-control textarea_comment" id="exampleFormControlTextarea1" name="text" required placeholder="Add your comment"></textarea>
                                </div>
                                <div>
                                    <button value="Submit" type="submit" class="btn btn-success submitpost">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop
