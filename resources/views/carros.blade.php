@extends('layouts.app')

@section('content')
    <div id="divCheckbox" style="display: none;">
            @foreach($garagens as $garagem)
                    {{$garagem_lista[ $garagem->idgaragem] = $garagem->nome_garagem}}
            @endforeach
    </div>
    <h1>Carros</h3>
    {!! Form::open(['action' => 'PostController@selectcar']) !!}
    <h3>Pesquisa</h3>
        <div class="form-group">
                {{Form::label('placa', 'Placa :')}}
                {{Form::text('placa', '', ['class' => 'form-control', 'placeholder' => 'Placa'])}}            
        </div> 
        
        <div class="form-group">
                {{Form::label('data_in', 'Data de entrada :')}}
                {{Form::date('data_in', \Carbon\Carbon::now())}}
        </div> 

        <div class="form-group">
                {{Form::label('garagem', 'Garagem onde está o veículo :')}}
                {{Form::select('garagem', $garagem_lista)}}
        </div>

        <div class="form-group">
                {{Form::label('situacao', 'Situação atual do veículo :')}}
                {{Form::select('situacao', [ 1 => 'Avaliação', 2 => 'Execução', 3 => 'Pronto'
                , 4 => 'Entregue'])}}
        </div>

        {{Form::submit('Pesquisar por placa', ['class' => 'btn btn-primary', 'name' => 'submitbutton'])}}
        {{Form::submit('Pesquisar por data', ['class' => 'btn btn-primary', 'name' => 'submitbutton'])}}
        {{Form::submit('Pesquisar por Garagem', ['class' => 'btn btn-primary', 'name' => 'submitbutton'])}}
        {{Form::submit('Pesquisar por Situação', ['class' => 'btn btn-primary', 'name' => 'submitbutton'])}}

    {!! Form::close() !!}
    <h2> </h2>
    
        @if($carros)
            @if(count($carros)> 0)
                @foreach($carros as $carro)
                    @foreach($clientes as $cliente)
                        @if($carro->cliente_idcliente == $cliente->idcliente)    
                            <div class="well">
                                <h3><a href="editcar/{{$carro->idcarro}}">{{$carro->placa}}</a><h5>Cliente: {{$cliente->nome}}</h5></h3>
                                <h5>data de entrada: {{$carro->data_entrada}}</h5>
                                {!! Form::open(['action' => 'PostController@destroycar']) !!}
                                    {!! Form::hidden('idcarro', $carro->idcarro) !!}
                                    {{Form::submit('Excluir', array('class' => 'btn btn-danger'))}}
                                {!! Form::close() !!}
                            
                            </div>
                        @endif
                    @endforeach
                @endforeach

            @else
                <p>Não possui carros</p>
            @endif
        @else
            <p>Não possui carros</p>
        @endif

@endsection