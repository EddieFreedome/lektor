<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <title>Lektor Rent App</title>
</head>


<body>
    <nav class='min-h-nav sticky top-0 w-full bg-slate-500  p-6 rounded-bl-48 rounded-br-48  mb-10 sm:mb-1 shadow-md shadow-gray-500/10 z-50 '>

        <div class="container mx-auto flex items-center justify-center
                    ">

            <a href='' class='flex-center'>
                <img
                {{-- <img src="" alt="Lektor" style="width: 221px" width="200" height="200"> --}}
                    src='https://www.lektorweb.eu/wp-content/uploads/2020/06/lektor-bianco.png'
                    alt='logo'
                    class='object-contain h-12'
                    style="width: 221px"
                >
            </a>

        
            
        </div>
    </nav>
</body>
</html>