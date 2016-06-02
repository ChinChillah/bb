@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Dump</h2>
            <table class="table table-bordered">
                <tr>
                    <td width="25%">Slave</td>
                    <td width="75%"><a href="{{ route('command.slave', $dump->slave->id) }}">{{ $dump->slave->name." (".$dump->slave->ip.")" }}</td>
                </tr>
                <tr>
                    <td>Submitted at:</td>
                    <td>{{ $dump->created_at }}</td>
                </tr>
            </table>
            <h3>Data</h3>
            <div class="panel panel-default">
                <div class="panel-heading">Dump</div>
                <div class="panel-body">{!! $dump->data !!}</div>
            </div>
        </div>
    </div>
@stop
