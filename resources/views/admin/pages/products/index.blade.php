@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos (index)</h1>


    @if (isset($products))
        @foreach ($products as $product)
            <p class="@if ($loop->last) last @endif"> {{ $product }} </p>
        @endforeach 
    @endif

    <hr>

    {{-- já verifica se existe products --}}
    @forelse ($products as $product)
        <p class="@if ($loop->first) last @endif"> {{ $product }}</p>
    @empty
        Não existem produtos cadastrados
    @endforelse


    <hr>

    @if ($teste === '123')
        É igual
    @elseif ($teste == 123)
        É igual a 123
    @else
        É diferente
    @endif


    {{-- unless é ao contrário do if, entra só se for false --}}
    @unless($teste === '123')
        asfsf
    @else
        asfasf
    @endunless


    {{-- verifica se variavel existe = NÃO DÁ ERRO CASO NÃO EXISTA --}}
    @isset($teste2)
        <p>Existe variável teste2: {{ $teste2 }}</p>
    @else
    @endisset


    {{-- verifica se está vazio --}}
    @empty($teste3)
        <p>Vazio...</p>
    @else
    @endempty


    {{-- verifica se está autenticado --}}
    @auth
        <p>Autenticado...</p>
    @else
        <p>Não autenticado...</p>
    @endauth


    {{-- só entra se não estiver autenticado --}}
    @guest
        <p>Guest - Não autenticado...</p>
    @else
    @endguest


    {{-- switch normal --}}
    @switch($teste)
        @case(1)
            Igual a 1
            @break
        @case(2)
            Igual a 2
            @break
        @case(3)
            Igual a 3
            @break
        @case(123)
            Igual a 123
            @break
        @default
            Default
    @endswitch

@endsection

<style>
    .last {background: #CCC};
</style>
