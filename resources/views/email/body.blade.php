<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{$nome}} ti ha contattato</h1>
            <h3>
                Puoi rispondermi alla seguente email: {{$email}}
            </h3>
            <p>
                Questo è cio che ha scritto:
                {{ $guestMessage }}
            </p>
        </div>
    </div>
</div>

</body>
</html>
