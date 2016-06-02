@extends("templates.command")
@section("content")
    @include("partials.errors")
    <form action="{{ route('api.purr') }}" method="post">
        <textarea class="form-control" name="data" style="margin-bottom: 10px;" rows="10"></textarea>
        <button class="btn btn-primary" type="submit" style="margin-bottom: 20px;">Decrypt logs</button>
    </form>
    <form action="{{ route('api.burr') }}" method="post">
        <textarea class="form-control" name="data" style="margin-bottom: 10px;" rows="10"></textarea>
        <button class="btn btn-primary" type="submit">Decrypt dump</button>
    </form>
@stop
