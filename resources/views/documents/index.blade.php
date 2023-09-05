<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documents</title>
</head>
<body>
    <h1>DOCUMENTS INDEX</h1>
    <p>lista documenti:</p>

    @foreach($documents as $document)
        <ul>
            <li>{{ $document->plate }} | {{ $document->date_matriculation }} | {{ $document->description }} <br>
                <a href="{{ route('documents.edit', $document->id) }}">Edit document</a>

                <form action="{{ route('documents.destroy', $document->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete document</button>
                </form>

            </li>
        </ul>
    @endforeach
</body>
</html>