@extends('base')

@section('container')

<div class="col-md-12 mt-3">
    <h2 class="text-center" id="title-h2">Buscador de libros</h2>
    <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link text-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Instrucciones de Uso
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <p><b> Si quieres buscar un libro por un nombre: </b> Solamente rellena el campo de titulo, se buscara un libro por el nombre en concreto, si no encuentra ese titulo, te mostrara titulos que contengan las palabras introducidas.</p>
                    <p><b>Si quieres buscar libros por un genero:</b>  Solamante rellena el campo de genero, se buscara libros con el genero introducido</p>
                    <p><b>Si quieres buscar libros por genero y nombre: </b>Rellena los campos titulo y genero, buscará un libro con el nombre introducido y de ese genero, en caso de no encontrar, buscará libros con ese genero y que contengan las palabras introducidas</p>
                    <p><b>Si quieres buscar un libro por su ISBN: </b> Introduce el ISBN del libro en el campo "introduce ISBN" y pulsa buscar, buscara el libro por el ISBN introducido</p>
                </div>
              </div>
            </div>
    </div>
<hr>
</div>
<div class="col-md-12 text-center">
        <div class="form-row align-items-center text-center">
          <div class="col-sm-5 my-1">
            <input type="text" class="form-control" id="titleSearch" placeholder="Titulo...">
          </div>
          <select class="custom-select col-sm-3 my-1" id="genreSearch">
            <option selected>Elige un genero...</option>
            <option value="Accion">Accion</option>
            <option value="Formacion">Formacion</option>
          </select>
          <div class="col-sm-3 my-1">
            <div class="input-group">
              <input type="text" class="form-control" id="isbnSearch" placeholder="Introduce ISBN">
            </div>
          </div>
          <div class="col-auto my-1">
            <button class="btn btn-primary" onclick="search()">Buscar</button>
          </div>
        </div>
</div>
<div class="col-md-12 mt-4">
    <h3 id="results"></h3>
</div>
<div class="col-md-12 mt-5">
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
    function search() {
        let titleSearch = document.getElementById("titleSearch").value;
        let genreSearch = document.getElementById("genreSearch").value;
        let isbnSearch = document.getElementById("isbnSearch").value;
        let responseSearch;

        // BUSQUEDA DE LIBRO SOLO POR NOMBRE
        if(titleSearch != "" && genreSearch == "Elige un genero..." && isbnSearch == "") {

            console.log("buscamos un libro por nombre");

            axios.post('api/getBookByName', {
                title : titleSearch
            }).then(response => {
                console.log(response.data);

                if(response.data.length > 1) {
                    document.getElementById('results').innerHTML = response.data.length + " libros encontrados buscando por nombre";
                }else{
                    document.getElementById('results').innerHTML = response.data.length + " libro encontrado buscando por nombre";
                }
                
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
         
            
        }
        // BUSQUEDA DE LIBRO POR GENERO Y NOMBRE
        else if (titleSearch != "" && genreSearch != "Elige un genero..." && isbnSearch == "") {
            console.log("buscamos un libro por genero y nombre");

            axios.post('api/getBookByNameAndGenre', {
                genre : genreSearch,
                title : titleSearch
            }).then(response => {
                console.log(response.data);

                if(response.data.length > 1) {
                    document.getElementById('results').innerHTML = response.data.length + " libros encontrados buscando por genero y nombre";
                }else{
                    document.getElementById('results').innerHTML = response.data.length + " libro encontrado buscando por genero y nombre";
                }

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
        }
        // BUSQUEDA DE LIBRO POR GENERO
         else if(titleSearch == "" && genreSearch != "Elige un genero..." && isbnSearch == "") {
            console.log("buscamos un libro por genero");

            axios.post('api/getBooksByGenre', {
                genre : genreSearch
            }).then(response => {
                console.log(response.data);

                if(response.data.length > 1) {
                    document.getElementById('results').innerHTML = response.data.length + " libros encontrados buscando por genero";
                }else{
                    document.getElementById('results').innerHTML = response.data.length + " libro encontrado buscando por genero";
                }

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

        }
        // BUSQUEDA DE LIBRO POR ISBN
        else if(isbnSearch != "") {
            console.log("Buscamos libro por ISBN");
            axios.post('api/getBookByISBN', {
                isbn : isbnSearch
            }).then(response => {
                console.log(response.data);

                if(response.data.length > 1) {
                    document.getElementById('results').innerHTML = response.data.length + " libros encontrados buscando por ISBN";
                }else{
                    document.getElementById('results').innerHTML = response.data.length + " libro encontrado buscando por ISBN";
                }

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
            });


        } else {
            console.log("Por favor, inserte un metodo de busqueda");
        }


    }

</script>

@endsection