@extends("templates.default")
@section("content")
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="page-header text-center">Login</h1>
            @include('partials.errors')
            <form action="{{ route('login.post') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" class="form-control" name="password" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Enter</button>
                </div>
            </form>
        </div>
    </div>
@stop
