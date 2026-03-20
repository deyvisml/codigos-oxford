<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>@yield('title') - Códigos Oxford ✔️</title>

    <meta name="keywords"
        content="Comprar código Oxford, practica en linea, English File, American English File, Código Oxford España, Libros American English File, pdf, audios">
    <meta name="author" content="Códigos Oxford">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <link rel="canonical" href="{{ url()->current() }}" />

    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title') - Códigos Oxford">
    <meta property="og:description"
        content="Encuentra los códigos y licencias para tus libros Oxford (OUP). Estos códigos te brindarán acceso a recursos como el Online Practice y e-books de colecciones como English File, American English File, Headway, ¡y muchas más!" />
    <meta property="og:url" content="https://codigosoxford.com" />
    <meta property="og:site_name" content="Códigos Oxford">
    <meta property="og:image" content="{{ asset('images/icons/favicon-512x512.png') }}?5">

    <!-- icons are defined for all pages -->
    <!-- for all browsers -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">

    <!-- for google and android -->
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/icons/favicon-48x48.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/icons/favicon-192x192.png') }}">

    <!-- for ipad -->
    <link rel="apple-touch-icon" type="image/png" sizes="167x167"
        href="{{ asset('images/icons/favicon-167x167.png') }}">

    <!-- for iphone -->
    <link rel="apple-touch-icon" type="image/png" sizes="180x180"
        href="{{ asset('images/icons/favicon-180x180.png') }}">

    @stack('headers')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('libs/tw-elements/tw-elements.min.css') }}">
    @stack('css-scripts')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- font awesome icons lib -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="flex flex-col bg-red-50 min-h-screen">
    @php
        // mala practica pero no pude crear una controlador para esta vista template
        use App\Models\Country;
        use App\Models\Category;

        // get  countries
        $countries = Country::get();

        // get categories
        $categories = Category::limit(5)->get();
    @endphp

    <header>
        <div class="bg-sky-900">
            <div class="mx-auto px-2 max-w-7xl">
                <nav class="flex flex-wrap justify-between items-center gap-x-2 sm:gap-x-4 py-2 w-full">
                    <div class="flex flex-wrap justify-center md:justify-between items-center w-full md:w-2/12">
                        <a href="/" class="w-auto" title="Inicio">
                            <img src="{{ asset('images/logo.png') }}" alt="imagen logo" title="logo códigos oxford"
                                class="max-h-[75px] object-contain">
                        </a>
                    </div>
    
                    <form action="{{ route('search.index') }}" method="get"
                        class="flex justify-center items-center md:my-0 mt-3 w-full md:w-5/12 sm:min-w-[400px] search-container">
    
                        <div class="flex items-center border-s border-y rounded w-full md:w-full overflow-hidden">
                            <input type="text" name="keyword" placeholder="Buscar por titulo, ISBN, etc."
                                class="p-2 outline-none w-11/12" required>
    
                            <button type="submit" data-te-ripple-init data-te-ripple-color="dark"
                                class="flex justify-center bg-neutral-200 hover:bg-neutral-300 px-4 py-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </button>
                        </div>
                    </form>
    
                    <!-- dropdown component -->
                    <div class="relative my-3 w-2/12 min-w-[180px]" data-te-dropdown-ref>
                        <button
                            class="flex items-center bg-neutral-50 hover:bg-neutral-100 focus:bg-neutral-100 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] px-4 py-1.5 rounded focus:outline-none focus:ring-0 font-medium text-neutral-800 text-sm leading-normal whitespace-nowrap transition motion-reduce:transition-none duration-150 ease-in-out"
                            type="button" id="dropdownMenuButton9" data-te-dropdown-toggle-ref aria-expanded="false"
                            data-te-ripple-init>
                            Soy estudiante
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="ms-2 mb-1 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
    
                            <span class="ml-2 w-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul class="hidden [&[data-te-dropdown-show]]:block z-[1000] float-left absolute bg-white dark:bg-neutral-700 bg-clip-padding shadow-lg m-0 border-none rounded-lg min-w-max overflow-hidden text-base text-left list-none"
                            aria-labelledby="dropdownMenuButton9" data-te-dropdown-menu-ref>
                            @foreach ($countries as $country)
                                <li>
                                    <a class="block bg-transparent hover:bg-neutral-100 disabled:bg-transparent dark:hover:bg-neutral-600 px-4 py-2 w-full font-normal text-neutral-700 active:text-neutral-800 disabled:text-neutral-400 dark:text-neutral-200 text-sm active:no-underline whitespace-nowrap disabled:pointer-events-none"
                                        href="{{ route('schools.index', ['country' => $country]) }}"
                                        title="{{ $country->name }}" data-te-dropdown-item-ref>
                                        {{ $country->name }}
                                        <img src="{{ asset('images/country-flags/' . $country->flag) }}"
                                            class="inline-block ms-2 mb-1 w-6 h-6" alt="{{ $country->flag }}"
                                            title="{{ $country->flag }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END dropdown component -->
    
                    <div class="flex justify-end my-2 w-auto min-w-[150px]">
                        @auth
                            <div class="relative" data-te-dropdown-ref>
                                <!-- Second dropdown trigger -->
                                <a class="hidden-arrow flex justify-center items-center whitespace-nowrap transition motion-reduce:transition-none duration-150 ease-in-out cursor-pointer"
                                    href="#" title="opciones de usuario" id="dropdownMenuButton2" role="button"
                                    data-te-dropdown-toggle-ref aria-expanded="false">
                                    <!-- User avatar -->
                                    <img src="{{ auth()->user()->picture }}"
                                        class="me-2 border-2 border-neutral-300 rounded-full w-9 h-9" alt="user image"
                                        title="user" loading="lazy" />
                                    <p class="me-1 text-neutral-100 text-sm cursor-pointer">{{ auth()->user()->first_name }}
                                    </p>
    
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="mt-1 w-4 h-4 text-neutral-100">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </a>
                                <!-- Second dropdown menu -->
                                <ul class="hidden [&[data-te-dropdown-show]]:block right-0 left-auto z-[1000] float-left absolute bg-white dark:bg-neutral-700 bg-clip-padding shadow-lg m-0 mt-1 border-none rounded-lg min-w-max overflow-hidden text-base text-left list-none"
                                    aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                                    <!-- Second dropdown menu items -->
                                    <li>
                                        <a class="block bg-transparent hover:bg-neutral-100 disabled:bg-transparent dark:hover:bg-white/30 px-4 py-2 w-full font-normal text-neutral-700 active:text-neutral-800 disabled:text-neutral-400 dark:text-neutral-200 text-sm active:no-underline whitespace-nowrap disabled:pointer-events-none"
                                            href="{{ route('purchase.list') }}" title="mis compras"
                                            data-te-dropdown-item-ref>Mis compras</a>
                                    </li>
                                    <li>
                                        <a class="block bg-transparent hover:bg-neutral-100 disabled:bg-transparent dark:hover:bg-white/30 px-4 py-2 w-full font-normal text-neutral-700 active:text-neutral-800 disabled:text-neutral-400 dark:text-neutral-200 text-sm active:no-underline whitespace-nowrap disabled:pointer-events-none"
                                            href="/google-auth/logout" title="salir" data-te-dropdown-item-ref
                                            title="salir">Salir</a>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                        @guest
                            <a href="/google-auth/redirect" title="ingresar" class="text-gray-100 text-left">Ingresar /
                                Registrarse</a>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>
    
        <div class="bg-neutral-50 border-gray-300 border-y-4">
            <div class="mx-auto px-0 max-w-7xl">
                <nav>
                    <ul class="flex flex-wrap justify-start font-semibold text-slate-600 text-sm">
                        @foreach ($categories as $category)
                            <li
                                class="{{ isset($current_category) ? ($category->id === $current_category->id ? 'bg-neutral-200' : '') : '' }} sm:w-auto w-full border ">
                                <a href="{{ route('series.index', ['category' => $category]) }}"
                                    title="{{ $category->name }}"
                                    class="block hover:bg-neutral-200 px-4 py-1.5 hover:text-slate-900">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-grow bg-white">
        @yield('content')
    </main>

    <footer class="flex justify-center items-center bg-sky-200 h-24">
        <p class="text-center">Códigos Oxford 2013-2026 ©</p>
    </footer>

    <div class="right-5 bottom-5 z-20 fixed">
        <div class="flex flex-col gap-y-2">
            <a href="https://www.facebook.com/codigos.ingles" target="_blank">
                <img class="w-14" src="{{ asset('images/social-media/facebook.png') }}" alt="icono whatsapp"
                    title="icono whatsapp">
            </a>
            <a href="https://api.whatsapp.com/send?phone=51938544411&amp;text=Hola, vengo de la página web y necesito mas información sobre el producto"
                target="_blank">
                <img class="w-14" src="{{ asset('images/social-media/whatsapp.png') }}" alt="icono whatsapp"
                    title="icono whatsapp">
            </a>
        </div>
    </div>

    <script src="{{ asset('libs/tw-elements/tw-elements.umd.min.js') }}"></script>
    @stack('js-scripts')
</body>

</html>
