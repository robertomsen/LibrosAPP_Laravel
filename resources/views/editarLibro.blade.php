@extends('base')

@section('container')

<div class="col-md-12 mt-3">
    <h2 class="text-center">Editar Libro</h2>
    <hr>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="">Titulo *</label>
        <input type="text" class="form-control" id="title" placeholder="Introduce el titulo..." required>
    </div>
    <div class="form-group">
        <label for="">Descripción *</label>
        <input type="text" class="form-control" id="description" placeholder="Introduce una descripcion...">
    </div>
    <div class="form-group"> 
        <label for="">Genero *</label>
        <select class="custom-select mr-sm-2" id="genre" required>
            <option value="Accion">Accion</option>
            <option value="Formacion">Formacion</option>
        </select>
    </div>
    <div class="form-group">
            <label for="">ISBN</label>
            <input type="text" class="form-control" id="isbn" placeholder="Introduce ISBN...">
    </div>
        <button onclick="editBook()" class="btn btn-primary">Añadir libro</button>
</div>
<div class="col-md-12 mt-3" id="result"></div>

<script>
     axios.get('../api/getBookById/{{$id}}', {
    }).then(response => {
        document.getElementById('title').value = response.data.title;
        document.getElementById('genre').value = response.data.genre;
        document.getElementById('isbn').value = response.data.isbn;
        document.getElementById('description').value = response.data.description;
    }).catch(e => {
        console.log(e);
    });

    function editBook() {
        let title = document.getElementById('title').value;
        let genre = document.getElementById('genre').value; 
        let isbn = document.getElementById('isbn').value;
        let description = document.getElementById('description').value;

        axios.put('../api/editBook/{{$id}}', {
            title : title,
            genre : genre,
            isbn : isbn,
            description : description
        }).then(response => {
            document.getElementById('result').innerHTML = '<div class="alert alert-success" role="alert">'+response.data+'</div>';
        }).catch(e => {
            console.log(e);
        });
    }

</script>    

@endsection