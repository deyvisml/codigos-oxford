@extends('layouts.app')

@section('title')
    Códigos y Licencias Oxford ✔️
@endsection

@push('headers')
    <meta name="description" content="Encuentra los códigos y licencias para tus libros Oxford (OUP). Estos códigos te brindarán acceso a recursos como el Online Practice y e-books de colecciones como English File, American English File, Headway, ¡y muchas más!">

    <meta property="og:title" content="Códigos Oxford" />

    <!-- WebSite structured data (datos estructurados) -->
    <script type="application/ld+json">
        {
          "@context" : "https://schema.org",
          "@type" : "WebSite",
          "name" : "Códigos Oxford",
          "url" : "https://codigosoxford.com/",
          "image": "{{ asset('images/icons/favicon-192x192.png') }}",
          "description": "Encuentra los códigos y licencias para tus libros Oxford (OUP). Estos códigos te brindarán acceso a recursos como el Online Practice y e-books de colecciones como English File, American English File, Headway, ¡y muchas más!"
        }
    </script>
@endpush

@push('css-scripts')
    <link rel="stylesheet" href="{{ asset('libs/splide/splide.min.css') }}">

    <style>
        .splide__pagination {
            visibility: hidden !important;
            bottom: -20px !important;
        }

        @media (min-width: 640px) {
            .splide__pagination {
                visibility: visible !important;
            }
        }

        .splide__pagination__page {
            background-color: gray !important;
        }

        .splide__pagination__page.is-active {
            background-color: #0369a1 !important;
        }

        .splide__arrow--prev {
            background-color: #0369a1 !important;
            margin-left: -50px;
            font-size: 25px;
        }

        .splide__arrow--next {

            background-color: #0369a1 !important;
            margin-right: -50px;
            font-size: 25px;
        }
    </style>
@endpush

@section('content')
    <!-- Carousel imagenes -->
    <div id="carouselExampleCaptions" class="relative h-44 sm:h-72 md:h-80" data-te-carousel-init data-te-carousel-slide>
        <!--Carousel indicators-->
        <div class="right-0 bottom-0 left-0 z-[2] absolute flex justify-center mx-[15%] mb-4 p-0 list-none"
            data-te-carousel-indicators>
            <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="0" data-te-carousel-active
                class="box-content flex-initial bg-white bg-clip-padding opacity-50 mx-[3px] p-0 border-0 border-transparent border-y-[10px] border-solid w-[30px] h-[3px] -indent-[999px] transition-opacity motion-reduce:transition-none duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] cursor-pointer"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="1"
                class="box-content flex-initial bg-white bg-clip-padding opacity-50 mx-[3px] p-0 border-0 border-transparent border-y-[10px] border-solid w-[30px] h-[3px] -indent-[999px] transition-opacity motion-reduce:transition-none duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] cursor-pointer"
                aria-label="Slide 2"></button>
            <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="2"
                class="box-content flex-initial bg-white bg-clip-padding opacity-50 mx-[3px] p-0 border-0 border-transparent border-y-[10px] border-solid w-[30px] h-[3px] -indent-[999px] transition-opacity motion-reduce:transition-none duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] cursor-pointer"
                aria-label="Slide 2"></button>
        </div>

        <!--Carousel items-->
        <div class="after:block after:clear-both relative w-full h-full overflow-hidden after:content-['']">
            <!--First item-->
            <div class="float-left relative -mr-[100%] w-full h-full transition-transform motion-reduce:transition-none duration-[600ms] ease-in-out"
                data-te-carousel-active data-te-carousel-item style="backface-visibility: hidden">
                <img src="{{ asset('images/carousel-images/image1.jpg') }}" class="w-full h-full object-cover"
                    alt="imagen promocional" title="promocion"/>
                <div class="block bottom-10 absolute inset-x-[15%] py-5 text-white text-center">
                    <h1 class="hidden sm:block drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] font-bold text-base sm:text-2xl">
                        Códigos Oxford
                    </h1>
                    <p class="drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] text-sm sm:text-base">
                        Adquiere tus códigos y licencias digitales de Oxford University Press (OUP).
                    </p>
                </div>
            </div>

            <!--Second item-->
            <div class="hidden float-left relative -mr-[100%] w-full h-full transition-transform motion-reduce:transition-none duration-[600ms] ease-in-out"
                data-te-carousel-item style="backface-visibility: hidden">
                <img src="{{ asset('images/carousel-images/image2.jpg') }}" class="w-full h-full object-cover"
                    alt="imagen promocional" title="promocion"/>
                <div class="block bottom-10 absolute inset-x-[15%] py-5 text-white text-center">
                    <h2 class="drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] font-bold text-base sm:text-2xl">Online Practice
                    </h2>
                    <p class="drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] text-sm sm:text-base">
                        Adquiere códigos y licencias digitales para el Online Practice.
                    </p>
                </div>
            </div>

            <!--Third item-->
            <div class="hidden float-left relative -mr-[100%] w-full h-full transition-transform motion-reduce:transition-none duration-[600ms] ease-in-out"
                data-te-carousel-item style="backface-visibility: hidden">
                <img src="{{ asset('images/carousel-images/image3.jpg') }}" class="w-full h-full object-cover"
                    alt="imagen promocional" title="promocion"/>
                <div class="block bottom-10 absolute inset-x-[15%] py-5 text-white text-center">
                    <h2 class="drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] font-bold text-base sm:text-2xl">Oxford Learner’s
                        Bookshelf
                    </h2>
                    <p class="drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] text-sm sm:text-base">
                        Adquiere códigos y licencias digitales para el Student Book y el Workbook en formato e-book
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Carousel imagenes -->

    <div class="bg-slate-200 border">
        <div class="mx-auto px-2 max-w-7xl">
            <div
                class="flex flex-wrap items-center gap-x-10 gap-y-5 bg-white shadow my-8 p-5 border-s-4 border-sky-600">
                <p class="block text-xl">Formas de pago</p>

                <ul class="flex flex-wrap justify-start md:justify-around items-center gap-5 md:gap-16">
                    <li>
                        <img class="rounded h-8 md:h-10" src="{{ asset('images/banks-logos/paypal.png') }}" alt="imagen de forma de pago" title="forma de pago">
                    </li>
                    <li>
                        <img class="rounded h-8 md:h-10" src="{{ asset('images/banks-logos/visa.png') }}" alt="imagen de forma de pago" title="forma de pago">
                    </li>
                    <li>
                        <img class="rounded h-8 md:h-10" src="{{ asset('images/banks-logos/mastercard.png') }}" alt="imagen de forma de pago" title="forma de pago">
                    </li>
                    <li>
                        <img class="rounded h-8 md:h-10" src="{{ asset('images/banks-logos/american-express.png') }}" alt="imagen de forma de pago" title="forma de pago">
                    </li>
                    <!--<li>
                        <img class="rounded h-8 md:h-10"
                            src="https://d2a95c7k4laywg.cloudfront.net/wp-content/uploads/2021/03/bcp-logo-300x117.png"
                            alt="">
                    </li>
                    <li>
                        <img class="rounded h-8 md:h-10"
                            src="https://yt3.googleusercontent.com/l048nvZUXxmhjaDjxdJntZWSj03oOAK0ETKCQZup-Ea-aM_h8M94Jz87cw8JiwCHSEbv8llH=s176-c-k-c0x00ffffff-no-rj"
                            alt="">
                    </li>-->
                </ul>
            </div>

            <div class="bg-white shadow my-8 p-5 border-s-4 border-sky-600">
                <p class="block mb-3 font-semibold">Titulos o series</p>

                <ul class="flex flex-wrap justify-start gap-2 gap-y-3 sm:p-2 px-0">
                    @foreach ($series as $serie)
                        <li class="">
                            <a href="{{ route('home.serie', ['serie' => $serie]) }}" title="{{$serie->name}}"
                                class="bg-gray-200 hover:bg-gray-300 px-2 py-1 border-2 border-gray-300 rounded-md text-xs uppercase">
                                {{ $serie->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="mb-20">
        @php
            $i = 1;
        @endphp
        @foreach ($group_products as $group_product)
            <div class="py-5  @php echo $i % 2 == 0 ? 'bg-gray-200' : 'bg-gray-100' @endphp ">
                <div class="mx-auto px-2 max-w-7xl">
                    <a href="{{ route('home.serie', ['serie' => $group_product['serie']]) }}" title="{{$group_product['serie']->name}}"
                        class="decoration-gray-500 hover:underline cursor-pointer">
                        <h2 class="inline font-semibold text-gray-500 text-2xl cursor-pointer" id="section1">
                            {{ $group_product['serie']->name }}
                        </h2>
                    </a>
                    <div class="splide" id="splide-{{ $i }}">
                        <div class="splide__arrows">
                            <button class="bg-gray-900 shadow splide__arrow splide__arrow--prev">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </button>
                            <button class="bg-gray-900 shadow splide__arrow splide__arrow--next">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </button>
                        </div>
                        <div class="my-4 splide__track">
                            <ul class="splide__list">
                                @foreach ($group_product['products'] as $product)
                                    <li class="w-full splide__slide">
                                        <div
                                            class="bg-white shadow hover:shadow-xl mx-0 sm:mx-2 border-2 border-gray-200 rounded-xl">
                                            <a href="{{ route('products.index', ['product' => $product]) }}" title="{{$product->name}}"
                                                class="block p-3 cursor-pointer">
                                                <div class="flex flex-col justify-center items-center text-center">
                                                    <div class="flex justify-center items-center w-full h-44">
                                                        <img src="{{ asset('images/products/' . basename($product->oup_image_url)) }}"
                                                            alt="{{"imagen ". $product->name}}" title="{{$product->name}}" class="max-w-[140px] h-full object-contain">
                                                    </div>
    
                                                    <div class="w-full text-start">
                                                        <h3
                                                            class="pt-5 h-24 font-semibold text-sky-900 text-sm hover:underline cursor-pointer">
                                                            {{ $product->name }}
                                                        </h3>
                                                        <p
                                                            class="block mb-2 font-semibold text-gray-600 text-xs text-start cursor-pointer">
                                                            ISBN: <span class="font-normal">{{ $product->isbn }}</span>
                                                        </p>
                                                        <p class="font-semibold text-gray-800 text-2xl cursor-pointer">
                                                            {{ number_format($product->price_usd, 2) }} USD
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    </div>
@endsection



@push('js-scripts')
    <script src="{{ asset('libs/splide/splide.min.js') }}"></script>

    <script>
        const num_group_products = @php echo count($group_products); @endphp;

        for (let i = 1; i <= num_group_products; i++) {
            const splide = new Splide(`#splide-${i}`, {
                perPage: 5,
                breakpoints: {
                    640: {
                        perPage: 1,
                    },
                    880: {
                        perPage: 2,
                    },
                    1100: {
                        perPage: 3
                    },
                    1300: {
                        perPage: 4
                    }
                },
            });
            splide.mount();
        }
    </script>
@endpush
