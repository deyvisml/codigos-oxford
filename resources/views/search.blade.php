@extends('layouts.app')

@section('title')
    Resultados
@endsection

@section('content')
    <div class="mx-auto px-4 max-w-7xl">
        <div class="my-8 mb-20">
            <div class="mb-5 border-b-2">
                <p class="text-2xl">Busqueda: <span class="font-semibold">{{ $keyword }}</span></p>
                <p class="py-2">{{ $products->total() }} resultados</p>
            </div>

            <div class="">
                <ul class="flex flex-wrap justify-start items-baseline gap-y-4 bg-gray-200 mb-3 px-2 py-4">

                    @if ($products->total() > 0)
                        @foreach ($products as $product)
                            <li class="w-full sm:w-1/2 md:w-1/5 min-w-[200px]">
                                <div class="bg-white shadow hover:shadow-xl mx-0 sm:mx-2 border-2 border-gray-200 rounded-xl">
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
                    @endif
                </ul>

                {{ $products->appends($_GET)->render() }}
                <!-- https://stackoverflow.com/a/50957867/15694873-->
            </div>

        </div>
    </div>
@endsection
