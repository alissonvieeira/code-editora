@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar categoria</h3>

            {!! Form::open(['route'=> ['categories.update', $category->id], 'method' => 'PUT', 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nome') !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Salvar categoria', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection