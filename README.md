# PHP-form-Telegram


## В этот скрипт входит: 

* Страница заказа сервера:

![Screenshot](project-photo.png)

* Страница отклонения и принятия заказа.

![Screenshot](project-photo2.png)

И так, как работает этот скрипт ?
* Пользователь заполняет форму, заказывает сервер, в этом случае он бесплатный. Вам приходит сообщение с содержанием заказа:

![Screenshot](zakaz.png)

* Если вы согласны и готовы создать этому человеку сервер, то можете написать ему самому лично, ибо же можете использовать страницу принятия и отказа заказа. Кнопки ссылаются на:
```sh
  https://site.com/senter
  ```
  
  ### Настройка

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._

1. В файле confirm.php замените следующие параметры на свои:
```sh
   $botToken = 'токен сюда';
   ```
```sh
   $chatId = 'Ваш чат айди';
   ```
```sh
   'url' => 'полный адрес вашего сайта'
   ```
2. Можно запускать!
