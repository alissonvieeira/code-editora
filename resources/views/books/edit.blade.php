@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar livro</h3>

            {!! Form::open(['route' => ['books.update', $book->id], 'method' => 'PUT', 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Título') !!}
                {!! Form::text('title', $book->title, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('subtitle', 'Subtítulo') !!}
                {!! Form::text('subtitle', $book->subtitle, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Preço') !!}
                {!! Form::text('price', $book->price, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Editar Livro', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection