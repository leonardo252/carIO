@extends('layouts.app')

@section('content')


    {!! Form::open(['action' => 'PostController@update']) !!}
        {{Form::label('CLIENTE')}}

            {{Form::label('CLIENTE')}}
            <div class="form-group">
                    {{Form::label('nome', 'Nome Cliente')}}
                    {{Form::text('nome',$client[0]->nome ? $client[0]->nome :  '', ['class' => 'form-control', 'placeholder' => 'Nome'])}}
            </div>

            <div class="form-group">
                    {{Form::label('cpf', 'CPF Cliente')}}
                    {{Form::text('cpf', $client[0]->cpf ? $client[0]->cpf : '', ['class' => 'form-control', 'placeholder' => 'CPF'])}}
            </div>         

            <div class="form-group">
                    {{Form::label('cell', 'Telefone')}}
                    {{Form::text('cell', $client[0]->telefone ? $client[0]->telefone : '', ['class' => 'form-control', 'placeholder' => 'Telefone'])}}
            </div>

            <div class="form-group">
                    {{Form::label('addr', 'Endereço')}}
                    {{Form::text('addr', $client[0]->endereco ? $client[0]->endereco : '', ['class' => 'form-control', 'placeholder' => 'Endereço'])}}
            </div>
                

        {{Form::submit('Salvar', ['class' => 'btn btn-primary', 'name' => 'submitbutton', 'value' => 'save'])}}

    {!! Form::close() !!}
        <h2> </h2>
        @if($carros)
                @if(count($carros)> 0)
                        @foreach($carros as $carro)   
                            <div class="well">
                                <h3><a href="/editcar/{{$carro->idcarro}}">{{$carro->placa}}</a></h3>
                                <h5>data de entrada: {{$carro->data_entrada}}</h5>
                                {!! Form::open(['action' => 'PostController@destroycar']) !!}
                                    {!! Form::hidden('idcarro', $carro->idcarro) !!}
                                    {{Form::submit('Excluir', array('class' => 'btn btn-danger'))}}
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                @else
                        <p>Não possui carros</p>
                @endif
        @else
                <p>Não possui carros</p>
        @endif

    
@endsection