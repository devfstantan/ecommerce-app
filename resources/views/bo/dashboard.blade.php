<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>

    <form action="{{route('auth.logout')}}" method="post">
        @csrf
        <input type="submit" value="Se Déconnecter" class="btn btn-outline-dark" >
    </form>
</body>
</html>