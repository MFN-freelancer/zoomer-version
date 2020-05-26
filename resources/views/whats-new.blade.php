@extends("layouts.frontend_layout")
@section("content")
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{asset("front_assets/img/sub_header_general.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <h1>Latest interactive backgrounds</h1>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div class="container_styled_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($new_videos as $new_video)
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="course_container">
                                <div class="ribbon top"><span>New Video</span></div>
                                <figure>
                                    @auth
                                    {{--<a href="{{URL::to('/uploaded_video/'.$new_video->video_url)}}" download>--}}
                                        <a href="video-view/{{$new_video->id}}">
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#login" class="hidden-xs">
                                    @endauth
                                        <img src="{{asset("cover_images/".$new_video->video_cover)}}" width="800" height="533" class="img-responsive" alt="Image">
                                        <div class="short_info"><i class="icon-clock-1"></i></div>
                                    @auth
                                    </a>
                                        @else
                                            </a>
                                    @endauth
                                </figure>
                                <div class="course_title"><div class="type"><span>{{$new_video->video_category}}</span></div>
                                    @auth
                                        <h3>
                                            <a href="video-view/{{$new_video->id}}">{{$new_video->video_title}} </a>
                                        </h3>
                                    @endauth
                                    <div class="info_2 clearfix">
                                        <span class="review-stars" style="color: #ffc107;">
                                            @for($i=0;$i<5;++$i)
                                                <i class="fa fa-star{{ $new_video->ratings<=$i?'-o':'' }}" aria-hidden="true"></i>
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End box course_container -->
                        </div>
                        @endforeach
                    </div>
                    <!-- End row -->
                </div>
                <!-- End col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End container -->
    </div>
    <!-- End container_styled_1 -->
@endsection