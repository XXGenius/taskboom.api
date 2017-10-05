#Dock By BoomApi
__


token по умолчанию пока d7f6sd5a7854r85gasa6d5fg67sdg78df5gsf5gsd8

##Во всех запросах в request должен быт токен!

**Ссылка на API:  http://boomapi.acesspades.com/api/v1/**

##ТАСКИ

Все таски: _GET_ на  /tasks

Выбрать один таск: _GET_ /task/{id}
																					
Все таски одного дня: _GET_ ` /mytasks (request:taskgroup_id: int)`

Создать таск: _POST_  /task `(request: text: string,(обязательно) group_task_id)`

Обновить существующий таск: _PUT_  /task/{id} (request: title: string,(обязательно) group_task_id: int)



##ДНИ

Создать (группу тасков) день: _POST_  /day  (request: day: int, month: int, year: int)

Обновить день: _PUT_  /day/{id} (request: day, month, year)
																				
Удалить день: _DELETE_  /day/{id}		

Получить все дни: _GET_ на /days

Получить выбранный день: _GET_ /day/{id}




##УРОВНИ

Создать уровень: _POST_ на /lvl `(request: exp: int, lvl: int)`

Обновить уровень: _PUT_ на /lvl/{id} `(request: exp, lvl)`

Удалить уровень: _DELETE_ на /lvl/{id}

Получить все уровни: _GET_  на /lvls

Получить выбранный уровень: _GET_  на /lvl/{id}



##ПРОЕКТЫ

Создать проект: _POST_ на /project `(request: title: string)`

Обновить проект: _PUT_ на /project/{id} `(request: title: string)`

Удалить проект: _DELETE_ на /project/{id}

Получить все проекты: _GET_  на /projects

Получить выбранный проект: _GET_  на /project/{id}



##ТЕГИ

Создать тег: _POST_ на /tag `(request: title: string)`

Обновить тег: _PUT_ на /tag/{id} `(request: title)`

Удалить тег: _DELETE_ на /tag/{id}

Получить все теги: _GET_  на /tags

Получить выбранный тег: _GET_  на /tag/{id}




##СТАТУСЫ

Создать статут: _POST_ на /status `(request: title: string)`

Обновить статус: _PUT_ на /status/{id} `(request: title)`

Удалить статус: _DELETE_ на /status/{id}

Получить все статусы: _GET_  на /statuses

Получить выбранный статус: _GET_  на /status/{id}




##РОЛИ

Создать роль: _POST_ на /role `(request: title: string)`

Обновить роль: _PUT_ на /role/{id} `(request: title)`

Удалить роль: _DELETE_ на /role/{id}

Получить все роли: _GET_  на /roles

Получить выбранную роль: _GET_  на /role/{id}



##ГРУППЫ

Создать группу юзеров: _POST_ на /usergroup `(request: title)`

Обновить группу юзеров: _PUT_ на /usergroup/{id} `(request: title)`

Удалить группу юзеров: _DELETE_ на /usergroup/{id}

Получить все группы юзеров: _GET_  на /usergroups

Получить  выбранную группу: _GET_  на /usergroup/{id}



##ПОЛЬЗОВАТЕЛИ

получить выбранного юзера: GET на /user/{id}

создать юзера: _POST_ на /user `(request: username: string, passsword: int, email: email(NN))`

Удалить юзера: _DELETE_ на /user/{id}

Обновить юзера:_PUT_ на /user/{id}

Регистрация пользователя: _GET_  на /register `(request: username: string, password: int, email: email(NN) )`

Авторизация пользователя: _GET_ на /login `(request: email, password)`