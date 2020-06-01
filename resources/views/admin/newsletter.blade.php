@extends("layouts.backend_layout")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-4">Subscribers list</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table" style="min-width: 450px;">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php( $no=0)
                                    @foreach($subscribers as $subscriber)
                                        @php( $no++)
                                        <tr>
                                            <th>{{$no}}</th>
                                            <td>{{$subscriber->user_name}}</td>
                                            <td>{{$subscriber->subscribe_email}}</td>
                                            <td>{{$subscriber->created_at}}</td>
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