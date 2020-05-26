@extends("layouts.backend_layout")
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Video</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12">
                    <div class="card widget-video-stats">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-6 col-md single-video-widget">
                                    <div class="media align-items-center widget-vdo-stat">
                                        <span class="icon text-info"><i class="fa fa-cloud-upload"></i></span>
                                        <div class="media-body">
                                            <h2 class="text-info m-0">{{$total_uploads}}</h2>
                                            <h5 class="text-muted f-s-14">Total Video Uploads</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md single-video-widget">
                                    <div class="media align-items-center widget-vdo-stat">
                                        <span class="icon text-dpink"><i class="fa fa-cloud-download"></i></span>
                                        <div class="media-body">
                                            <h2 class="text-dpink m-0">{{$total_downloads}}</h2>
                                            <h5 class="text-muted f-s-14">Total Video Downloads</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md single-video-widget">
                                    <div class="media align-items-center widget-vdo-stat">
                                        <span class="icon text-warning"><i class="fa fa-users"></i></span>
                                        <div class="media-body">
                                            <h2 class="text-warning m-0">{{$total_users}}</h2>
                                            <h5 class="text-muted f-s-14">Total Registered Users</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Added Videos</h4>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                        <tr>
                                            <th>Video</th>
                                            <th>Video title</th>
                                            <th>Downloaded numbers</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($video_lists as $video_list)
                                            <tr>
                                                <td>
                                                    <video
                                                            id="my-video"
                                                            class="video-js"
                                                            controls
                                                            preload="auto"
                                                            width="320px"
                                                            height="132px"
                                                            poster="{{asset("cover_images/".$video_list->video_cover)}}"
                                                            data-setup='{"aspectRatio":"640:267", "playbackRates": [0.5, 1, 1.5, 2] }'
                                                    >
                                                        <source src="{{URL::to('/uploaded_video/'.$video_list->video_url)}}" type="video/mp4"/>
                                                        <source src="{{URL::to('/uploaded_video/'.$video_list->video_url)}}" type="video/webm"/>

                                                    </video>
                                                </td>
                                                <td>{{$video_list->video_title}}</td>
                                                <td><span class="text-success">{{$video_list->downloaded_number}}</span>
                                                </td>
                                                <td>
                                                    @if($video_list->video_approve=="pending")
                                                    <a href="/admin/approve/{{$video_list->id}}"><span class="label label-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">pending</font></font></span></a>
                                                    @else
                                                    <span class="label label-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Approved</font></font></span>
                                                    @endif
                                                </td>
                                                <td>{{$video_list->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Video Title</th>
                                            <th>Ratings</th>
                                            <th>Downloaded numbers</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #/ container -->
    </div>
@endsection