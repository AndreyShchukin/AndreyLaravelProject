@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="posts col-md-4">
                    <div class="card post_card">
                        <img class="card-img-top" src="/img/cat.jpg" alt="image">
                        <div class="card-body">
                            <p class="card-text">{{$post->description}}</p>
                            <p class="card-text">{{$post->user_id}}</p>
                        </div>
                        <div class="footer">
                            <div class="card-body footer_post">
                                <div>
                                    <a href="posts/{{$post->id}}">Leave a comment</a>
                                </div>
                                <div>
                                    <img class="card-img-bottom like_button" src="/img/heart.png" alt="like">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination">
            {{$posts->links()}}
        </div>
    </div>



    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ Auth::user()->name }}, add your post, please</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="myForm" action="{{ route('/posts/add') }}" enctype="multipart/form-data" method="post" onsubmit="return validateForm()" >
                    @csrf
                    <div>
                        <textarea name="fname" class="form-control textarea_post" id="exampleFormControlTextarea1" name="description" required placeholder="Minimum 26 symbols" minlength="26" maxlength="2048"></textarea>
                    </div>
                    <div>
                        <label for="exampleFormControlFile1">You can load your image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div>
                        <button value="Submit" type="submit" class="btn btn-primary submitpost">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


