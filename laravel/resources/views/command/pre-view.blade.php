@extends("templates.command")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h1>Viewing {{ $saywhat }}</h1>
            @if( $saywhat == "slave" )
                <table class="table table-bordered">
                    <tr>
                        <td width="25%">ID:</td>
                        <td width="75%">{{ $entry->id }}</td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>{{ $entry->name }}</td>
                    </tr>
                    <tr>
                        <td>IP:</td>
                        <td>{{ $entry->ip }}</td>
                    </tr>
                </table>
            @elseif( $what == "dump" or $what == "log" )
                <pre>{{ $entry->data }}</pre>
            @endif
        </div>
    </div>
@stop
