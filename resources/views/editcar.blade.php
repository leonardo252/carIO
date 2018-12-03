@extends('layouts.app')

@section('content')

    <div id="divCheckbox" style="display: none;">
            @foreach($marcas as $marca)
                    {{$marca_lista[ $marca->idmarca] = $marca->marca}}
            @endforeach

            @foreach($garagens as $garagem)
                    {{$garagem_lista[ $garagem->idgaragem] = $garagem->nome_garagem}}
            @endforeach
    </div>

    {!! Form::open(['action' => 'PostController@updatecar']) !!}
        {{Form::label('Carro')}}
            <div class="form-group">
                    {{Form::label('placa', 'Placa do veículo')}}
                    {{Form::text('placa', $car[0]->placa ? $car[0]->placa :  '', ['class' => 'form-control', 'placeholder' => 'Placa'])}}
                    {{ Form::hidden('idcarro', $car[0]->idcarro) }}
            </div>         

            <div class="form-group">
                    {{Form::label('modelo', 'Modelo do veículo')}}
                    {{Form::text('modelo', $car[0]->modelo ? $car[0]->modelo :  '', ['class' => 'form-control', 'placeholder' => 'Modelo'])}}
            </div>

            <div class="form-group">
                    {{Form::label('marca', 'Marca do veículo :')}}
                    {{Form::select('marca',$marca_lista, $car[0]->marca_idmarca)}}
            </div>

            <div class="form-group">
                    {{Form::label('ano', 'Ano do veículo')}}
                    {{Form::text('ano', $car[0]->ano ? $car[0]->ano :  '', ['class' => 'form-control', 'placeholder' => 'Ano'])}}
            </div>

            <div class="form-group">
                    {{Form::label('data_in', 'Data de entrada :')}}
                    {{Form::date('data_in', $car[0]->data_entrada)}}
            </div>

            <div class="form-group">
                    {{Form::label('data_out', 'Data previsão de saida :')}}
                    {{Form::date('data_out', $car[0]->data_saida)}}
            </div>

            <div class="form-group">
                    {{Form::label('situacao', 'Situação atual do veículo :')}}
                    {{Form::select('situacao', [ 1 => 'Avaliação', 2 => 'Execução', 3 => 'Pronto'
                    , 4 => 'Entregue'], $car[0]->situacao_idsituacao)}}
            </div>

            <div class="form-group">
                    {{Form::label('garagem', 'Garagem onde está o veículo :')}}
                    {{Form::select('garagem', $garagem_lista, $car[0]->garagem_idgaragem)}}
            </div>

            {{Form::submit('Salvar', ['class' => 'btn btn-primary', 'name' => 'submitbutton', 'value' => 'save'])}}

        {!! Form::close() !!}
        <h2> </h2>
        <div class="well">
            <h3><a href="/edit/{{$cliente[0]->idcliente}}">{{$cliente[0]->nome}}</a></h3>
        </div>
        
@endsection