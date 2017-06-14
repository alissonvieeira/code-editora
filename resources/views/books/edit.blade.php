@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar livro</h3>

            {!! Form::open(['route' => ['books.update', $book->id], 'method' => 'PUT', 'class' => 'form']) !!}

                {!! Html::openFormGroup('title', $errors) !!}
                    {!! Form::label('title', 'Título') !!}
                    {!! Form::text('title', $book->title, ['class' => 'form-control']) !!}
                    {!! Form::error('title', $errors) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup('subtitle', $errors) !!}
                    {!! Form::label('subtitle', 'Subtítulo') !!}
                    {!! Form::text('subtitle', $book->subtitle, ['class' => 'form-control']) !!}
                    {!! Form::error('subtitle', $errors) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup('price', $errors) !!}
                    {!! Form::label('price', 'Preço') !!}
                    {!! Form::text('price', $book->price, ['class' => 'form-control']) !!}
                    {!! Form::error('price', $errors) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup() !!}
                    {!! Form::submit('Editar Livro', ['class' => 'btn btn-primary']) !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection