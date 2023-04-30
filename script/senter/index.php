<!DOCTYPE html>
<html>
<head>
	<title>Форма заявки на сервер</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Форма заявки на сервер</h2>
	<form method="post">
		<div class="form-group">
			<label for="name">Имя пользователя:</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>
		<div class="form-group">
			<label for="telegram">ID пользователя в Telegram:</label>
			<input type="text" class="form-control" id="telegram" name="telegram" required>
		</div>
		<button type="submit" class="btn btn-success" name="accept">Принять заявку</button>
		<button type="submit" class="btn btn-danger" name="reject">Отклонить заявку</button>
	</form>
	<?php
	// Проверяем, была ли отправлена форма
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	  // Получаем данные из формы
	  $username = $_POST['name'];
	  $telegram_id = $_POST['telegram'];
	  
	  // Кнопка "Принять заявку" нажата
	  if (isset($_POST['accept'])) {
	  
	    // Отправляем сообщение пользователю в Telegram
	    $message = "$username, заявка на сервер принята! С вами свяжутся в ближайшее время.";
            $bot_token = 'токен вашего бота';
            $bot_api_url = "https://api.telegram.org/bot$bot_token";
	    file_get_contents("$bot_api_url/sendMessage?chat_id=$telegram_id&text=".urlencode($message));
	    
	    // Выводим сообщение об успешном подтверждении заявки
	    echo '<div class="alert alert-success" role="alert">Сообщение об подтверждении заявки отправлено</div>';
	    
	  }
	  
	  // Кнопка "Отклонить заявку" нажата
	  else if (isset($_POST['reject'])) {
	  
	    // Отправляем сообщение пользователю в Telegram
	    $message = "$username, заявка на сервер отклонена. Попробуйте позже.";
            $bot_token = 'Токен вашего бота';
            $bot_api_url = "https://api.telegram.org/bot$bot_token";
	    file_get_contents("$bot_api_url/sendMessage?chat_id=$telegram_id&text=".urlencode($message));
	    
	    // Выводим сообщение об от
	    
echo '<div class="alert alert-danger" role="alert">Сообщение об отклонении заявки отправлено</div>';

  }
  
}
?>
</div>
</body>
</html>
