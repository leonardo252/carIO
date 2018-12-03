@extends('layouts.app')

@section('content'),
    <h1>Clientes</h1>
    {!! Form::open(['action' => 'PostController@selectClient']) !!}
    <h3>Pesquisa</h3>
        <div class="form-group">
                {{Form::label('nome', 'Nome :')}}
                {{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome'])}}            
        </div> 
        
        <div class="form-group">
                {{Form::label('cpf', 'CPF :')}}
                {{Form::text('cpf', '', ['class' => 'form-control', 'placeholder' => 'cpf'])}}            
        </div>  

        {{Form::submit('Pesquisar', ['class' => 'btn btn-primary', 'name' => 'submitbutton', 'value' => 'save'])}}

    {!! Form::close() !!}
    <h2> </h2>

    
    @if($clientes)
        @if(count($clientes)> 0)
            @foreach($clientes as $cliente)
                <div class="well">
                    <h3><a href="edit/{{$cliente->idcliente}}">{{$cliente->nome}}</a></h3>
                    
                    {!! Form::open(['action' => 'PostController@destroy']) !!}
                        {!! Form::hidden('idcliente', $cliente->idcliente) !!}
                        {{Form::submit('Excluir', array('class' => 'btn btn-danger'))}}
                    {!! Form::close() !!}
                    
                </div>
            @endforeach

        @else
            <p>Não possui clientes</p>
        @endif
    @else
        <p>Não possui clientes</p>
    @endif


@endsection