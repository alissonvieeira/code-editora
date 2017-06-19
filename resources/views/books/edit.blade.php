@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar livro</h3>

            {!! Form::open(['route' => ['books.update', $book->id], 'method' => 'PUT', 'class' => 'form']) !!}

                @include('books._form')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Salvar Livro')->submit() !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection