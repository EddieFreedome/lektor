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
        {{-- <nav class="navtop">
            <div>
                <h1>Website Title</h1>
                <a href="index.php"><i class="fas fa-home"></i>Home</a>
                <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a>
            </div>
        </nav> --}}

        <h1>DOCUMENT CREATE</h1>
        <p>Crea nuovo documento:</p>

        <form method="POST" action="{{ route('documents.store') }}">
            @csrf
    
            <div>
                <label for="document_type">Tipo documento</label>
                <select id="document_type" class="block mt-1 w-full" name="document_type">
                    <option value="Patente">Patente</option>
                    <option value="Passaporto">Passaporto</option>
                </select>
            </div>

            <div>
                
                <label for="user">Utente associato</label>
                
                <select name="user" id="user">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }} | {{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="vehicle">Veicolo</label>
                <select id="vehicle" class="block mt-1 w-full" name="vehicle" :value="old('vehicle')" required autocomplete="vehicle">
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ $vehicle->plate }} | {{$vehicle->id}}</option>
                    @endforeach
                
                </select>
            </div>

            <div>
                <label for="document_description">Descrizione documento</label>
                <input type="text" name="document_description" id="document_description">
            </div>

            <div>
                <label for="expiry_date">Scadenza documento</label>
                <input type="date" id="expiry_date" class="block mt-1 w-full" name="expiry_date"  required autocomplete="expiry_date" />

            </div>

            <!-- Plate -->
            {{-- <div>
                <x-input-label for="plate" :value="__('Vehicle plate')" />
                <x-text-input id="plate" class="block mt-1 w-full" type="text" name="plate" :value="old('plate')" required autofocus autocomplete="plate" />
                <x-input-error :messages="$errors->get('plate')" class="mt-2" />
            </div>
    
            <!-- Immatricolation date -->
            <div class="mt-4">
                <x-input-label for="date_matriculation" :value="__('Immatricolation date')" />
                <input type="date" id="date_matriculation" class="block mt-1 w-full" type="email" name="date_matriculation" :value="old('date_matriculation')" required autocomplete="date_matriculation" />
                <x-input-error :messages="$errors->get('date_matriculation')" class="mt-2" />
            </div>
    
            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Vehicle description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            --}}
    
            <div class="flex items-center justify-end mt-4">
                
                
                <button type="submit">Create document</button>
            </div> 
        </form>


    </body>
</html>