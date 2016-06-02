@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Log</h2>
            <table class="table table-bordered">
                <tr>
                    <td width="25%">Slave</td>
                    <td width="75%"><a href="{{ route('command.slave', $log->slave->id) }}">{{ $log->slave->name." (".$log->slave->ip.")" }}</td>
                </tr>
                <tr>
                    <td>Submitted at:</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            </table>
            <h3>Data</h3>
            @if( count($log->data) > 0 )
                @foreach($log->data as $data)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $data->window }}</div>
                        <div class="panel-body">{{ $data->logs }}</div>
                    </div>
                @endforeach
            @else
                <p>No data wtf</p>
            @endif
        </div>
    </div>
@stop
