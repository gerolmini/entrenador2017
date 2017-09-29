# entrenador2017
Práctica del módulo 3 del curso de desarrollo web 2017

# PRACTICA GRUPO 2

~~~~~~~~~~
 - Gustavo
 - Ignacio
 - Mariano
 - Xavi
~~~~~~~~~~

Este proyecto consiste en  una pagina web que permite crear un cuestionario de preguntas de forma aleatoria.
Entrenador de preguntas tipo test. La aplicación permite registrar nuevas preguntas, muestra preguntas aleatorias según un tema seleccionado y valida su resolución.

Tambien uedes ver las estadisticas de las visitas que recibe cada página.

### instalacion

Para ejectuar esta proyecto primeros debes realizar la instalacion  de los siguientes puntos:

- Debes tener intalada la carpeta vendor de composer .
- Tambien es necesario la instalacion del middleware para la redireccion de URL HTTP a URL HTTPS
    > composer require osorcom/safe-url-middleware .

- Crear la base de datos ejecutando en el navegador del fichero install.php

- Para las visiats instalar el Middleware realizado es proceso para llevar las visitas por página.
-   > require controler/StatsMiddleware.php
### Preguntas | Respuestas ###

La creacion de preguntas esta protegida con contraseña

Usuario :root
Contraseña :root
