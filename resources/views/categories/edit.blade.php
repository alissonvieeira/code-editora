@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar categoria</h3>

            {!! Form::open(['route'=> ['categories.update', $category->id], 'method' => 'PUT', 'class' => 'form']) !!}

                {!! Html::openFormGroup('name', $errors) !!}
                    {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
                    {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
                    {!! Form::error('name', $errors) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup() !!}
                    {!! Form::submit('Salvar categoria', ['class' => 'btn btn-primary']) !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection