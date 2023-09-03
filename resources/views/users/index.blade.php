<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <h1>USER INDEX</h1>
    <p>lista utenti:</p>

    @foreach($users as $usr)
        <ul>
            <li>{{ $usr->id }} | {{ $usr->name }} | {{ $usr->email }} <br>
                <a href="{{ route('users.edit', $usr->id) }}">Edit user</a>

                <form action="{{ route('users.destroy', $usr->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete user</button>
                </form>

            </li>
        </ul>
    @endforeach
</body>
</html>