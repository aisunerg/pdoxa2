<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ¿Que es pDoxa?

Es un sistema de gestion para horarios academicos desarrollado por el Area de Ingenieria en Sitemas de la Universidad Nacional Experimental Romulo Gallegos.

## Aprendiendo sobre el proyecto

Fue desarrollado en el lenguaje PHP 8.1 usando el framework de desarrollo [Laravel 10](https://laravel.com/docs/10.x/).

- Se uso el [starter kit breeze](https://laravel.com/docs/10.x/starter-kits) con su version basada en vue 3 y empleando [inertiajs](https://laravel.com/docs/10.x/starter-kits#breeze-and-inertia).
- [Guia de la estructura de directorios(carpetas)](https://laravel.com/docs/routing).
- [¿Como funcionan las rutas?](https://laravel.com/docs/routing).
- La base de datos se crea a partir del [esquema de migraciones](https://laravel.com/docs/10.x/migrations).
- Los registros basicos se crean con [seeder](https://laravel.com/docs/10.x/seeding).
- Se usa [Eloquent ORM](https://laravel.com/docs/10.x/eloquent) para realizar las consultas a la Base de Datos.

### Controladores

Los controladores podras encontrarlos en **app/Http/Controllers**, siguen una convencion [resource](https://laravel.com/docs/10.x/controllers#resource-controllers) por lo que tienen metodos predefinidos en su mayoria.

- **Respuestas**: para [retornar las vistas](https://inertiajs.com/responses) se debe usar la libreria inertiajs para responder

### Modelos
Los modelos podras encontrarlos en **app/Models** 

### Vistas

Para ver las vistas debemos entrar en **resources/js**, las vistas tienen la estructura sfc(single-file component) usan un formato .vue

- **/Pages**: Aqui podras encontrar las vistas de cada modulo
- **/Layouts**: Los layouts
- **/Components**: Componentes basicos creados por el starter kit. 
- **/Components/myComponents** Componentes propios

## Licencia

Laravel es un framework open-source bajo la licencia [MIT license](https://opensource.org/licenses/MIT).
