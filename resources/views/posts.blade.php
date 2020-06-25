@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="posts col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{URL::asset('/image/like.svg')}}" alt="image">
                        <div class="card-body">
                            <p class="card-text">{{$post->description}}</p>
                        </div>
                        <div class="card-body">
                            <img class="card-img-bottom" src="{{URL::asset('/image/like.svg')}}" alt="like">
                            <a href="#" class="card-link" id="openModal">leave a comment</a>
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
                <h4 class="modal-title" id="myModalLabel">New post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add-post') }}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <div>
                        <label for="exampleFormControlTextarea1">Please, add your post</label>
                        <input class="form-control" id="exampleFormControlTextarea1" name="text">
                    </div>
                    <div>
                        <label for="exampleFormControlFile1">You can load your image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary submitpost">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


