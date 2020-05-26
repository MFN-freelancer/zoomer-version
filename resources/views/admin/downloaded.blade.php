@extends("layouts.backend_layout")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body widget-school-stat bg-1">
                            <div class="text">
                                <h2>{{$user_downloads}}</h2>
                                <p>Total downloaded video</p>
                            </div>
                            <div class="icon">
                                <span><i class="fa fa-video-camera"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">downloaded video lists</h4>
                            <div class="table-responsive">
                                <table class="table info-table-bg">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Video title</th>
                                        <th scope="col">rating</th>
                                        <th scope="col">downloaded date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=0)
                                    @foreach($user_videos as $user_video)
                                        @php($no++)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$user_video->video_title}}</td>
                                        <td>
                                            <span class="review-stars" style="color: #ffc107;">
                                                @for($i=0;$i<5;++$i)
                                                    <i class="fa fa-star{{ $user_video->ratings<=$i?'-o':'' }}" aria-hidden="true"></i>
                                                @endfor
                                            </span>
                                        </td>
                                        <td>{{$user_video->created_at}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection