## Requerimientos
Para utilizar este API solo será necesario tener instalado PHP con la versión para laravel 9.19, MySQL y composer en la máquina.
Para instalar todo lo necesario se deberá correr el siguiente comando:
> composer install

Además será necesario crear el archivo .env con las variables por default que vienen en un proyecto laravel.

Para la creación de las tablas en base de datos será necesario correr el comando:
> php artisan migrate

Para usar el servicio se deberá correr el comando:
> php artisan serve

Para generar la clave que laravel utiliza para datos sensibles se deberá ejecutar el siguiente comando:
> php artisan key:generate

## Rutas

### Crear entrada
> /api/save

### Método
1. POST

#### Parámetros
1. titulo -> solo caracteres del alfabeto
2. autor -> solo caracteres del alfabeto
3. fecha_publicacion -> formato Año-Mes-Día
4. Contenido -> solo caracteres del alfabeto

### Lista de entradas
> /api/list

### Método
1. GET

#### Parámetros

### Búsqueda de entradas
> /api/find

### Método
1. GET

#### Parámetros
1. busqueda -> se buscará que los campos titulo, autor o contenido contengan el valor de este parámetro

### Selección de entrada
> /api/list/{id}

### Método
1. GET

#### Parámetros
1. id -> identificador de la entrada a seleccionar. Este parámetro es de valor entero.

## Errores
Para la creación de una entrada si no se envian los campos descritos en la sección de rutas, se arrojará un error indicando que no se han enviado
los datos necesarios, además si dentro de cada parámetro se envía valores no aceptados se arrojará el mismo error.
