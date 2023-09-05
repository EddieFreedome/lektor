<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicles</title>
</head>
<body>
    <h1>VEHICLES INDEX</h1>
    <p>lista veicoli:</p>

    @foreach($vehicles as $vehicle)
        <ul>
            <li>{{ $vehicle->plate }} | {{ $vehicle->date_matriculation }} | {{ $vehicle->description }} <br>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}">Edit user</a>

                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete vehicle</button>
                </form>

            </li>
        </ul>
    @endforeach
</body>
</html>