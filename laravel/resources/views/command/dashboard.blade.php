@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard</h2>
            <table class="table table-bordered mar-b-0">
                <tr>
                    <td width="25%">Slaves:</td>
                    <td width="75%">{{ $slaves->count() }}</td>
                </tr>
                <tr>
                    <td>Dumps:</td>
                    <td>{{ $dumps->count() }}</td>
                </tr>
                <tr>
                    <td>Logs:</td>
                    <td>{{ $logs->count() }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
