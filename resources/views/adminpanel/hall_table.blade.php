@extends('layouts.admin_master_layout')

@section('content')
    <div class="content custom-scrollbar">

        <div class="doc data-table-doc page-layout simple full-width">

            <!-- HEADER -->
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">Halls</h2>

                <a href="/add_hall" class="btn btn-light fuse-ripple-ready">
                    <i class="fas fa-plus"></i>
                    <span>ADD HALLS</span>
                </a>

            </div>

            <!-- / HEADER -->

            <!-- CONTENT -->
            <div class="page-content p-6">
                <div class="content container-fluid">
                    <div class="row">

                        <div class="col-12">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))

                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                            <a href="#" class="close" data-dismiss="alert"
                                               aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="example ">

                                <div class="description">
                                    <div class="description-text">

                                        <h3>Hall Info</h3>


                                    </div>
                                    {{--<div class="toggle-source-preview">--}}
                                        {{--<i class="icon icon-code-tags"></i>--}}
                                        {{--<i class="icon icon-eye-outline"></i>--}}
                                    {{--</div>--}}
                                </div>

                                <div class="source-preview-wrapper">
                                    <div class="preview">
                                        <div class="preview-elements">

                                            <table id="sample-data-table" class="table">
                                                <thead>
                                                <tr>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Hall ID</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Hall Name</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Contact</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Email</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Address</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Status</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Action</span>
                                                        </div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($hall_table as $key => $hall_tables)
                                                    <tr>
                                                        <td>{{ $hall_tables->hall_id }}</td>
                                                        <td>{{ $hall_tables->hall_name }}</td>
                                                        <td>{{ $hall_tables->contact }}</td>
                                                        <td>{{ $hall_tables->email }}</td>
                                                        <td>{{ $hall_tables->address }}</td>
                                                        <td>
                                                            @if($hall_tables->status == "pending")
                                                                <a href="/approved_hall_status/{{ $hall_tables->id }}/{{$hall_tables->status}}"><button class="badge badge-pill badge-danger" style="cursor: pointer;">Pending</button></a>
                                                            @else
                                                                <a href="/approved_hall_status/{{ $hall_tables->id }}/{{$hall_tables->status}}"><button class="badge badge-pill badge-success" style="cursor: pointer;">Approved</button></a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-secondary dropdown-toggle fuse-ripple-ready"
                                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="top-start" x-out-of-boundaries="" style="position: absolute; transform: translate3d(0px, -12px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item fuse-ripple-ready" href="/hall_info/{{ $hall_tables->orignal_hall_id }}">DETAILS</a>
                                                                    <a class="dropdown-item fuse-ripple-ready" href="/hall_edit/{{ $hall_tables->id }}">EDIT</a>
                                                                    <a class="dropdown-item fuse-ripple-ready" href="/hall_a_delete/{{ $hall_tables->id }}">DELETE</a>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                            <script type="text/javascript">
                                                $('#sample-data-table').DataTable({
                                                    responsive: true,
                                                    dom: 'rt<"dataTables_footer"ip>'
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->

        </div>

    </div>
@endsection