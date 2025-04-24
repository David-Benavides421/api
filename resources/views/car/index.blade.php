<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de carros</h1>
    <ul>
        @foreach($cars as $car)
            <li>
                {{ $car->make }}
                {{ $car->model }}
                {{ $car->color }}
                {{ $car->year }}
            </li>
        @endforeach
    </ul>
    
</body>
</html>