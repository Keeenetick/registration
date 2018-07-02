<meta charset="utf-8">

<?php
require "db.php";

$data = $_POST;
if(isset($data['do_singup']))
{
	$errors = array();
	if(trim($data['login']) == '')
	{
		$errors[] = 'Введите логин';
	}

	if(trim($data['email']) == '')
	{
		$errors[] = 'Введите E-Mail';
	}

	
	if($data['password'] == '')
	{
		$errors[] = 'Введите пароль';
	}

	
	if($data['password2'] != $data['password'])
	{
		$errors[] = 'Повторный пароль введен не верно';
	}

	if(R::count('users', "login = ?", array($data['login']))> 0)
	{
		$errors[] = 'Пользователь с таким логином уже сужествует';
	}

	if(R::count('users', "email = ?", array($data['email']))> 0)
	{
		$errors[] = 'Пользователь с таким E-Mail уже сужествует';
	}

	if(empty($errors))
	{
		$user = R::dispense('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);
		echo '<div style="color: green;">Вы успешно зарегистрированы</div><hr>';
	}
	else
	{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}


 }
?>





<form action="/singup.php" method="POST">
	<p>
		<p><strong>Ваш логин</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login'];?>">
	</p>
	<p>
		<p><strong>Ваш E-Mail</strong></p>
		<input type="email" name="email" value="<?php echo @$data['email'];?>">
	</p>

	<p>
		<p><strong>Ваш пароль</strong></p>
		<input type="password" name="password" value="<?php echo @$data['password'];?>">
	</p>

	<p>
		<p><strong>Ваш пароль еще раз</strong></p>
		<input type="password2" name="password2" value="<?php echo @$data['password2'];?>">
	</p>


	<p>
		<button type="submit" name="do_singup">Зарегистрироваться</button>
	</p>
</form>