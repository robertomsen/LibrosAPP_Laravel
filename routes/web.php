<?php


// Ruta inicial en la que se muestran todos los libros
Route::view('/', 'index')->name('index');

// Ruta al pulsar en un libro
Route::get('/libro/{id}', function($id) {
    return view('libro', compact('id'));
})->name('libro');

// Ruta para el buscador
Route::view('/buscador', 'buscador')->name('buscador');

// Ruta para añadir libro
Route::view('/añadirLibro', 'añadirLibro')->name('añadirLibro');

// Ruta para editar libro

Route::get('/editarLibro/{id}', function($id) {
    return view('editarLibro', compact('id'));
})->name('editarLibro');