@extends('layouts.app')

@section('title')
    {{ $current_school->name }}
@endsection

@push('headers')
    <meta property="og:title" content="{{ $current_school->name }} - Códigos Oxford" />
@endpush

@section('content')
    <div class="mx-auto px-2 max-w-7xl">
        <div class="mx-5 my-8 mb-20">
            <div class="pb-5 border-b-2">
                <h3 class="mb-5 font-semibold text-2xl">Seleccione su escuela</h3>
    
                <div class="mb-3 w-full md:w-1/2">
    
                    <select data-te-select-init id="select_schools" name="miselect" size="10">
                        @foreach ($schools as $school)
                            <option class="{{ $current_school->id }}"
                                value="{{ route('schools.show', ['country' => $current_country, 'school' => $school]) }}"
                                {{ $school->id === $current_school->id ? 'selected' : '' }}>
                                {{ $school->name }}
                            </option>
                        @endforeach
                    </select>
                    <label data-te-select-label-ref>Institución</label>
    
                </div>
            </div>
    
            <div class="flex flex-wrap">
                <h3 class="block my-4 w-full font-semibold text-xl">Niveles</h3>
    
                <div class="mb-4 border w-full md:w-1/4">
                    <ul id="school_list_ul">
                        @foreach ($school_levels as $school_level)
                            <li class="level">
                                <button onclick="handleLevelClick(this, '{{ $school_level->id }}')" class=" block p-3 border-b-2 w-full text-left cursor-pointer
                                        {{ $school_level_selected && $school_level_selected->id == $school_level->id 
                                            ? 'bg-blue-200 selected' 
                                            : 'bg-gray-50 hover:bg-gray-200' }}">
                                    {{ $school_level->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
    
                <div class="self-baseline bg-gray-200 px-2 py-4 w-full md:w-3/4 md:min-h-[390px]">
                    @foreach ($products_school_levels as $products_school_level)
                        <ul id="products_level_{{ $products_school_level['school_level']->id }}"
                            class="flex flex-wrap justify-start gap-y-4 border-2 w-full products_level {{ $school_level_selected && $school_level_selected->id == $products_school_level['school_level']->id ? 'flex' : 'hidden' }}">
                            @if (count($products_school_level['products']) > 0)
                                @foreach ($products_school_level['products'] as $product)
                                    <li class="w-full sm:w-1/2 md:w-1/4 min-w-[200px]">
                                        <div
                                            class="bg-white shadow hover:shadow-xl mx-0 sm:mx-2 border-2 border-gray-200 rounded-xl">
                                            <a href="{{ route('products.index', ['product' => $product]) }}"
                                                class="block p-3 cursor-pointer">
                                                <div class="flex flex-col justify-center items-center text-center">
                                                    <div class="flex justify-center items-center w-full h-44">
                                                        <img src="{{ asset('images/products/' . basename($product->oup_image_url)) }}"
                                                            alt="imagen item" class="max-w-[140px] h-full object-contain">
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
                                                            {{ number_format($product->price_usd, 2)  }} USD
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
        const select_schools_element = document.querySelector("#select_schools");

        select_schools_element.addEventListener("change", function() {
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
