<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-50 text-black/50 ">
        <div class="relative min-h-screen flex flex-col items-center justify-top selection:bg-[#FF2D20] selection:text-white"
            style="background: #fff ; background-size: cover;">
            <div class="relative w-full max-w-2xl px-6 flex text-black flex-col lg:max-w-7xl">
                <header class="flex justify-end my-5">
                    <img src="https://uitm.edu.my/images/images/logo/logoUiTM.png">
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition  focus:outline-none focus-visible:ring-[#FF2D20] ">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2  ring-1 ring-transparent transition  focus:outline-none focus-visible:ring-[#FF2D20] ">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2  ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] ">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class="mt-20 flex-col flex items-center justify-center" style="max-height: none">
                    <h1 class="text-3xl text-black text-center home-title">Welcome to Ethics Form<br> for Computer Science Students
                    </h1>
                    <img src='{{ asset('./images/welcome.png') }}' style="width:800px;">
                </main>

                <footer class="py-16 text-center text-sm">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
