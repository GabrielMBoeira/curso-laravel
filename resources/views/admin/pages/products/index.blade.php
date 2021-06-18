@extends('admin.layouts.app')

@section('title', 'Gestão de produtos')

@section('content')
    <h1>Exibindo os produtos (index)</h1>
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Cadastrar</a>
    <hr>

    <form action=" {{ route('product.search') }} " method="post" class="form form-inline mt-5 mb-5">
        @csrf
        <input type="text" name="filter" placeholder="filtrar" class="form-control" value=" {{ $filters['filter'] ?? '' }}">
        <button class="btn btn-info">Pesquisar</button>
    </form>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th width="100">Ação</th>
                <th width="100">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href=" {{ route('products.show', $product->id) }} ">Detalhes</a>
                    </td>
                    <td>
                        <a href=" {{ route('products.edit', $product->id) }} ">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">

        @if (isset($filters))
            {{ $products->appends($filters)->links() }}
        @else
            {{ $products->links() }}
        @endif

    </div>


@endsection
