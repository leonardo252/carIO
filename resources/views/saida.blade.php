@extends('layouts.app')

@section('content')
    <h2>Para sair</h2>
    @if($carros)
        @if(count($carros)> 0)
            @foreach($carros as $carro)
                @foreach($clientes as $cliente)
                    @if($carro->cliente_idcliente == $cliente->idcliente)    
                        <div class="well">
                            <h3><a href="editcar/{{$carro->idcarro}}">{{$carro->placa}}</a><h5>Cliente: {{$cliente->nome}}</h5></h3>
                            <h5>data de saida: {{$carro->data_saida}}</h5>
                            {!! Form::open(['action' => 'PostController@updSituacao']) !!}
                                <div class="form-group">
                                        {{Form::label('situacao', 'Situação atual do veículo :')}}
                                        {{Form::select('situacao', [ 1 => 'Avaliação', 2 => 'Execução', 3 => 'Pronto'
                                        , 4 => 'Entregue'], $carro->situacao_idsituacao)}}
                                </div>
                                {!! Form::hidden('idcarro', $carro->idcarro) !!}
                                {{Form::submit('Atualizar Situação', array('class' => 'btn btn-primary'))}}
                            {!! Form::close() !!}

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