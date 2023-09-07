<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicles</title>
</head>
<body>

    <h1>Lektor Navigation</h1>
    <nav class="navtop">
    	<div>
            <a href="/dashboard"><i class="fas fa-home"></i>Home</a>

            <h2>Seleziona modulo</h2>
            <a href="/users"><i class="fas fa-home"></i>Users</a>
            <a href="/vehicles"><i class="fas fa-home"></i>Vehicles</a>
            <a href="/documents"><i class="fas fa-home"></i>Documents</a>
            <a href="/rents"><i class="fas fa-home"></i>Rents</a>
    		{{-- <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a> --}}
    	</div>
    </nav>

    
    <h1>VEHICLES INDEX</h1>
    <a href="/vehicles/create"><i class="fas fa-home"></i>Crea nuovo veicolo</a>

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