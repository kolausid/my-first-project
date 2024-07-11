файл auth.sql содержит данные: создана база данных mydb, в ней таблица auth:
id - ключ, 
login - логин по которому авторизовывается пользователь.
password - зашифрованный пароль
name - имя пользователя
lName - Фамилия
HB - день рождения
email - почта
date_reg - дата регистрации
status_id - статус пользователя, где 0 это нет статуса. 2 это обычный пользователь. 1 это админ.

statuses.sql содержит названия статусос и их id. где 2 это обычный пользователь. 1 это админ.

day36Account.php файл с реализацией изменения имени-фамилии пользователя. Подключаюсь к бд, выполняю запрос по id пользователя. Форма для ввода новых данных, с методом postю. Далее идет проверка на отправку новых данных и присваивание переменным данных из формы. После в глобальную переменную сессии присваивается значение переменных. Также после отправки формы с данными происходит запрос к бд на обновление данных пользователя. Последнее это отправка сессионых данных с переходом на страницу day36Profile.php

day36Auth.php - реализация авторизации зарегистрированного пользователя.
с 4 по 10 строчку - форма ввода данных
13 строка - подключение к бд.
с 16 по 55 - проверка на пустоту ввода пароль и логина, при false будет выведено 47 строка, при некорректном пароле или логине будет выведена 43, всегда выводится как напоминалка 52. При true выполняется запрос к бд на существование пользователя по логину, пароль "солется" и проверяется с паролем в бд, где при true подтягиваются глобальные переменные сессий на обозначение авторизации, данных пользователя и статуса и переходом на страницу профиля day36Profile.php.

day36ChangePassword.php - реализация смены пароля.
включение сессии. Форма с вводом старого и нового пароля с подтверждением нового. Подключение к бд. Запрос к бд по id. Проверка на пустоту всех полей и проверка на слово. Если true то  новый пароль шифруется. Запрос к бд с обновлением данных. Если false то выводится сообщение либо строка 46 либо 49.

day36Connect.php - подключение к бд.

day36DeletePr.php - реализация удаление зарегистрированного пользователя.
включение сессии. Подкл к бд. Запрос к бд по id пользователя. Форма ввода пароля для подтверждения пользователя. Если true  то выполнение запроса бд на удаление по id и переход на страницу регистрации day36Regis.php. Если false то вывод строки 25

day36Logout.php - реализация обнуления глобальных переменных сессий.
Две переменным присваивается значение null при выходе из профиля day36Profile.php или day36Users.php

day36ProfAdm.php - реализация доп возможностей при роли пользователя = админ.
Практически дубль файла day36Profile.php до строки 40. Далее выполняется запрос к бд с джойном к таблице со статусами пользователей. Делаю таблицу, колонка Login это логины пользователей, колонка Status это статус пользователя, колонка Change это возможность сделать обычного пользователя админом.

day36Profile.php - реализация личного профиля с информацией зарегистрированного пользователя.
включение сессии. Проверка на глобальную переменную сессии регистрации или авторизации. Выводится сообщение в зависимости от переданной сессионной переменной. Вывод сессионной переменной статуса пользователя, логина, имени, фамилии и возраста, также возможен переход для редактирования пользователя это файл day36Accounts.php. Смена пароля day36ChangePassword.php. Удаление учетной записи day36DeletePr.php и выхода day36Logout.php. При статусе админ появляется 2 ссылки на список пользователей day36Users.php и админ меню day36ProfAdm.php

day36Regis.php - реализация регистрации.
включение сессии. форма ввода данных. Валидация логина. Проверка на пустоту данных из форм, валидация почты. При true выполняется запрос вставки в бд с передачей данных из форм с разделением на статусы пользователя. При false выводится сообщение из строки 126 или 130, или 133.

day36Users.php - реализация показа всех зарегистрированных пользователей, но с разлогиванием.
включение сессии. Подключение к бд. Выполнение запроса с выводом всех пользователей. Циклом с каждой итерацией выводятся в виде списка данные с day36Profile с помощью GET параметра равного id пользователю из бд.










