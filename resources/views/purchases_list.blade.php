@extends('layouts.app')

@section('title')
    Mis compras
@endsection

@section('content')
    <div class="bg-neutral-100 pb-10">
        <div class="mx-auto px-4 max-w-7xl">
            <div class="mb-20 py-8">

                <h2 class="pb-3 border-b-2 font-semibold text-2xl">
                    Compras
                </h2>

                @if (count($orders) > 0)
                    <p class="bg-blue-100 mt-5 p-2 border border-neutral-300 rounded text-blue-800">
                        <span class="font-semibold">Nota 1:</span> Si el estado del pedido ya marca como "ENTREGADO", verifica tu bandeja de entrada y la carpeta de <b>SPAM</b>, en otro caso espere a que el pedido sea procesado por el administrador.
                    </p>

                    <p class="bg-blue-100 mt-5 p-2 border border-neutral-300 rounded text-blue-800">
                        <span class="font-semibold">Nota 2:</span> Si eres de Perú recuerda que puedes realizar tus proximas compras por Whatsapp al <a href="https://wa.me/51938544411" target="_blank" class="text-sky-800 underline">+51 938 544 411</a>
                    </p>
                @endif
    
                <ul class="mt-5">
                    @if (count($orders) > 0)
                        @foreach ($orders as $order)
                            <li class="bg-white shadow mb-4 border rounded">
                                <div class="p-3 py-4 border-b-2 font-bold text-xs">
                                    {{ \Carbon\Carbon::parse($order['data']->created_at)->format('j \d\e F \d\e Y') }}
    
                                </div>
                                <div class="flex flex-wrap sm:flex-nowrap p-3 py-4 w-full">
                                    <div
                                        class="flex justify-center items-center self-center me-4 mb-2 sm:mb-0 p-2 border w-full sm:w-28 h-28">
                                        <img src="{{ $order['product']->oup_image_url }}" alt="imagen producto" title="{{$order['product']->name}}"
                                            class="max-w-[70px] h-full object-contain">
                                    </div>
                                    <div class="w-full md:w-3/4 text-sm">
                                        <p class="pb-1 text-neutral-600">#{{ $order['data']->id }}</p>
                                        <p class="flex items-end gap-x-2 pb-1">Estado:
                                            @if ($order['data']->payment_issue)
                                                <span class="bg-red-600 p-0.5 px-1 rounded font-semibold text-white text-xs">
                                                    Pago rechazado
                                                </span>
                                            @elseif ($order['data']->email_sent)
                                                <span class="bg-green-600 p-0.5 px-1 rounded font-semibold text-white text-xs">
                                                    Entregado
                                                </span>
                                            @else
                                                <span class="bg-blue-600 p-0.5 px-1 rounded font-semibold text-white text-xs">
                                                    Pendiente
                                                </span>
                                            @endif
                                        </p>
                                        <ul class="flex flex-wrap sm:flex-nowrap justify-between items-start">
                                            <li class="mb-2 w-full sm:w-3/5">
                                                <p class="py-1 font-bold">Elemento</p>
                                                <a href="{{ route('products.index', ['product' => $order['product']]) }}" title="{{$order['product']->name}}"
                                                    class="text-sky-800 underline cursor-pointer">
                                                    {{ $order['product']->name }}
                                                </a>
                                            </li>
                                            <li class="mb-2 w-full sm:w-1/5 text-left sm:text-right">
                                                <p class="py-1 font-bold">Cantidad</p>
                                                <p>{{ $order['data']->quantity }}</p>
                                            </li>
                                            <li class="mb-2 w-full sm:w-1/5 text-left sm:text-right">
                                                <p class="py-1 font-bold">Total</p>
                                                <p>{{ $order['data']->user_paid }} usd</p>
                                            </li>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <p class="text-center">Lista de compras vacia.</p>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
