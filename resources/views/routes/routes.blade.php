@extends('layouts.app')
@section('title',config('app.name').' | Routes Explorer' )

@section('css')
<!-- Datatables css -->
<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css">
@endsection

@section('content')
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Routes</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover table-responsive" id="routes-table">
                                <thead>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Methods</th>
                                <th>Middleware</th>
                                @if (config('infyom.routes_explorer.collections.api_calls_count'))
                                    <th>Count</th>
                                @endif
                                </thead>
                                <tbody>
                                @foreach($routes as $route)
                                    <tr>
                                        <td>{!! $route['name'] !!}</td>
                                        <td>{!! $route['url'] !!}</td>
                                        <td>{!! $route['methods'] !!}</td>
                                        <td> $route['middleware'] </td>
                                        @if (config('infyom.routes_explorer.collections.api_calls_count'))
                                            <td>{!! $route['count'] !!}</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>

<script type="application/javascript">
    $(function () {
        $(document).ready(function () {
            $('#routes-table').DataTable();
        });
    });
</script>
@endsection
