@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar categoria</h3>

            {!! Form::open(['route'=> ['categories.update', $category->id], 'method' => 'PUT', 'class' => 'form']) !!}

                @include('categories._form')

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Salvar Categoria')->submit() !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection