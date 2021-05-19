# Games Parties:
## Contenido: 
- [Introduccion](#Introduccion)
- [Base de Datos](#Base-de-Datos)
- [Estructura de Carpetas](#Estructura-de-Carpetas)
- [Autenticacio y Autorizacion](#Autenticacion-y-Autorizacion)
- [Endpoints](#Endpoints)
    - [Auth](#Auth)
    - [Admin](#Admin)
    - [Parites](#Parties)
    - [Games](#Games)
    - [Messages](#Messages)
    - [Users](#Users)
   
- [Autores](#Authors) 
#
## Introduccion
Dada la situación sanitaria, una empresa tecnológica ha estado trabajando en remoto desde marzo de 2020.

Esto ha implicado que nuestros compañeros hayan perdido el contacto humano que siempre se ha tenido, y es algo que la empresa desea cambiar.
La empresa quiere dar un impulso a la manera que tienen los trabajadores de relacionarse, permitiendo que contacten entre ellos creando grupos de interés.

Toda esta gestión se ha realizado con **PHP + Laravel** y gestionado con una base de datos **SQL**
#

## :closed_book: Base de Datos 
'Insertar imagen'

#

## :open_file_folder: Estructura de Carpetas 
                ├───app
                    ├───Http
                        ├───Controllers
                        ├───Middleware
                    ├───Models
                    ├───Provider
                ├───config
                ├───database
                    ├───factories
                    ├───migrations
                    ├───seeders
                ├───routes
#

##  Autenticación y Autorización :closed_lock_with_key:
Los nuevos usuarios deberán registrarse para acceder a los puntos dentro de la aplicación.
Los usuarios registrados pueden iniciar sesión guarda la información en un token que permite al usuario acceder a rutas, servicios y recursos que requieren esta llave.

Esta manera de autenticación almacena de manera cifrada el email, la password y otra información del usuario. Por defecto todos los nuevos usuarios se dan de alta con un rol
'basic', solo el usuario con rol 'admin' puede accedere a rutas y servicios especificos
#

## :round_pushpin: Endpoints
Una serie de rutas dentro de la aplicación que permite acceder a cada uno de los servicios que esta ofrece. Tras optener la clave de acceso o 'token' el usuario podrá navegar por todas las funcionalidades dentro de la aplicación, excepto para registrarse o para iniciar sesión, para estas dos rutas no se requerirá de esa clave de acceso.

- **Auth:** Rutas especificas de autenticación, todas estan rutas pasan por localhost:8000/api/auth/...
    - /signup --> Permite al usuario registrar sus datos 
    - /login --> Permite al usuario acceder con sus credenciales
    - /logout --> Permite al usuario cerrar su sesión
#
