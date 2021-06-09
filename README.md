<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Про Laravel-project

Приложение позволяющее управлять отделами и сотрудниками предприятия

## Что нужно для работы
- загрузить проект
- использовать команду `docker-compose up -d --build`
- использовать команду `docker-compose up exec php composer install`
- `docker-compose exec php bash` 
- `php artisan migrate`

## Как использовать

http://localhost:8000/  
/department - отделы  
/employee - сотрудники  

переход по страницам в шапке приложения  
- Сначала создаем отделы
- Добавляем сотрудников  
В процессе удаляем/добавляем/редактируем сотрудников или отделы если это надо
