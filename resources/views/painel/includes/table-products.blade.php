<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th width="100px">Ações</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->category}}</td>
            <td>
                <a href="{{route('produtos.edit', $product->id)}}" class="actions edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="{{route('produtos.show', $product->id)}}" class="actions delete">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>

@if( isset($dataForm) )
    {!! $products->appends($dataForm)->links() !!}
@else
    {!! $products->links() !!}
@endif

