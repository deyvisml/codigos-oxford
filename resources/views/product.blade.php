@extends('layouts.app')

@section('title')
    {{ $product->name }}
@endsection

@push('headers')
    <meta name="description" content="Adquiere tu código para {{$product->name}} ({{$product->isbn}}), edición {{$product->edition}}, serie {{$serie->name}}, precio {{number_format($product->price_usd, 2)}} USD, duración {{$product->licence_length}}">
    <meta property="og:title" content="{{ $product->name }} - Códigos Oxford" />
    <meta property="og:image" content="{{ asset('images/products/' . basename($product->oup_image_url)) }}?1" />

    <!-- Marcado JSON-LD generado por el Asistente para el marcado de datos estructurados de Google. -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Product",
            "name": "{{$product->name}}",
            "image": "{{ asset('images/products/' . basename($product->oup_image_url)) }}",
            "description": "Edición {{ $product->edition }}, Formato {{ $product->format }}, Nivel {{ $level->name }}, Duración {{ $product->licence_length }}, ISBN {{ $product->isbn }}",
            "url": "{{ url()->current(); }}",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.9",
                "reviewCount": "251"
            },
            "offers": {
                "@type": "Offer",
                "priceCurrency": "USD",
                "price": "{{number_format($product->price_usd, 2)}}"
            }
        }
    </script>
@endpush

@push('css-scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
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
    <div class="mx-auto px-4 max-w-7xl">
        <div class="my-8 mb-20">
            <div class="flex flex-wrap items-center gap-x-2 text-sm sm:text-base">
                <a href="{{ route('home.index') }}" class="text-sky-800 hover:underline" title="inicio">Inicio</a>
    
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor"
                    class="mt-0.5 w-3 h-3 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
    
                <a href="{{ route('series.index', ['category' => $category]) }}" title="{{$category->name}}"
                    class="text-sky-800 hover:underline"><h3>{{ $category->name }}</h3></a>
    
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4"
                    stroke="currentColor" class="mt-0.5 w-3 h-3 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
    
                <a href="{{ route('series.show', ['category' => $category, 'serie' => $serie]) }}" title="{{$serie->name}}"
                    class="text-sky-800 hover:underline"><h2>{{ $serie->name }}</h2></a>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4"
                    stroke="currentColor" class="mt-0.5 w-3 h-3 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>

                <a href="{{ route('series.show', ['category' => $category, 'serie' => $serie, 'level' => $product->level->id]) }}" title="{{ $product->level->name }}"
                    class="text-sky-800 hover:underline"><p>{{ $product->level->name }}</p></a>
            </div>
    
            <h1 class="mt-5 pb-3 border-b-2 font-semibold text-2xl">
                {{ $product->name }}
            </h1>
    
            <div class="flex flex-wrap justify-around items-start my-5 py-5">
                <div class="flex justify-center items-center p-5 border rounded md:w-52 h-52">
                    <img src="{{ asset('images/products/' . basename($product->oup_image_url)) }}" alt="imagen producto" title="{{$product->name}}"
                        class="max-w-[150px] h-full object-contain">
                </div>
    
                <div class="order-3 md:order-2 md:m-5 mx-2 my-5 md:my-0 w-full md:w-6/12">
    
                    <p class="font-semibold text-xl">Caracteristicas principales</p>
    
                    <ul class="bg-white my-5 rounded">
                        <li class="flex border-gray-300 border-b">
                            <p class="bg-gray-100 p-3 w-1/3 font-bold text-sm">Edición</p>
                            <p class="bg-gray-50 p-3 w-2/3 text-sm">{{ $product->edition }}</p>
                        </li>
                        <li class="flex border-gray-300 border-b">
                            <p class="bg-gray-200 p-3 w-1/3 font-bold text-sm">Formato</p>
                            <p class="bg-gray-50 p-3 w-2/3 text-sm">{{ $product->format }}</p>
                        </li>
                        <li class="flex border-gray-300 border-b">
                            <p class="bg-gray-100 p-3 w-1/3 font-bold text-sm">Nivel</p>
                            <h2 class="bg-gray-50 p-3 w-2/3 text-sm">{{ $level->name }}</h2>
                        </li>
                        <li class="flex border-gray-300 border-b">
                            <p class="bg-gray-200 p-3 w-1/3 font-bold text-sm">Duración</p>
                            <p class="bg-gray-50 p-3 w-2/3 text-sm">{{ str_replace('months', 'meses', $product->license_length) }}</p>
                        </li>
                        <li class="flex border-gray-300 border-b">
                            <p class="bg-gray-100 p-3 w-1/3 font-bold text-sm">ISBN</p>
                            <h2 class="bg-gray-50 p-3 w-2/3 text-sm">{{ $product->isbn }}</h2>
                        </li>
    
                    </ul>
                </div>
    
                <div
                    class="order-2 md:order-3 bg-white shadow my-5 md:my-0 p-4 border-2 border-gray-100 rounded w-full sm:w-auto md:w-80">
                    <p class="font-semibold text-3xl">{{ number_format($product->price_usd, 2)  }} <span class="text-xl">USD</span></p>
                    <p class="my-3 font-semibold text-sky-700 text-sm">Stock disponible
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="inline-block mb-1 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                    </p>
    
                    <label for="cantidad" class="block my-2 font-semibold text-gray-700 text-sm">Cantidad: (max 10)</label>
                    <input type="number" value="1" step="1" min="1" max="10"
                        class="p-2 border-2 rounded outline-none" id="cantidad">
    
                    @auth
                        <button type="button" data-te-toggle="modal" data-te-target="#payment_modal" data-te-ripple-init
                            data-te-ripple-color="light"
                            class="bg-blue-600 bg-primary hover:bg-blue-700 active:bg-primary-700 shadow-[0_4px_9px_-4px_#3b71ca] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] mt-4 py-2.5 rounded focus:outline-none focus:ring-0 w-full font-semibold text-white leading-normal transition duration-150 ease-in-out">
                            Comprar ahora
                        </button>
                    @endauth
                    @guest
                        <a class="block bg-blue-600 bg-primary hover:bg-blue-700 active:bg-primary-700 shadow-[0_4px_9px_-4px_#3b71ca] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] mt-4 py-2.5 rounded focus:outline-none focus:ring-0 w-full font-semibold text-white text-center leading-normal transition duration-150 ease-in-out"
                            href="{{ route('login') }}" title="comprar ahora">Comprar ahora</a>
                    @endguest
    
                    <div class="flex justify-center items-center mt-3 w-full h-9">
                        <img src="{{ asset('images/payment-methods.png') }}" alt="imagen formas de pago" title="formas de pago" class="max-h-full object-contain">
                    </div>
    
                    <a class="block mt-5 py-2 w-full text-sm" href="https://api.whatsapp.com/send?phone=51938544411&amp;text=Hola, tengo algunas consultas sobre el producto: {{ url()->full() }}" target="_blank" title="consultas del producto">
                            Consultas sobre el producto? <span class="font-semibold text-green-600">Click aquí <i class="text-lg fa-brands fa-whatsapp"></i></span>
                    </a>

                    <!-- PayPal payment modal-->
                    <div data-te-modal-init
                        class="hidden top-0 left-0 z-[1055] fixed outline-none w-full h-full overflow-x-hidden overflow-y-auto"
                        id="payment_modal" tabindex="-1" aria-labelledby="payment_modal" aria-modal="true" role="dialog">
                        <div data-te-modal-dialog-ref
                            class="relative flex items-center opacity-0 min-[576px]:mx-auto min-[576px]:mt-7 w-auto min-[576px]:max-w-[500px] min-h-[calc(100%-1rem)] min-[576px]:min-h-[calc(100%-3.5rem)] transition-all translate-y-[-50px] duration-300 ease-in-out pointer-events-none">
                            <div
                                class="relative flex flex-col bg-white dark:bg-white bg-clip-padding shadow-lg border-none rounded-md outline-none w-full text-current pointer-events-auto">
                                <div
                                    class="flex flex-shrink-0 justify-between items-center p-4 border-neutral-100 border-b-2 border-opacity-100 dark:border-opacity-50 rounded-t-md">
                                    <!--Modal title-->
                                    <p class="font-medium text-neutral-800 dark:text-gray-600 text-xl leading-normal"
                                        id="payment_modalLabel">
                                        Completar pago
                                    </p>
                                    <!--Close button-->
                                    <button type="button"
                                        class="box-content hover:opacity-75 focus:opacity-100 focus:shadow-none border-none rounded-none focus:outline-none hover:no-underline"
                                        data-te-modal-dismiss aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
    
                                <!--Modal body-->
                                <div class="relative p-4">
    
                                    <div id="paypal-button-container">
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
            <div class="mt-8 md:mt-16">
                <p class="pb-3 border-b-2 font-semibold text-xl">Productos similares</p>
    
                <div class="splide" id="splide-1">
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
                            @foreach ($similar_products as $similar_product)
                                <li class="w-full splide__slide">
                                    <div
                                        class="bg-white shadow hover:shadow-xl mx-0 sm:mx-2 border-2 border-gray-200 rounded-xl">
                                        <a href="{{ route('products.index', ['product' => $similar_product]) }}" title="{{$similar_product->name}}"
                                            class="block p-3 cursor-pointer">
                                            <div class="flex flex-col justify-center items-center text-center">
                                                <div class="flex justify-center items-center w-full h-44">
                                                    <img src="{{ asset('images/products/' . basename($similar_product->oup_image_url)) }}"
                                                        alt="imagen producto" title="{{$similar_product->name}}" class="max-w-[140px] h-full object-contain">
                                                </div>
    
                                                <div class="w-full text-start">
                                                    <h3
                                                        class="pt-5 h-24 font-semibold text-sky-900 text-sm hover:underline cursor-pointer">
                                                        {{ $similar_product->name }}
                                                    </h3>
                                                    <p
                                                        class="block mb-2 font-semibold text-gray-600 text-xs text-start cursor-pointer">
                                                        ISBN: <span class="font-normal">{{ $similar_product->isbn }}</span>
                                                    </p>
                                                    <p class="font-semibold text-gray-800 text-2xl cursor-pointer">
                                                        {{ number_format($similar_product->price_usd, 2)  }} USD
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
    </div>
@endsection


@push('js-scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script>
        const splide1 = new Splide('#splide-1', {
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

        splide1.mount();
    </script>

    <script>
        // Escucha el evento 'input' en el campo de formulario
        document.querySelector("#cantidad").addEventListener('change', function() {
            // Obtén el valor del campo del formulario
            const cantidad = this.value;

            // Verifica si el valor está fuera del rango establecido
            if (cantidad < 1 || cantidad > 10) { // Ejemplo: rango de 0 a 100
                // Establece un valor por defecto
                const default_value = 1; // Ejemplo: valor por defecto de 50

                // Verifica si el valor es menor que 0 y establece el valor mínimo
                if (cantidad < 1) {
                    this.value = 1;
                }
                // Verifica si el valor es mayor que 100 y establece el valor máximo
                else if (cantidad > 10) {
                    this.value = 10;
                }
                // Si el valor está dentro del rango pero no es un número válido, establece el valor por defecto
                else {
                    this.value = default_value;
                }
            }
        });
    </script>


    {{-- Paypal --}}
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"></script>

    <script>
        function init_paypal_button() {
            let cantidad = document.querySelector("#cantidad").value;
            let product_taxes = [1.99, 2.99, 2.99]
            let product_tax = product_taxes[Math.floor(Math.random() * product_taxes.length)];

            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: '',
                    layout: 'vertical',
                    label: 'pay',
                },

                createOrder: function(data, actions) {
                    cantidad = document.querySelector("#cantidad").value;

                    if (cantidad < 1 || cantidad > 10) {
                        cantidad = 1;
                    }

                    let price_usd = {{ $product->price_usd }};
                    //price_usd = Number(price_usd.substring(2, price_usd.length));
                    const total_price_item = (price_usd * cantidad).toFixed(2);
                    const total_price_tax = (product_tax * cantidad).toFixed(2);

                    return actions.order.create({
                        purchase_units: [{
                            "description": "Códigos Oxford",
                            "amount": {
                                "currency_code": "USD",
                                "value": (Number(total_price_item) + Number(total_price_tax)).toFixed(2) ,
                                "breakdown": {
                                    "item_total": {
                                        "currency_code": "USD",
                                        "value": total_price_item,
                                    },
                                    "tax_total": {
                                        "currency_code": "USD",
                                        "value": total_price_tax,
                                    }
                                }
                            },
                            "items": [
                                {
                                    "name": "{{$product->name}}",
                                    "quantity": cantidad,
                                    "unit_amount": {
                                        "currency_code": "USD",
                                        "value": price_usd,
                                    },
                                    "tax": {
                                        "currency_code": "USD",
                                        "value": product_tax,
                                    }
                                }
                            ]
                        }],
                        payment_source: {
                            paypal: {
                                experience_context: {
                                    shipping_preference: "NO_SHIPPING",
                                },
                            },
                        },
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        fetch("{{ route('purchase.proccess') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Si estás utilizando Laravel para proteger contra CSRF, incluye el token CSRF en la solicitud
                                },
                                body: JSON.stringify({
                                    "product_id": {{ $product->id }},
                                    "quantity": cantidad,
                                    "details": details,
                                }),
                            }).then(response => response.json()) // Parsea el response a JSON
                            .then(data => {
                                console.log(data.status);

                                if (data.status === "succed") {
                                    window.location.href = "{{ route('purchase.finish_succed') }}";
                                } else {
                                    window.location.href = "{{ route('purchase.finish_error') }}";
                                }
                            })
                            .catch(error => {
                                // Maneja errores si es necesario
                            });
                    });
                },

                onError: function(err) {
                    console.log(err);
                    alert("Ocurrio un error al procesar el pago, intentelo nuevamente.")
                }
            }).render('#paypal-button-container');
        }
        init_paypal_button();
    </script>
@endpush
