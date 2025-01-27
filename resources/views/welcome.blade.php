<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    {{-- Font Awesome --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <header>
        <nav class='flex flex-row bg-white justify-between p-6 '>
            <div>
                <h4 class='text-lg text-green-700 font-bold tracking-wide'>Artists's e-com.</h4>
            </div>
            <ul class='navbar-menu flex flex-row gap-4 items-center shadow-lg md:shadow-none'>
                <li><a href="/" class='text-green-700 font-semibold hover:underline'>Home</a></li>
                @auth
                    <a 
                        href='{{ route('home.user.cart') }}'
                        type='submit'
                        class='bg-green-800 text-md text-white rounded shadow-md px-4 py-1'>
                        <i class="fas fa-shopping-cart"></i>

                        {{ auth()->user()->cart->items()->exists() ? auth()->user()->cart->items->count() : 0  }}
                    </a>
                <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class='cursor-pointer rounded font-semibold py-1 px-4 shadow-sm bg-green-700 md:bg-none text-white p-2' href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </li>
                        </form>
                @endauth
                @guest
                    <li class='bg-green-600 md:bg-none'><a href="/login" class=' rounded text-white md:text-white md:bg-green-700 px-4 py-2 font-semibold hover:bg-green-800 duration-200'>Login</a></li>
                @endguest
            </ul>
            <div class="hamburger-menu md:hidden cursor-pointer" id="hamburger-menu">
                <div class='flex flex-col gap-[3px] w-[30px]'>
                    <div class='line bg-green-800 rounded-sm h-[4px] w-[100%]'></div>
                    <div class='line bg-green-800 rounded-sm h-[4px] w-[100%]'></div>
                    <div class='line bg-green-800 rounded-sm h-[4px] w-[100%]'></div>
                </div>
            </div>
        </nav>
    </header>

    {{-- Items Section --}}
    @yield('content')


    <script type="text/javascript">
        const hamburgerMenu = document.querySelector('.hamburger-menu')
        const navMenu = document.querySelector('.navbar-menu')

        hamburgerMenu.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            hamburgerMenu.classList.toggle('active')
        })

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                }   else {
                    entry.target.classList.remove('in-view');
                }
            })
        }, )
        const animates = document.querySelectorAll('.animate')

        animates.forEach((animate) => {
            observer.observe(animate);
        })



    </script>

</body>
<html>
