<!DOCTYPE html>
{{--<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <h1>USER CREATE</h1>
    <p>Crea nuovo utente:</p>
</body>
</html> --}}

<html>
	<head>
		<meta charset="utf-8">
		<title>Create document</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <nav class="navtop">
            <div>
                <h1>Lektor Navigation</h1>
                <a href="/dashboard"><i class="fas fa-home"></i>Home</a>
                <a href="/rents"><i class="fas fa-list"></i>Index</a>
                {{-- <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a> --}}
            </div>
        </nav>

        <h1>RENT EDIT</h1>
        <p>Modifica noleggio:</p>

        <form method="POST" action="{{ route('rents.update', $rent->id) }}">
            @csrf
            @method('PUT')

            <div>
                
                <label for="user">Utente</label>
                
                <select name="user" id="user">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"  {{ ( $rent->user_id === $user->id ) ? 'selected' : '' }}>
                            {{ $user->email }} | {{$user->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="vehicle">Veicolo</label>
                <select id="vehicle" class="block mt-1 w-full" name="vehicle" :value="old('vehicle')" required autocomplete="vehicle">
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" {{ ( $rent->vehicle_id === $vehicle->id ) ? 'selected' : '' }}>
                            {{ $vehicle->plate }} | {{$vehicle->id}}
                        </option>
                    @endforeach
                
                </select>
            </div>

            <div>
                <label for="rent_description">Descrizione noleggio</label>
                <input type="text" name="rent_description" id="rent_description" value="{{ $rent->rent_type }}">
            </div>

            <div>
                <label for="start_date_rent">Inizio noleggio</label>
                <input type="datetime-local" id="start_date_rent" class="block mt-1 w-full" name="start_date_rent"  required autocomplete="start_date_rent"  value="{{ $rent->start_date_rent }}">

            </div>

            <div>
                <label for="end_date_rent">Fine noleggio</label>
                <input type="datetime-local" id="end_date_rent" class="block mt-1 w-full" name="end_date_rent"  required autocomplete="end_date_rent" value="{{ $rent->end_date_rent }}">
            </div>

            <div>
                <label for="rent_cost">Costo noleggio</label>
                <input type="number" step="0.01" id="rent_cost" class="block mt-1 w-full" name="rent_cost"  required autocomplete="rent_cost" value="{{ $rent->cost }}">
            </div>



    
            <div class="flex items-center justify-end mt-4">
                <button type="submit">Edit rent</button>
            </div> 
        </form>


    </body>
</html>