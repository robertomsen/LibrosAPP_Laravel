@extends('base')

@section('container')

<div class="col-md-12 mt-3">
    <h2 class="text-center" id="title-h2">Libro con id {{$id}}</h2>
    <hr>
</div>
<div class="col-md-12 mt-3"></div>
<div class="col-md-6 text-center" style="font-weight:bold;">Titulo</div>
<div class="col-md-3 text-center" style="font-weight:bold;">Genero</div>
<div class="col-md-3 text-center" style="font-weight:bold;">ISBN</div>
<div class="col-md-6 text-center" id="title">Titulo</div>
<div class="col-md-3 text-center" id="genre">Genero</div>
<div class="col-md-3 text-center" id="isbn">ISBN</div>
<div class="col-md-12 text-center mt-5" style="font-weight:bold;">Descripción</div>
<div class="col-md-12 text-center" id="description"></div>
<div class="col-md-6 mt-5 text-center"><a href="{{ route('editarLibro' , ['id' => $id])}}"><button class="btn btn-warning">Editar Datos Libro</button></div></a>
<div class="col-md-6 mt-5 text-center"><button class="btn btn-danger" onclick="deleteBook()">Eliminar Libro</button></div>
<div class="col-md-12 mt5" id="result"></div>
<script>
    axios.get('../api/getBookById/{{$id}}', {
    }).then(response => {
        document.getElementById('title-h2').innerHTML = response.data.title;
        document.getElementById('title').innerHTML = response.data.title;
        document.getElementById('genre').innerHTML = response.data.genre;
        document.getElementById('isbn').innerHTML = response.data.isbn;
        document.getElementById('description').innerHTML = response.data.description;
    }).catch(e => {
        console.log(e);
    });

    function deleteBook() {
        axios.delete('../api/deleteBook/{{$id}}', {
        }).then(response => {
            document.getElementById('result').innerHTML = '<div class="alert alert-success" role="alert">'+response.data+'</div>';
            setTimeout(window.location = "{{route('index')}}", 5000);
        }).catch(e => {
            console.log(e);
        });
    }

</script>

@endsection