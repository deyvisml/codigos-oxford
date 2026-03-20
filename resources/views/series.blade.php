@extends('layouts.app')

@section('title')
    {{ $current_serie->name }}
@endsection

@push('headers')
    <meta property="og:title" content="{{ $current_serie->name }} - Códigos Oxford" />
@endpush

@push('css-scripts')
@endpush

@section('content')
    <div class="mx-auto px-2 max-w-7xl">
        <div class="mx-5 my-8 mb-20">
    
            <div class="pb-5 border-b-2">
                <h3 class="mb-5 font-semibold text-2xl">Seleccione una serie o titulo</h3>
    
                <div class="mb-3 w-full md:w-1/2">
                    <select data-te-select-init id="select_series" name="miselect" size="10">
                        @foreach ($series as $serie)
                            <option class="{{ $current_serie->id }}"
                                value="{{ route('series.show', ['category' => $current_category, 'serie' => $serie]) }}"
                                {{ $serie->id === $current_serie->id ? 'selected' : '' }}>
                                {{ $serie->name }}
                            </option>
                        @endforeach
                    </select>
                    <label data-te-select-label-ref>Serie</label>
                </div>
            </div>
    
            <div class="flex flex-wrap">
                <h3 class="block my-4 w-full font-semibold text-xl">Niveles</h3>
    
                <div class="mb-4 border w-full md:w-1/4">
                    <ul id="levels_container">
                        @foreach ($levels as $level)
                            <li class="level">
                                <button onclick="handleLevelClick(this, '{{ $level->id }}')" class=" block p-3 border-b-2 w-full text-left cursor-pointer
                                        {{ $level_selected && $level_selected->id == $level->id 
                                            ? 'bg-blue-200 selected' 
                                            : 'bg-gray-50 hover:bg-gray-200' }}">
                                    {{ $level->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
    
                <div class="self-baseline bg-gray-200 px-2 py-4 w-full md:w-3/4 md:min-h-[390px]">
                    @foreach ($products_levels as $products_level)
                        <ul id="products_level_{{ $products_level['level']->id }}" class="flex flex-wrap justify-start gap-y-4 border-2 w-full products_level {{ $level_selected && $level_selected->id == $products_level['level']->id ? 'flex' : 'hidden' }}">
                            @if (count($products_level['products']) > 0)
                                @foreach ($products_level['products'] as $product)
                                    <li class="w-full sm:w-1/2 md:w-1/4 min-w-[200px]">
                                        <div
                                            class="bg-white shadow hover:shadow-xl mx-0 sm:mx-2 border-2 border-gray-200 rounded-xl">
                                            <a href="{{ route('products.index', ['product' => $product]) }}" title="{{$product->name}}"
                                                class="block p-3 cursor-pointer">
                                                <div class="flex flex-col justify-center items-center text-center">
                                                    <div class="flex justify-center items-center w-full h-44">
                                                        <img src="{{ asset('images/products/' . basename($product->oup_image_url)) }}"
                                                            alt="imagen producto" title="{{$product->name}}" class="max-w-[140px] h-full object-contain">
                                                    </div>

                                                    <div class="w-full text-start">
                                                        <p
                                                            class="pt-5 h-24 font-semibold text-sky-900 text-sm hover:underline cursor-pointer">
                                                            {{ $product->name }}
                                                        </p>
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
                            @else
                                <p class="mx-0 sm:mx-2">Sin productos</p>
                            @endif
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-scripts')
    <script>
        const select_series_element = document.querySelector("#select_series");

        select_series_element.addEventListener("change", function() {
            const url = this.value;

            console.log(this);

            window.location.href = url;
        });

        function handleLevelClick(button_element, level_id) {
            // Deseleccionar nivel anterior
            const level_to_deseleced = document.querySelector(`.level button.selected`);
            level_to_deseleced?.classList.remove("bg-blue-200", "selected");
            level_to_deseleced?.classList.add("bg-gray-50", "hover:bg-gray-200");

            // Seleccionar nuevo nivel
            button_element.classList.remove("bg-gray-50", "hover:bg-gray-200");
            button_element.classList.add("bg-blue-200", "selected");

            // Ocultar productos del nivel anterior
            const products_level_to_hidden = document.querySelector(`.products_level:not(.hidden)`);
            products_level_to_hidden?.classList.add("hidden");
            products_level_to_hidden?.classList.remove("flex");

            // Mostrar productos del nivel seleccionado
            const products_level_to_show = document.querySelector(`#products_level_${level_id}`);
            products_level_to_show?.classList.remove("hidden");
            products_level_to_show?.classList.add("flex");

            // === Actualizar query param en la URL ===
            const url = new URL(window.location);
            url.searchParams.set('level', level_id); // agregar o actualizar ?level=
            window.history.replaceState({}, '', url); // no recarga la página
        }
    </script>
@endpush
