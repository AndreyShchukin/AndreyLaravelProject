@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                <div class="posts">
                    <div class="card post_card_id">
                        <img class="card-img-top image_post" src="/img/cat.jpg" alt="image">
                        <div class="card-body">
                            <p class="card-text">{{$post->description}}</p>
                        </div>
                        <div class="footer">
                            <

                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop
