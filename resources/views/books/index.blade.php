@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de livros</h3>
            {!! Button::primary('Novo Livro')->asLinkTo(route('books.create')) !!}
        </div>
        <br/>
        <div class="row">
            {!! Form::model(compact('books'), ['class' => 'form-inline', 'method' => 'GET']) !!}
                {!! Html::openFormGroup() !!}
                    {!! Form::label('title', 'Pesquisar por título:', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup() !!}
                    {!! Form::label('subtitle', 'Pesquisar por subtítulo:', ['class' => 'control-label']) !!}
                    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
                {!! Html::closeFormGroup() !!}

                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Buscar')->submit() !!}
                {!! Html::closeFormGroup() !!}
            {!! Form::close() !!}
        </div>
        <div class="row">
            {!!
                Table::withContents($books->items())->striped()
                ->callback('Ações', function($field, $book){
                    $linkEdit = route('books.edit', ['book' => $book->id]);
                    $linkDestroy = route('books.destroy', ['book' => $book->id]);
                    $deleteForm = "delete-form-{$book->id}";
                    $form = Form::open(['route' =>
                                ['books.destroy', 'book' => $book->id],
                                'method' => 'DELETE', 'id' => $deleteForm,'style' => 'display:none;']).
                                Form::close();
                    $anchorDestroy = Button::link('Excluir')
                                            ->asLinkTo($linkDestroy)->addAttributes([
                                                'onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                                            ]);
                    return "<ul class=\"list-inline\">".
                                "<li>".Button::link('Editar')->asLinkTo($linkEdit)."</li>".
                                "<li>|</li>".
                                "<li>".$anchorDestroy."</li>".
                           "</ul>".
                           $form;
                })
            !!}

            {{ $books->links() }}
        </div>
    </div>
@endsection