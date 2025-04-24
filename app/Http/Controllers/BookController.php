<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index (){

        $books = Book::all();// trae todos los datos atraves del modelo book

        return view('books.index',['books' => $books]);// Retorna la vista a books
    }
}
