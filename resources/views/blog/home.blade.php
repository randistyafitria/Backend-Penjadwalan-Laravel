<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Selamat Datang di Website!</h1>

        @foreach($orang as $human)
        <li> {{ $human }} </li>
        @endforeach
        
    </body>
</html>