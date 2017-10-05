# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


token по умолчанию пока d7f6sd5a7854r85gasa6d5fg67sdg78df5gsf5gsd8

Во всех запросах в request должен быт токен!

!!!Ссылка на API:  http://boomapi.acesspades.com/api/v1/

Все таски: GET на  /tasks
																					
Все таски одного дня: GET  /mytasks (request:taskgroup_id: int)

Создать таск: POST  /task (request: text: string,(необязательно) group_task_id)

Обновить существующий таск: PUT  /task/{id} (request: title: string,(необязательно) group_task_id: int)

Создать (группу тасков) день: POST  /day  (request: day: int, month: int, year: int)

Обновить день: PUT  /day/{id} (request: day, month, year)
																				
Удалить день: DELETE  /day/{id}		

Получить все дни: GET на /days

Создать уровень POST на /lvl (request: exp: int, lvl: int)

Обновить уровень PUT на /lvl/{id} (request: exp, lvl)

Удалить уровень DELETE на /lvl/{id}

Получить все уровни их бд GET на /lvls

Создать проект: POST на /project (request: title: string)

Обновить проект: PUT на /project/{id} (request: title: string)

Удалить проект: DELETE на /project/{id}

Получить все проекты: GET на /projects

Создать тег: POST на /tag (request: title: string)

Обновить тег: PUT на /tag/{id} (request: title)

Удалить тег: DELETE на /tag/{id}

Получить все теги: GET на /tags

Создать статут: POST на /status (request: title: string)

Обновить статус: PUT на /status/{id} (request: title)

удалить статус: DELETE на /status/{id}

Получить все статусы: GET на /statuses

Создать роль: POST на /role (request: title: string)

Обновить роль: PUT на /role/{id} (request: title)

Удалить роль: DELETE на /role/{id}

Получить все роли: GET на /roles

Создать группу юзеров: POST на /usergroup (request: title)

Обновить группу юзеров: PUT на /usergroup/{id} (request: title)

Удалить группу юзеров: DELETE на /usergroup/{id}

Получить все группы юзеров: GEt на /usergroups

Регистрация пользователя: GET на /register (request: username: string, password: int, email: email(NN) )

Авторизация пользователя: GET на /login (request: email, password)