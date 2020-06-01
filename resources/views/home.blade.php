@extends("layouts.frontend_layout")
@section("content")
    <section class="header-video">
        <div id="hero_video">
            <div id="sub_content">
                <div class="mobile_fix">
                    <h1>Free <strong>INTERACTIVE ZOOM</strong> backgrounds</h1>
                    <p>
                        Join us and download videos!
                    </p>
                </div>
            </div>
            <!-- End sub_content -->
        </div>
        <img src="{{asset("front_assets/img/sub_header_general.jpg")}}" alt="" class="header-video--media"
             data-video-src="video/intro"
             data-teaser-source="video/intro" data-provider="" data-video-width="1920" data-video-height="960">
        <div id="count" class="hidden-xs">
            <ul>
                <li><span class="number">{{$total_video}}</span> Backgrounds available</li>
                <li><span class="number">{{$total_download}}</span>Total downloads</li>
            </ul>
        </div>
    </section>
    <!-- End Header video -->
    <!-- End SubHeader ============================================ -->
    <div class="container_styled_1">
        <div class="container margin_60_35">
            <h2 class="main_title"><em></em>Featured Backgrounds</h2>
            <div id="filter_buttons">
                <button data-toggle="portfilter" class="active" data-target="all">All</button>
                @foreach($cats as $cat)
                <button data-toggle="portfilter" data-target="{{$cat->video_category}}">{{$cat->video_category}}</button>
                @endforeach
            </div>
            <div class="row">
                @foreach($videos as $video)
                <div class="col-md-4" data-tag="{{$video->video_category}}">
                    <div class="course_container">
                        <div class="ribbon top"><span>Latest Video</span>
                        </div>
                        <figure>
                            @auth
                            {{--<a href="{{URL::to('/uploaded_video/'.$video->video_url)}}" download>--}}
                            <a href="video-view/{{$video->id}}">
                                @else
                                    <a href="#" data-toggle="modal" data-target="#login" class="hidden-xs">
                            @endauth
                                <img src="{{asset("cover_images/".$video->video_cover)}}" width="800" height="250"
                                     class="img-responsive" alt="Image">
                                <div class="short_info"><i class="icon-clock-1"></i></div>
                            @auth
                                </a>
                                @else
                                </a>
                            @endauth
                        </figure>
                        <div class="course_title">
                            <div class="type"><span>{{$video->video_category}}</span>
                            </div>
                            <h3>
                                {{--<a href="{{URL::to('/uploaded_video/'.$video->video_url)}}" download>{{$video->video_title}} </a>--}}
                                <a href=@auth"video-view/{{$video->id}}"@endauth >{{$video->video_title}} </a>
                            </h3>
                            <div class="info_2 clearfix">
                                <span class="review-stars" style="color: #ffc107;">
                                    <i class=" icon-thumbs-up">{{$video->likes}}</i>
                                    <i class=" icon-thumbs-down">{{$video->dislikes}}</i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{$videos->links()}}
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </div>
    <!-- End container_styled_1 -->
    @auth
    <div id="newsletter_container">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="{{route('newsletter')}}" name="newsletter" class="form-inline">
                        @csrf
                        <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                        <input name="email_newsletter" id="email_newsletter" type="email" value=""
                               placeholder="Your Email" class="form-control">
                        <button type="submit" id="submit-newsletter" class="btn_1"> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
    <!-- End newsletter_container -->
@endsection