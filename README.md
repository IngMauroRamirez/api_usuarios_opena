# Prueba Técnica - API REST Usuarios

## Autor

- Nombre: Mauro Estefan Ramírez Aranguren
- Correo: mauroeramirez140395@outlook.com
- GitHub: [https://github.com/IngMauroRamirez](https://github.com/IngMauroRamirez)

## Descripción
Este proyecto corresponde a una prueba técnica desarrollada con **Laravel, MySQL**, cuyo objetivo es:
- Implementar una base de datos para almacenar información sobre usuarios, proyectos, tareas y tarifas, donde un usuario puede pertenecer a múltiples proyectos y fijar una tarifa diferente para cada uno, y registrar múltiples tareas en los proyectos.

- Construir una API REST que permita obtener el listado de tareas de un usuario, con su respectivo proyecto y valor.

- Construir una vista web donde se pueda visualizar el listado de tareas del punto anterior.

---

## Tecnologías empleadas
- Laravel 10+
- MySQL
- Blade
- Git & GitHub


## Instalación y Ejecución Local

## Clonar el repositorio y acceder a la carpeta del proyecto.

```bash
git clone https://github.com/IngMauroRamirez/api_usuarios_opena.git
cd api_usuarios_opena
```

## Instalar las dependencias del proyecto usando Composer: 

```bash
composer install
```

# Configuración Base de Datos

Crear la base de datos

```bash
CREATE DATABASE api_usuarios_opena;
```

Editar el archivo .env e ingresar el nombre de la base de datos así

```bash
DB_DATABASE=api_usuarios_opena
```

Ejecutar las migraciones

```bash
php artisan migrate
```

## Levantar el servidor de desarrollo

```bash
php artisan serve
```

## DOCUMENTACIÓN:

## Relaciones entre tablas

### usuarios -> proyectos: N:N

- Un usuario puede estar en muchos proyectos
- Un proyceto puede tener muchos usuarios

Se crea la tabla pivote **usuarios_proyectos** y aquí va el valor de la tarifa ya que no pertence solo al usuairo o al proyecto sino a la relación entre ambos.

### usuarios -> tareas: 1:N
- Un usuario puede registrar muchas tareas
- Cada tarea pertenece a un solo usuario

### proyectos -> tareas: 1:N
- Un proyecto puede tener muchas tareas
- Cada tarea pertenece a un solo proyecto


## ENDPOINT PARA API REST

- url /api/usuarios/{id_usuario}/tareas

Donde {id_usuario} es el id de cada usuario a consultar por GET

- Retorna la información en formato JSON en donde se calcula además el valor usando la ecuación valor = horas * tarifa

## VISTA WEB (blade)

- url usuarios/{id_usuario}/tareas

Donde {id_usuario} es el id de cada usuario a consultar por GET

- Retorna la información mediante el llamado de una vista (blade) en donde se calcula además el valor usando la ecuación valor = horas * tarifa. Finalmente toda la información se muestra en una tabla ordenada.


## Separación API / Web

- Uso correcto de relaciones Eloquent
- Tabla pivot para datos de relación
- Cálculos derivados en backend
- .gitignore seguro (no se sube .env, vendor, node_modules)