## :video_game: :tada:
# Games Parties: 
![GitHub issues](https://img.shields.io/github/issues/jarki7777/API_web_LFG)
![GitHub forks](https://img.shields.io/github/forks/jarki7777/API_web_LFG)
![GitHub stars](https://img.shields.io/github/stars/jarki7777/API_web_LFG)
![GitHub license](https://img.shields.io/github/license/jarki7777/API_web_LFG)
## Contenido: 
- [Introduccion](#Introduccion)
- [Base de Datos](#Base-de-Datos)
- [Estructura de Carpetas](#Estructura-de-Carpetas)
- [Autenticacion y Autorizacion](#Autenticación-y-Autorización)
- [Endpoints](#Endpoints)
   
- [Autores](#Authors) 
#
## :memo:
## Introduccion
Dada la situación sanitaria, una empresa tecnológica ha estado trabajando en remoto desde marzo de 2020.

Esto ha implicado que nuestros compañeros hayan perdido el contacto humano que siempre se ha tenido, y es algo que la empresa desea cambiar.
La empresa quiere dar un impulso a la manera que tienen los trabajadores de relacionarse, permitiendo que contacten entre ellos creando grupos de interés.

Toda esta gestión se ha realizado con **PHP + Laravel** y gestionado con una base de datos **SQL**
#

## :closed_book:
## Base de Datos 
![GamesRoom](https://user-images.githubusercontent.com/76188418/118847249-d4078080-b8cd-11eb-8af1-10269a8b7476.png)


#

## :open_file_folder:
## Estructura de Carpetas 
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

## :closed_lock_with_key:
## Autenticación y Autorización 
Los nuevos usuarios deberán registrarse para acceder a los puntos dentro de la aplicación.
Los usuarios registrados pueden iniciar sesión guarda la información en un token que permite al usuario acceder a rutas, servicios y recursos que requieren esta llave.

Esta manera de autenticación almacena de manera cifrada el email, la password y otra información del usuario. Por defecto todos los nuevos usuarios se dan de alta con un rol
'basic', solo el usuario con rol 'admin' puede accedere a rutas y servicios especificos.

A su vez se podrán banear usuarios, los cuales solo tienen acceso al login y al logout
#

## :round_pushpin:
##  Endpoints

[Documentacion Ofical de Games Party](https://documenter.getpostman.com/view/14138566/TzRa5iLp)

Una serie de rutas dentro de la aplicación que permite acceder a cada uno de los servicios que esta ofrece. Tras optener la clave de acceso o 'token' el usuario podrá navegar por todas las funcionalidades dentro de la aplicación, excepto para registrarse o para iniciar sesión, para estas dos rutas no se requerirá de esa clave de acceso.

- **Auth:** Rutas especificas de autenticación, todas estan rutas pasan por https://gentle-springs-10876.herokuapp.com/api/auth/...
    - /signup --> Permite al usuario registrar sus datos 
    - /login --> Permite al usuario acceder con sus credenciales
    - /logout --> Permite al usuario cerrar su sesión
    
- **Admin** Rutas diseñadas para los **administradores**, pasan por https://gentle-springs-10876.herokuapp.com/api/admin/...
    - /users --> Permite ver a los administradores ver un listado de todos los usuarios
    - /banned --> Permite ver todos los usuarios que están baneados 
    - /banUser/userID --> Permite a los administradores banear o desbanear a un usuario
    - /changeRole/userID --> Permite a los administradores camnbiar el rol de otros usuarios u otros administradores

- **Parties** Rutas para interactuar con los grupos de juego, pasan por https://gentle-springs-10876.herokuapp.com/api/party...
    - / --> (GET) Muestra un listado de todos los grupos que hay disponibles 
    - / --> (POST) Permite crear una sala con un nombre y el juego relacionado
    - /{gameID} --> Muestra los grupos de un juego concreto
    - /{partyID} --> Permite borrar un grupo, esta ruta solo podrán acceder los administradores
    
    Si los usuarios quieren unirse o salirse de un grupo la ruta será https://gentle-springs-10876.herokuapp.com/api/partyuser/...
    - /{partyID} --> Permite a los usuarios entrar o salir de un grupo

- **Messages** Rutas diseñadas para interactuar con los mensajes de la app, acceden mediante https://gentle-springs-10876.herokuapp.com/api/msg...
    - /{partyID} --> Muestra un listado de todos los mensajes dentro de un grupo
    - /{partyID} --> Permite al usuario escribir un mensaje dentro de un grupo al que pertenece
    - /messageID --> Permite al usuario borrar o actualizar sus propios mensajes

- **Games** Rutas diseñadas para interacturar con el listado de videojuegos disponibles, acceden por https://gentle-springs-10876.herokuapp.com/api/game...
    - / --> Muestra un listado general de todos los videojuegos disponibles
    - /{gameID} --> Muestra los datos de un videojuego en concreto
    
    Los administradores podrán crear juegos desde la ruta https://gentle-springs-10876.herokuapp.com/api/game (introduciendo los datos del juego) y actualizarlos mediante https://gentle-springs-10876.herokuapp.com/api/game/gameID
    
- **Users** Ruta diseñada para que los usuarios puedan actualizar sus datos, acceden mediante https://gentle-springs-10876.herokuapp.com/api/user/
    - /profile/{userID} --> Permite actualizar sus propios datos
#

### Auttores
[Adrián Olmo](https://www.linkedin.com/in/adrian-olmo/)
[Jarki Melendez](https://www.linkedin.com/in/jarki-melendez/)


[TOP](#Contenido)
