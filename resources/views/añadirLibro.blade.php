@extends('base')

@section('container')

<div class="col-md-12 mt-3">
    <h2 class="text-center">Añadir libro a la libreria</h2>
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
        <button onclick="addBook()" class="btn btn-primary">Añadir libro</button>
</div>
<div class="col-md-12 mt-3" id="result"></div>

<script>
    function addBook() {

        let title = document.getElementById('title').value;
        let description = document.getElementById('description').value;
        let genre = document.getElementById('genre').value;
        let isbn = document.getElementById('isbn').value;

        if(title == "" || description == "" || genre == "") {
            document.getElementById("result").innerHTML = '<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>';
        }else{ 
            axios.post('api/insertBook', {
                title : title,
                description : description,
                genre : genre,
                isbn : isbn
            }).then(response => {
                document.getElementById("result").innerHTML = '<div class="alert alert-success" role="alert">'+response.data+'</div>';
            }).catch(e => {
                document.getElementById("result").innerHTML = '<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>';
            });
        }
    }
    
</script>

@endsection

