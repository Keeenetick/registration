<meta charset="utf-8">
<?php
require "db.php";
?>
<?php if (isset($_SESSION['logged_user'])):?>
	Авторизован!
	<hr>
	<a href="/logout.php">Выйти</a>
	<?php else : ?>
<meta charset="utf-8">
<a href="/login.php">Авторизоваться</a> <br>
<a href="/singup.php">Регистрация</a>
<?php endif; ?>