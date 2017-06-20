<?php

namespace CodePub\Http\Controllers;

use CodePub\Models\Book;
use CodePub\Http\Requests\BooksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::query()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        $data = $request->all();
        $data['author_id'] = Auth::getUser()->id;

        Book::create($data);
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro cadastrado com sucesso.');

        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, Book $book)
    {
        $data = $request->all();
        $data['author_id'] = Auth::getUser()->id;

        $book->fill($data);
        $book->save();
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro alterado com sucesso.');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        \Session::flash('message', 'Livro excluído com sucesso.');
        return redirect()->to(\URL::previous());
    }
}
