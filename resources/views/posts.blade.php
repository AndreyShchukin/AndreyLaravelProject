@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="posts col-md-4">
                    <div class="card post_card">
                        @isset($path)
                        <img class="card-img-top" src={{ asset('/storage/' . $path) }} alt="image">
                        @endisset
                        <div class="card-body">
                            <p class="card-text">{{$post->description}}</p>
                        </div>
                        <div class="footer">
                            <div class="card-body footer_post">
                                <div>
                                    <a href="posts/{{$post->id}}">Leave a comment</a>
                                </div>
                                <div>
                                    <img class="card-img-bottom like_button" src="/img/heart.png" alt="like">
                                    <span class="badge badge-info">Info</span>
                                </div>
                            </div>
                            <p class="card-text">Users id: {{$post->user_id}}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination justify-content-center">
            {{$posts->links()}}
        </div>
    </div>



    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add your post, please</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="myForm" action="{{ route('/posts/add') }}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <div>
                        <textarea class="form-control textarea_post" id="exampleFormControlTextarea1" name="description" required placeholder="Minimum 26 symbols" minlength="26" maxlength="2048"></textarea>
                    </div>
                    <div>
                        <label for="exampleFormControlFile1">You can load your image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div>
                        <button value="Submit" type="submit" class="btn btn-primary submitpost">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


