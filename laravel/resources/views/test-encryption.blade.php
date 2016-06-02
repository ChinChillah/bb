@extends("templates.command")
@section("content")
    @include("partials.errors")
    <form action="{{ route('api.test.encryption.post') }}" method="post">
        <button class="btn btn-primary" type="submit">Encrypt stuff</button>
    </form>
@stop
