@extends("templates.default")
@section("content")
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="page-header text-center">Register</h1>
            @include('partials.errors')
            <form action="{{ route('register.post') }}" method="post">
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
                    <button type="submit" class="btn btn-primary btn-block">Create account</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#generateAESkey").click(function(e){
                e.preventDefault();
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                for( var i=0; i < 32; i++ ){
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                $("#aes_key").val(text);
            });
        });
    </script>
@stop
