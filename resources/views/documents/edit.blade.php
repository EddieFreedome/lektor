<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documents</title>
</head>
<body>
    
    <nav class="navtop">
    	<div>
    		<h1>Website Title</h1>
            <a href="/dashboard"><i class="fas fa-home"></i>Home</a>
    		{{-- <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a> --}}
    	</div>
    </nav>


    <h1>DOCUMENT EDIT</h1>
    <p>Modifica documento:</p>

    <form method="POST" action="{{route('documents.update', $document->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="document_type">Tipo documento</label>
            <select id="document_type" class="block mt-1 w-full" name="document_type">
                {{-- temporary solution while creating document_types table for looping every type possible and mark the saved one as selected --}}
                <option value="Patente"  {{ ( $document->type === 'Patente') ? 'selected' : '' }}>Patente</option>
                <option value="Passaporto"  {{ ( $document->type === 'Passaporto') ? 'selected' : '' }}>Passaporto</option>
            </select>
        </div>

        <div>
            
            <label for="user">Utente associato</label>
            
            <select name="user" id="user">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ ( $user->id == $ass_user->id) ? 'selected' : '' }}>
                        {{ $user->email }} | {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="vehicle">Veicolo</label>
            <select id="vehicle" class="block mt-1 w-full" name="vehicle" :value="old('vehicle')" required autocomplete="vehicle">
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}"  {{ ( $vehicle->id == $ass_vehicle->id) ? 'selected' : '' }}>
                        {{ $vehicle->plate }} | {{$vehicle->id}}
                    </option>
                @endforeach
            
            </select>
        </div>

        <div>
            <label for="document_description">Descrizione documento</label>
            <input type="text" name="document_description" id="document_description" value="{{ $document->description }}">
        </div>

        <div>
            <label for="expiry_date">Scadenza documento</label>
            <input type="date" id="expiry_date" class="block mt-1 w-full" name="expiry_date"  required autocomplete="expiry_date" value="{{ $document->expiry_date }}">

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
            
            
            <button type="submit">Edit document</button>
        </div> 

        <!-- Plate -->
        {{-- <div>
            <x-input-label for="plate" :value="__('Vehicle plate')" />
            <x-text-input id="plate" class="block mt-1 w-full" type="text" name="plate" value=" {{ $vehicle->plate }} " required autofocus autocomplete="plate" />
            <x-input-error :messages="$errors->get('plate')" class="mt-2" />
        </div>

        <!-- Immatricolation date -->
        <div class="mt-4">
            <x-input-label for="date_matriculation" :value="__('Immatricolation date')" />
            <input type="date" id="date_matriculation" class="block mt-1 w-full" type="email" name="date_matriculation" value="{{ $vehicle->date_matriculation }}" required autocomplete="date_matriculation" />
            <x-input-error :messages="$errors->get('date_matriculation')" class="mt-2" />
        </div>

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Vehicle description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value=" {{ $vehicle->description }} " required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        

        <div class="flex items-center justify-end mt-4">
            <button type="submit">Edit vehicle</button>
        </div> --}}

    </form>

</body>
</html>