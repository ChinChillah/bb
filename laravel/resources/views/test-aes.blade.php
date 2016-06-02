@extends("templates.command")
@section("content")
    <h2 class="page-header text-center">Test AES</h2>
    @include("partials.errors")
    <form action="{{ route('api.test.aes') }}" method="post">
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" id="password" class="form-control" name="password" />
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <textarea id="text" class="form-control" name="data" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Test AES</button>
    </form>
@stop
