@extends('admin.layouts.app')

@section('title', 'Cadastrar novo produto')

@section('content')

    <h1>Cadastrar Novo Produto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif

    <form action=" {{ route('products.store') }} " method="post" enctype="multipart/form-data">
        @csrf
        {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="description" placeholder="Descrição">
        <input type="file" name="photo">
        <button>Enviar</button>
    </form>

@endsection
