<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title', config('app.name'))</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <style>
    #flex-container {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
    }

    #flex-container > .flex-item {
      -webkit-flex: auto;
      flex: auto;
    }

    #flex-container > .raw-item {
        width: 4rem;
    }

    body{
        background-color: rgb(234, 235, 247);
    }
    a{
        text-decoration: none;
    }
    a:hover{
        text-decoration: underline;
        color: black;
    }
    .items-text {
	overflow: hidden;
	text-overflow: ellipsis;
	display: -webkit-box;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;}
    .container{ max-width: 720px; }
    .required:after { content: '*'; color: red; margin-left: 3px}
    </style>
    @stack('css')
</head>
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100">
        @include('includes.alert')
        @include('includes.header')
        <main class="flex-grow-1 py-3">
            @yield('content')
        </main>
        @include('includes.footer')
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    @stack('js')

</body>
</html>