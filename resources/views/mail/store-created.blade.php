<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accès votre Store</title>
</head>
<body>
    Bonjour {{$manager->name}}
    <p>
        Votre nouveau Store <b>{{$store->name}}</b> est créé
    </p>
    <p>
        Accès du store: <br>
        Login : {{$manager->email}} <br>
        Mot de passe: {{$password}}
    </p>
</body>
</html>