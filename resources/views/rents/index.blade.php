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

            <h2>Seleziona modulo</h2>
            <a href="/users"><i class="fas fa-home"></i>Users</a>
            <a href="/vehicles"><i class="fas fa-home"></i>Vehicles</a>
            <a href="/documents"><i class="fas fa-home"></i>Documents</a>
            <a href="/rents"><i class="fas fa-home"></i>Rents</a>
    		{{-- <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a> --}}
    	</div>
    </nav>

    
    <h1>RENTS INDEX</h1>
    <a href="/rents/create"><i class="fas fa-home"></i>Crea nuovo noleggio</a>
    <p>Lista noleggi:</p>


    @foreach($rents as $rent)
        <ul>
            <li>{{ $rent->id }} | {{ $rent->user_id }} | {{ $rent->vehicle_id }} | {{ $rent->practice_number }} | {{ $rent->rent_type }} | {{ $rent->start_date_rent }} | {{ $rent->end_date_rent }} | {{ $rent->cost }}<br>
                
                <a href="{{ route('rents.edit', $rent->id) }}">Edit rent</a>

                <form action="{{ route('rents.destroy', $rent->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete rent</button>
                </form>

            </li>
        </ul>
    @endforeach

</body>
</html>