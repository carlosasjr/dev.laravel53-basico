@extends('painel.templates.template')

@section('content')

    <h1 class="title-pg">
        <a href="{{route('produtos.index')}}">
            <span class="glyphicon glyphicon-refresh"></span>
        </a>
        Listagem dos produtos
    </h1>

    <a href="{{route('produtos.create')}}" class="btn btn-primary btn-add">
        <span class="glyphicon glyphicon-plus"></span> Cadastrar
    </a>

    {!! Form::open([ 'class' => 'form form-inline form-search']) !!}
    {!! Form::text('search', null, ['placeholder' => 'Pesquisar?', 'class' => 'form-control', 'id' => 'search']) !!}
    {!! Form::submit('Filtrar', ['class' => 'btn btn-success', 'id' => 'btnSearchProduct']) !!}
    {!! Form::close() !!}

    <section id="tabela">
        @include('painel.includes.table-products', compact('products'))
    </section>


    @push('scripts')
        <script src="{{ url('js/painel/productsJS.js') }}"></script>
    @endpush

@endsection