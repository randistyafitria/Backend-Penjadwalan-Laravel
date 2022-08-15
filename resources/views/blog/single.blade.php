<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Selamat Datang di Blog!</h1>
        <h2> {{ $blog}}! </h2>
    
        @foreach($users as $user)
        <li> {{ $user }} </li>
        @endforeach

    </body>
</html>