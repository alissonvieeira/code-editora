{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('title', $errors) !!}
    {!! Form::label('title', 'Título', ['class' => 'control-label']) !!}
    {!! Form::text('title', (isset($book->title)) ? $book->title : null, ['class' => 'form-control']) !!}
    {!! Form::error('title', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('subtitle', $errors) !!}
    {!! Form::label('subtitle', 'Subtítulo', ['class' => 'control-label']) !!}
    {!! Form::text('subtitle', (isset($book->subtitle)) ? $book->subtitle : null, ['class' => 'form-control']) !!}
    {!! Form::error('subtitle', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('price', $errors) !!}
    {!! Form::label('price', 'Preço', ['class' => 'control-label']) !!}
    {!! Form::text('price', (isset($book->price)) ? $book->price : null, ['class' => 'form-control']) !!}
    {!! Form::error('price', $errors) !!}
{!! Html::closeFormGroup() !!}