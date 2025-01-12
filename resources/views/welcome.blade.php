<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
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
                <h4 class='text-lg text-green-700 font-bold tracking-wide'>PenJy</h4>
            </div>
            <ul class='navbar-menu flex flex-row gap-4 items-center shadow-lg md:shadow-none'>
                <li><a href="/" class='text-green-700 font-semibold hover:underline'>Home</a></li>
                <li><a href="" class='text-green-700 font-semibold hover:underline'>Items</a></li>
                <li class='bg-green-600 md:bg-none'><a href="/login" class=' rounded text-white md:text-white md:bg-green-700 px-4 py-2 font-semibold hover:bg-green-800 duration-200'>Login</a></li>
            </ul>
            <div class="hamburger-menu md:hidden" id="hamburger-menu">
                <span>&#9776;</span> <!-- Hamburger icon -->
            </div>
        </nav>
    </header>

    {{-- Hero Se'ction --}}
    <section class='hero text-center flex flex-col items-center justify-center bg-gray-900 h-[65vh] w-100'>
        <div class='background'></div>
        <div class=''>
            <h2 class='animate text-5xl text-white font-bold'>Welcome to PenJy!</h2>
        </div>
    </section>

    {{-- Items Section --}}
    <section class='mt-4'>
        <div class='animate w-full text-center flex flex-col items-center justify-center'>
            <h2 class=' text-4xl  text-green-800' style="font-family: 'Lora';">Your Neighborhood Delivery Service</h2>
            <div class='mt-4 flex flex-row items-center justify-center gap-4'>
                <a href='/' class='p-2 {{ request()->query() == [] ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
                    RECENT
                </a>
                <form action='/' method='GET'>
                    @csrf
                    <input type="hidden" name="category" value='merchandise'>
                    <button class='p-2 {{ request()->get("category") == "merchandise" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
                        MERCHANDISE
                    </button>
                </form>
                <form action='/' method='GET'>
                    @csrf
                    <input type="hidden" name="category" value='albums'>
                    <button class='p-2 {{ request()->get("category") == "albums" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
                        ALBUMS
                    </button>
                </form>
                <form action='/' method='GET'>
                    @csrf
                    <input type="hidden" name="category" value='bundle'>
                    <button class='p-2 {{ request()->get("category") == "bundle" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
                        BUNDLE
                    </button>
                </form>
                <form action='/' method='GET'>
                    @csrf
                    <input type="hidden" name="category" value='special_edition'>
                    <button class='p-2 {{ request()->get("category") == "special_edition" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
                        SPECIAL EDITION
                    </button>
                </form>
            </div>

        </div>  
        <div class='mt-6 w-full flex items-center justify-center flex-wrap'>
            @foreach ($products as $product)
            {{-- Item --}}
            <div class='animate shadow-sm  flex flex-col gap-4 p-4'>
                {{-- Product Image --}}
                <img width='250' class=' object-cover rounded' src="{{ $product->getFirstMediaUrl('product_images')}}">
                {{-- Product Description --}}
                <div class='flex flex-col items-center'>
                    <h2 class='text-gray-600 font-semibold text-lg '>{{ $product->name  }}</h2>
                    {{-- <p>{{ Str::limit($product->description, 40) }}</p> --}}
                    <span class='text-green-700 font-bold text-2xl'>₱{{ $product->price }}</span>
                    <button class='bg-green-800 text-sm text-white rounded shadow-md px-4 py-1 mt-2'>View item</button>
                </div>
            </div>
            @endforeach
        </div>
    </section>



    <script type="text/javascript">
        const hamburgerMenu = document.querySelector('.hamburger-menu')
        const navMenu = document.querySelector('.navbar-menu')

        hamburgerMenu.addEventListener('click', () => {
            navMenu.classList.toggle('active');
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
