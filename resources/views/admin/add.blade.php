@extends("layouts.backend_layout")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card forms-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Upload video</h4>
                        <div class="basic-form">
                            <form method="post" action="{{route('add-video')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row align-items-center">
                                    <div class="col-md-7">
                                        <label class="col-sm-12 col-form-label text-label">Video Title</label>
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="video_name"  placeholder="video title" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-12 col-form-label text-label">Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="video_description" rows="5" placeholder="description" ></textarea>
                                        </div>
                                        {{--<label class="col-sm-12 col-form-label text-label">Thumbnail</label>--}}
                                        {{--<div class="col-sm-12">--}}
                                            {{--<div class="input-group">--}}
                                                {{--<input type="file" class="form-control" name="video_Thumbnail">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <label class="col-sm-12 col-form-label text-label">Add Tag</label>
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="video_category" placeholder="add tag" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-12 col-form-label text-label">Video Upload File</label>
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                {{--<input type="file" class="form-control" name="video_file" required>--}}
                                                <input class="video-preview" type="file" name="video_file" required>
                                                <video controls style="width: 100%;height: auto;" ></video>

                                            </div>
                                        </div>
                                        <div class="form-group row mt-lg-5">
                                            <label class="col-sm-12 col-form-label text-label">Publish</label>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-rounded btn-success">
                                                    <span class="btn-icon-left text-success"><i class="fa fa-upload color-success"></i> </span>
                                                    Publish
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $(".video-preview").change(function () {
                $(this).next().attr("src", URL.createObjectURL(this.files[0]));
            });

        })
    </script>
@endsection