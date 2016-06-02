@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Slaves</h2>
            @if($slaves->count() == 0)
                <div class="empty">No slaves have checked back yet</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>IP</th>
                            <th>Name</th>
                            <th>Logs</th>
                            <th>Dumps</th>
                            <th class="text-right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $slaves as $slave )
                            <tr>
                                <td>{{ $slave->id }}</td>
                                <td>{{ $slave->ip }}</td>
                                <td>{{ $slave->name }}</td>
                                <td>{{ $slave->logs->count() }}</td>
                                <td>{{ $slave->dumps->count() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('command.slave', $slave->id) }}">View slave</a> - <a href="{{ route('command.slave.logs', $slave->id) }}">View logs</a> - <a href="{{ route('command.slave.dumps', $slave->id) }}">View dumps</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
