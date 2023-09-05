<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    
    <nav class="navtop">
    	<div>
    		<h1>Website Title</h1>
            <a href="/dashboard"><i class="fas fa-home"></i>Home</a>
    		<a href="read.php"><i class="fas fa-address-book"></i>Contacts</a>
    	</div>
    </nav>


    <h1>USER EDIT</h1>
    <p>Modifica utente:</p>

    <form method="PUT" action="/users/{{$user->id}}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <input type="text" id="name" class="block mt-1 w-full" type="text" name="name" value=" {{ $user->name }} " required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <input type="text" id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <input type="password" name="password" id="password" class="block mt-1 w-full"/>
                            
                            
                            

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> --}}

            
            <button type="submit">Aggiorna utente</button>
        </div>
    </form>

</body>
</html>