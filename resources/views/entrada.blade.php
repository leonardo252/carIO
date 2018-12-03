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

    {!! Form::open(['action' => 'PostController@insertClient']) !!}
        <h2>CLIENTE</h2>
                <div class="form-group">
                        {{Form::label('nome', 'Nome Cliente')}}
                        {{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome'])}}
                </div>

                <div class="form-group">
                        {{Form::label('cpf', 'CPF Cliente')}}
                        {{Form::text('cpf', '', ['class' => 'form-control', 'placeholder' => 'CPF'])}}
                </div>         

                <div class="form-group">
                        {{Form::label('cell', 'Telefone')}}
                        {{Form::text('cell', '', ['class' => 'form-control', 'placeholder' => 'Telefone'])}}
                </div>

                <div class="form-group">
                        {{Form::label('addr', 'Endereço')}}
                        {{Form::text('addr', '', ['class' => 'form-control', 'placeholder' => 'Endereço'])}}
                </div>
                <h2>CARRO</h2>

                <div class="form-group">
                        {{Form::label('placa', 'Placa do veículo')}}
                        {{Form::text('placa', '', ['class' => 'form-control', 'placeholder' => 'Placa'])}}
                </div>         

                <div class="form-group">
                        {{Form::label('modelo', 'Modelo do veículo')}}
                        {{Form::text('modelo', '', ['class' => 'form-control', 'placeholder' => 'Modelo'])}}
                </div>

                <div class="form-group">
                        {{Form::label('marca', 'Marca do veículo :')}}
                        {{Form::select('marca', $marca_lista)}}
                </div>

                <div class="form-group">
                        {{Form::label('ano', 'Ano do veículo')}}
                        {{Form::text('ano', '', ['class' => 'form-control', 'placeholder' => 'Ano'])}}
                </div>

                <div class="form-group">
                        {{Form::label('data_in', 'Data de entrada :')}}
                        {{Form::date('data_in', \Carbon\Carbon::now())}}
                </div>

                <div class="form-group">
                        {{Form::label('data_out', 'Data previsão de saida :')}}
                        {{Form::date('data_out', \Carbon\Carbon::now())}}
                </div>

                <div class="form-group">
                        {{Form::label('situacao', 'Situação atual do veículo :')}}
                        {{Form::select('situacao', [ 1 => 'Avaliação', 2 => 'Execução', 3 => 'Pronto'
                        , 4 => 'Entregue'])}}
                </div>

                <div class="form-group">
                        {{Form::label('garagem', 'Garagem onde está o veículo :')}}
                        {{Form::select('garagem', $garagem_lista)}}
                </div>


                        

        {{Form::submit('Salvar', ['class' => 'btn btn-primary', 'name' => 'submitbutton', 'value' => 'save'])}}

    {!! Form::close() !!}

    
@endsection