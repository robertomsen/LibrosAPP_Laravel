<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

/* Controlador para la API */



class apiController extends Controller
{

    // Recoger todos los libros de la DB
    public function getAllBooks() {
        
        $allBooks = Libro::all();

        return $allBooks;
    }

    // Recoger datos de un libro por su ID
    public function getBookById($id) {

        $book = Libro::findOrFail($id);

        return $book;
    }



    // Insertar un libro a la DB
    public function insertBook(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'isbn' => 'required'
        ]);

        $insertBook = new Libro;

        $insertBook->title = $request->title;
        $insertBook->description = $request->description;
        $insertBook->genre = $request->genre;
        $insertBook->isbn = $request->isbn;
        $insertBook->pdf = "aa";
        
        $insertBook->save();

        return("Libro guardado con exito");
    }



    // Editar un libro seleccionado por ID
    public function editBook(Request $request, $id) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
        ]);

        $book = Libro::findOrFail($id);

        $book->title = $request->title;
        $book->description = $request->description;
        $book->genre = $request->genre;
        $book->isbn = $request->isbn;

        $book->save();

        return("Libro editado con exito");
    }



    // Eliminar un libro de la DB por ID
    public function deleteBook($id) {

        $book = Libro::findOrFail($id);
        $book->delete();

        return("Libro eliminado con exito... Será redirigido al listado de libros en 5 segundos.");
    }



    // Recoger todos los libros con una categoria en especifico
    public function getBooksByGenre(Request $request) {

        $request->validate([
            'genre' => 'required'
        ]);

        $genre = $request->genre;

        $books = Libro::where('genre', $genre)->get();
        return $books;
    }




    // Recoger un libro por un ISBN en especifico
    public function getBookByISBN(Request $request) {

        $request->validate([
            'isbn' => 'required'
        ]);

        $isbn = $request->isbn;

        $book = Libro::where('isbn', $isbn)->get();
        return $book;
    }




    // Recoger un libro por su nombre, si no encuentra ese libro
    // te busca uno con un titulo que contenga lo que has escrito
    public function getBookByName(Request $request) {

        $request->validate([
            'title' => 'required'
        ]);
        
        $title = $request->title;

        $book = Libro::where('title', $title)
                ->orWhere('title', 'like', '%' . $title . '%')->get();

        return $book;
        
    }



    // Recoger un libro con un titulo que contenga lo que has escrito
    // y con un genero en especifico
    public function getBookByNameAndGenre(Request $request) {

        $request->validate([
            'title' => 'required',
            'genre' => 'required'
        ]);

        $title = $request->title;
        $genre = $request->genre;

        $book = Libro::where('title', 'like', '%' . $title . '%')
                ->where('genre', $genre)->get();

        return $book;
    }
}
