<!DOCTYPE html>
<html>
<head>
	<title>Free server</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php

$botToken = 'токен сюда';
$chatId = 'Ваш чат айди';

// Получаем данные из формы
$name = $_POST['name'];
$telegram = $_POST['telegram_username'];
$server_type = $_POST['hyper_v_version'];
$location = $_POST['server_location'];
$server_usage = $_POST['server_usage'];

// Формируем текст сообщения с данными из формы
$message .= "👔 Имя: $name" . PHP_EOL;
$message .= "📱 Telegram: @$telegram" . PHP_EOL;
$message .= "💻 Тип сервера: $server_type" . PHP_EOL;
$message .= "📍 Локация: $location" . PHP_EOL;
$message .= "👨🏻‍💻 Предполагаемое использование сервера: $server_usage" . PHP_EOL;

// Кнопки для сообщения Telegram
$keyboard = [
    [
        [
            'text' => 'Принять',
            'url' => 'полный адрес вашего сайта'
        ],
        [
            'text' => 'Отклонить',
            'url' => 'полный адрес вашего сайта'
        ]
    ]
];

// Конвертируем кнопки в JSON-формат
$replyMarkup = json_encode([
    'inline_keyboard' => $keyboard
]);

// Отправляем сообщение с кнопками в Telegram
$response = file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=".urlencode($message)."&reply_markup=".$replyMarkup);

// Если сообщение отправлено успешно, выводим уведомление о принятой заявке
if ($response) {
    echo '<div class="alert alert-success" role="alert">Спасибо за заявку, '.$name.'! /div>';
} else {
    echo '<div class="alert alert-danger" role="alert">Возникла ошибка при отправке заявки. Попробуйте еще раз позже.</div>';
}
?>
</body>
</html>
