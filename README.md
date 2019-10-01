# LibrosAPP_Laravel

Este proyecto es un ejemplo basico de una librería online utilizando Laravel + axios + bootstrap.

Todo el proyecto tiene su fron-end realizado en bootstrap, con consumo de API en axios.

El proyecto consta de:
- Un listado de libros que actualmente tiene la librería

- Un buscador con varios metodos de busqueda:
  * Por nombre
  * Por genero
  * Por genero y nombre
  * Por ISBN
  
- Una vista detallada del libro en concreto que contiene:
  * Información sobre el libro recuperada por API con el id
  * Poder eliminar el libro
  * Poder editar el libro

- Una vista para añadir un libro a la libreria


Es un proyecto de CRUD bastante basico, en el que se ha utilizado la base de laravel completamente:

  * .env: Las variables de entorno para la base de datos
  * migraciones: Para fabricar la migración de Libro
  * Modelo: Creación del modelo Libro para poder realizar las consultas (GET, POST, PUT, DELETE)
  * Rutas: Creación de las rutas de las vistas
  * Rutas (API): Creación de las rutas de la API para su posterior consumo
  * Controladores: Creación del controlador para la API
  * Vistas: Creación de vistas mediante el sistema de plantillas de blade.
  * Sentencias: Busquedas, insertar datos, actualizar, eliminar mediante Eloquent
  * Artisan: Uso de artisan para crear el proyecto, el modelo, usar las migraciones, crear el controlador etc.
  * Axios: Consumo de API mediante axios
  
  
El proyecto se ha realizado el dia 30 de Septiembre de 2019 con la versión 6.0 de Laravel, la duración del desarrollo del proyecto ha sido de 4 horas.

