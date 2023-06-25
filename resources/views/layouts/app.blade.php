<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | DevsTagram</title>

    <!-- aplica tailwind -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">DevStagram</h1>

            @auth
                <nav class="flex gap-5 items-center">
                    <a href="#">Hi:
                        <span class="font-normal text-gray-600 text-sm">
                            {{ auth()->user()->username }}
                        </span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" href="{{ route('logout') }}"
                            class="font-bold uppercase text-gray-600 text-sm">
                            Log Out
                        </button>
                    </form>

                </nav>
            @endauth

            @guest
                <nav class="flex gap-3 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Sign Up</a>
                </nav>
            @endguest

        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>

        @yield('content')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        &copy; {{ now()->year }} DevStagram - All rights reserved
    </footer>
</body>

</html>
