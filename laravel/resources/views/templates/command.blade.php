<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Command</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/command.css?v='.date('l jS \of F Y h:i:s A')) }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <header>
                <h1>Attic - Command Center</h1>
            </header>
            <div id="inner-wrapper">
                <nav>
                    <ul>
                        <li><a href="{{ route('command.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('command.logs') }}">Logs</a></li>
                        <li><a href="{{ route('command.dumps') }}">Dumps</a></li>
                        <li><a href="{{ route('command.slaves') }}">Slaves</a></li>
                    </ul>
                </nav>
                <section id="content">
                    @yield('content')
                </section>
            </div>
        </div>
    </body>
</html>
