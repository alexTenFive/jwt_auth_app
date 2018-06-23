## Простая авторизация с токеном ##

### Установка ###

* `git clone https://github.com/alexTenFive/simple_token_auth_app.git`
* `cd projectname`
* `composer install`
* `php artisan key:generate`
* Создайте базу данных и поменяйте данные *.env*
* `php artisan migrate` для создания таблиц пользователей
* `php artisan db:seed` для заполнения базы пользователями

### Библиотеки ###
* [tymondesigns/jwt-auth](https://github.com/tymondesigns/jwt-auth)
### Функционирование ###
При регистрации или авторизации клиенту выдается `JWT token`.
`JWT Token` - формируется с помощью объекта пользователя в БД и шифруется с помощью ключа.
Клиент сохраняет зашифрованый ключ в `localStorage` и использует его для доступа к методам `api`. В данном случае для получания имён всех зарегистрированых пользователей через роут `api/users`.
