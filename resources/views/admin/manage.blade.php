@extends("layouts.backend_layout")
<?php
use App\VideoList;
?>
@section("content")

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Joined Users</h4>
                            <div class="table-responsive">
                                @if(Session::has('message'))

                                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{Session::get('message')}}</strong>
                                    </div>
                                @endif
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User name</th>
                                        <th>Email</th>
                                        <th>Total downloads</th>
                                        <th>Created date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=0)
                                    @foreach($users as $user)
                                        @php($no++)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        {{--                                        <td>{{$user->join_video[0]['downloaded_number']}}</td>--}}
                                        <td><?php
                                            $d = VideoList::where('user_id', $user->id)->sum('downloaded_number');
                                            echo $d;
                                            ?>
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                           <span>
                                              {{--<a href="javascript:void()" class="mr-4" data-toggle="tooltip"--}}
                                               {{--data-placement="top" title="" data-original-title="Edit"><i--}}
                                               {{--class="fa fa-pencil color-muted"></i> </a>--}}
                                               <a href="/admin/manage-users/{{$user->id}}" class="delete-confirm"
                                                  data-placement="top" title="" data-original-title="Close"><i
                                                           class="fa fa-close color-danger"></i></a>
                                           </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>User name</th>
                                        <th>Email</th>
                                        <th>Total downloads</th>
                                        <th>Created date</th>
                                        <th>Action</th>
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
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This user will be permanently deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection