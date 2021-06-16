@extends('admin.layouts.app')

@section('title', 'Cadastrar novo produto')

@section('content')

    <h1>Cadastrar Novo Produto</h1>

    @include('admin.includes.alerts')

    <form action=" {{ route('products.store') }} " method="post" enctype="multipart/form-data">
        @csrf
        {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
        @include('admin.pages.products._partials.form')
    </form>

@endsection
