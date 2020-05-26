@extends("layouts.frontend_layout")
@section("content")
    <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{asset("front_assets/img/sub_header_general.jpg")}}" data-natural-width="1400" data-natural-height="470">
        <div id="sub_content_in">
            <h1>Most downloaded backgrounds</h1>
        </div>
    </section>
    <!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div class="container_styled_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($hot_videos as $hot_video)
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="course_container">
                                <div class="ribbon top"><span>Top 10 Video</span></div>
                                <figure>
                                    @auth
                                        {{--<a href="{{URL::to('/uploaded_video/'.$hot_video->video_url)}}" download>--}}
                                        <a href="video-view/{{$hot_video->id}}">
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#login" class="hidden-xs">
                                    @endauth
                                        <img src="{{asset("cover_images/".$hot_video->video_cover)}}" width="800" height="533" class="img-responsive" alt="Image">
                                        <div class="short_info"><i class="icon-clock-1"></i></div>
                                    @auth
                                        </a>
                                        @else
                                            </a>
                                    @endauth
                                </figure>
                                <div class="course_title">
                                    <div class="type">
                                        <span>{{$hot_video->category}}</span>
                                    </div>
                                    @auth
                                        <h3>
                                                <a href="video-view/{{$hot_video->id}}">{{$hot_video->video_title}} </a>
                                        </h3>
                                    @endauth
                                    <div class="info_2 clearfix">
                                        <span class="review-stars" style="color: #ffc107;">
                                            @for($i=0;$i<5;++$i)
                                            <i class="fa fa-star{{ $hot_video->ratings<=$i?'-o':'' }}" aria-hidden="true"></i>
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                            @endforeach
                    </div>
                </div>
            <!-- End Row -->
            </div>
        </div>
        <!-- End container -->
    </div>
    <!-- End container_styled_1 -->
@endsection