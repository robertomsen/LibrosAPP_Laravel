@extends('base')

@section('container')

<div class="col-md-12 mt-3">
    <h2 class="text-center">Listado de libros</h2>
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Genero</th>
            <th scope="col">ISBN</th>
          </tr>
        </thead>
        <tbody id="cuerpo"> 
        </tbody>
    </table>
</div>
<script>
    axios.get('api/getAllBooks', {
    }).then(response => {
        $("#cuerpo").html("");
        for(var i=0; i<response.data.length; i++){
            var tr = `<tr>
            <td>`+response.data[i].id+`</td>
            <td><a href="libro/`+response.data[i].id+`">`+response.data[i].title+`</a></td>
            <td>`+response.data[i].description+`</td>
            <td>`+response.data[i].genre+`</td>
            <td>`+response.data[i].isbn+`</td>
            </tr>`;
            $("#cuerpo").append(tr);
        }
    }).catch(e => {
        console.log(e);
    });
</script>

@endsection

