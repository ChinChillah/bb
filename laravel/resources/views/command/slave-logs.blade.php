@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Slave logs</h2>
            <p><strong>Viewing</strong> {{ $slave->name }} - {{ $slave->ip }}</p>
            @if( $slave->logs->count() == 0 )
                <div class="empty">This slave does not have any logs yet</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Submission date</th>
                            <th class="text-right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slave->logs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->created_at }}</td>
                                <td class="text-right"><a href="#">View log</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
