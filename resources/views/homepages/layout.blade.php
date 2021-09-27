<!DOCTYPE html>

<html>
<head>
    <title>Homepage Layout</title>
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">    
    
</head>
<body>

  

<div class="container">
    @yield('content')
</div>
</body>

</html>