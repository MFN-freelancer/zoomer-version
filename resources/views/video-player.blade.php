@extends("layouts.frontend_layout")
@section("content")
    <style>
        .video-js .vjs-big-play-button {
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- SubHeader =============================================== -->
    <section class="parallax_window_in" data-parallax="scroll"
             data-image-src="{{asset('front_assets/img/sub_header_general.jpg')}}"
             data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <h1>Video Preview</h1>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12">
                <video
                        id="my-video"
                        class="video-js"
                        controls
                        preload="auto"
                        width="640px"
                        height="264px"
                        poster="{{asset("cover_images/".$video[0]->video_cover)}}"
                        data-setup='{"aspectRatio":"640:267", "playbackRates": [0.5, 1, 1.5, 2] }'
                >
                    <source src="{{URL::to('/uploaded_video/'.$video[0]->video_url)}}" type="video/mp4"/>
                    <source src="{{URL::to('/uploaded_video/'.$video[0]->video_url)}}" type="video/webm"/>

                </video>
                <ul id="course_info">
                    <li><i class=" icon-clock"></i> {{$video[0]->created_at->format('d/m/y')}}</li>
                    <li><i class="  icon-eye"></i> {{$views}}</li>
                    <li><i class=" icon-down-circled"></i> {{$video[0]->downloaded_number}}</li>
                    <li><i class="icon-user-6"></i> {{$user[0]->name}}</li>
                    <li><a class="vote" href="javascript:void(0)" onclick="like({{$video[0]->id}})"><i class=" icon-thumbs-up"></i></a>{{$video[0]->likes}}</li>
                    <li><a class="vote" href="javascript:void(0)" onclick="dislike({{$video[0]->id}})"><i class=" icon-thumbs-down"></i></a>{{$video[0]->dislikes}} </li>
                    <li style="margin-top: -10px;"><a class="v-download" data-id="{{$video[0]->id}}" href="{{URL::to('/uploaded_video/'.$video[0]->video_url)}}" style="color: #9dff00;font-size: 32px;" download><i
                                    class=" icon-download"></i> download</a></li>
                </ul>
                <h2>Video Title</h2>
                <p><i class="icon-clock"></i>{{$video[0]->video_title}}</p>
                <h2>Description</h2>
                <p> {{$video[0]->video_description}}</p>
                <hr class="add_bottom_30">
                <div class="workoutlist">
                    <form action="{{route('comment')}}" method="post">
                        @csrf
                        <input type="hidden" name="video_id" value="{{$video[0]->id}}"/>
                        <div class="form-group">
                            <label>Leave  your comment:</label>
                            <textarea rows="5" name="comment" class="form-control styled" style="height:100px;" placeholder="comment..."></textarea>
                        </div>
                        <input type="submit" class="btn_1" value="Add" />
                    </form>
                    <hr class="add_bottom_30">
                    <h2>comments</h2>
                    @foreach($comments as $comment)
                        <p>{{$comment->comments}}</p>
                    @endforeach
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    {{--<div class="downloader">--}}
        {{--<a id='v-download' href="{{URL::to('/uploaded_video/'.$video[0]->video_url)}}" download></a>--}}
    {{--</div>--}}
    <!-- End container -->
    <script>
        $(".v-download").click(function(){
            var id = $(".v-download").attr("data-id");
            $.post("/video/"+id,{
                _token:'{{csrf_token()}}',
                id:id,
            }).done(
                function (data) {
                    console.log(data);
                    {{--var myvar = '<a class=\'v-download\' href="{{URL::to('/uploaded_video')}}/'+data+'" download>dd</a>';--}}
                    // $(".downloader").html(myvar);
                    document.location.reload(true);
                }
            );
        });
        function like(id) {
            $.post("/like",{
                _token:'{{csrf_token()}}',
                id:id,
            }).done(
                function (data) {
                    console.log(data);
                    document.location.reload(true);
                }
            );
        }
        function dislike(id) {
            var id=id;
            $.post("/dislike",{
                _token:'{{csrf_token()}}',
                id:id,
            }).done(
                function (data) {
                    console.log(data);
                    document.location.reload(true);
                }
            );
        }
    </script>
@endsection
