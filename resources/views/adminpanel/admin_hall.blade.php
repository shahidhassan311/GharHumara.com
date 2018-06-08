@extends('layouts.admin_master_layout')

@section('content')
    <div class="content custom-scrollbar">

        <div class="doc data-table-doc page-layout simple full-width">

            <!-- HEADER -->
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">Agents</h2>



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

                                        <h3>Agents Info</h3>


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
                                                            <span class="column-title">Agent Name</span>
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
                                                            <span class="column-title">Action</span>
                                                        </div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($user as $key => $users)
                                                    @if($users == '')
                                                    @else
                                                        <tr>
                                                            <td>{{ $users->hall_name }}</td>
                                                            <td>{{ $users->contact }}</td>
                                                            <td>{{ $users->email }}</td>
                                                            <td>{{ $users->address }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-secondary dropdown-toggle fuse-ripple-ready"
                                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                                                    </button>
                                                                    <div class="dropdown-menu" x-placement="top-start" x-out-of-boundaries="" style="position: absolute; transform: translate3d(0px, -12px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                        <a class="dropdown-item fuse-ripple-ready" href="/{{ $users->id }}">DETAIL</a>
                                                                        <a class="dropdown-item fuse-ripple-ready" href="/{{ $users->id }}">EDIT</a>
                                                                        <a class="dropdown-item fuse-ripple-ready" href="/{{ $users->id }}">DELETE</a>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    @endif
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