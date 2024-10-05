<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Penerimaan Siswa Baru PPDB</title>
</head>

<body>
    <header>
        <div class="bg-green-700 h-20 flex items-center justify-between px-10">
            <div></div>
            <h1 class="text-white text-4xl">Penerimaan Siswa Baru PPDB</h1>
            @auth
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white w-20 rounded-md text-lg">Logout</button>
                </form>
            @endauth
            @guest
                <div></div>
            @endguest
        </div>
    </header>

    <main class="mt-10 mb-10">
        @yield('content')
    </main>

    <footer>

    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
