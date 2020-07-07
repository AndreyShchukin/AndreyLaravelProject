@extends('layouts.app')
@section('content')
    <div class="container">
        <span>Show the popular posts!</span><a class="sort_button" href="posts/sorted">Show</a>
        <div class="row">
            @foreach($posts as $post)
                <div class="posts col-md-4">
                    <div class="card post_card">
                        @isset($post['image'])
                        <img class="card-img-top" src={{ asset('/storage/' . $post['image']) }} alt="image">
                        @endisset
                        <div class="card-body">
                            <p class="card-text">{{$post['text']}}</p>
                        </div>
                        <div class="footer">
                            <div class="card-body footer_post">
                                <div>
                                    <a href="posts/{{$post['id']}}">Leave a comment</a>
                                </div>
                                @if(Auth::check())
                                <div>
                                    <img class="ico_{{$post['id']}}" src="@if($post['liked_by_me'])like.png @else nolike.png @endif" style="cursor:pointer; width:20px;" onclick="setLike({{$post['id']}})">
                                    <span class="badge badge-info likes_count_{{$post['id']}}">{{$post['likes']}}</span>
                                </div>
                                @endif
                            </div>
                            <p class="card-text">Users id: {{$post['user_id']}}</p>
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
                <form name="myForm" action="{{route('/posts/add')}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <div>
                        <textarea class="form-control textarea_post" id="exampleFormControlTextarea1" name="text" required placeholder="Minimum 26 symbols" minlength="26" maxlength="2048"></textarea>
                    </div>
                    <div>
                        <label for="exampleFormControlFile1">You can load your image</label>
                        <input class="form-control-file" type="file" name="image" id="exampleFormControlFile1">
                    </div>
                    <div>
                        <button value="Upload" type="submit" name="upload" class="btn btn-primary submitpost">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script>
            function setLike(postId)
            {
                let src = $(".ico_" + postId).attr('src').trim();
                let likesCount = parseInt($(".likes_count_" + postId).text());
                if (src === "nolike.png") {
                    //disliked
                    $(".ico_" + postId).attr('src', 'like.png');
                    likesCount++;
                } else {
                    //liked
                    $(".ico_" + postId).attr('src', 'nolike.png');
                    likesCount--;
                }
                $(".likes_count_" + postId).text(likesCount);
                $.post("/posts/" + postId + '/like', function (res) {
                    console.log(res);
                })
            }
        </script>


@stop


