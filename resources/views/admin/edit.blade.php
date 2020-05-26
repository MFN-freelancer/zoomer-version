@extends("layouts.backend_layout")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card transparent-card video-session-table">
                        <div class="card-body p-0">
                            <div class="section-header d-block align-items-center justify-content-between mb-3">
                                <h4 class="card-title mb-4">video edit/delete</h4>
                            </div>
                            <div class="table-responsive">
                                @if(Session::has('message'))

                                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{Session::get('message')}}</strong>
                                    </div>
                                @endif
                                <table class="table table-padded table-responsive-fix-big">
                                    <thead>
                                    <tr>
                                        <th>Video Title</th>
                                        <th>ratings</th>
                                        <th>Download numbers</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($video_data as $video)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="{{asset('/cover_images/'.$video->video_cover)}}" class="mr-3" width="60"
                                                     height="60" alt="">
                                                <div class="media-body">
                                                    <h5 class="m-0">{{$video->video_title}}</h5>
                                                    <span class="text-muted"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="review-stars" style="color: #ffc107;">
                                                @for($i=0;$i<5;++$i)
                                                <i class="fa fa-star{{ $video->ratings<=$i?'-o':'' }}" aria-hidden="true"></i>
                                                @endfor
                                            </span>
                                        </td>
                                        <td><span class="text-success">{{$video->downloaded_number}}</span>
                                        </td>
                                        <td>{{$video->created_at}}</td>
                                        <td>
                                            <span>
                                                {{--<a href="javascript:void()" class="mr-4" data-toggle="tooltip"--}}
                                                  {{--data-placement="top" title="" data-original-title="Edit">--}}
                                                    {{--<i class="fa fa-pencil color-muted"></i> </a>--}}
                                                <a href="/admin/edit-delete/{{$video->id}}" class="delete-confirm" data-placement="top" title="" data-original-title="Close">
                                                    <i class="fa fa-close color-danger"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$video_data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This video will be permanently deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection