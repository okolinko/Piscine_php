<?php
	require_once 'db.php';
	require_once 'functions.php';

	if (isset($_SESSION['user_name']))
	{
		echo("<script>location.href = '/index.php';</script>");
		exit; 
	}
	if (isset($_POST['submit']))
	{
		$errors = [];

		$username = getClean($_POST['login']);
		$password2 = getClean($_POST['password2']);
		$password = getClean($_POST['password']);
		$email = getClean($_POST['email']);
		$hash_email = rand_hash(8);

		$query = "SELECT * FROM `register` WHERE user_name = '$username'";
		$data = mysqli_query($db, $query);

		if ($username == '' || $password == '' || $password2 == '' || $email == '')
			$errors[] = 'Ошибка: Одно из полей является пустым.';
		if (!preg_match("#^[aA-zZ0-9\-_]+$#",$username) || !preg_match("#^[aA-zZ0-9\-_]+$#",$password))
			$errors[] = 'Ошибка: Введены недопустимые символы.';
		if (!preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email))
			$errors[] = 'Ошибка: Адрес электронной почты введен не верно.';
		if ($password !== $password2)
			$errors[] = 'Ошибка: Введенные пароли не совпадают.';
		if (mysqli_num_rows($data) == 1)
			$errors[] = 'Ошибка: Такой логин уже существует';
		if (empty($errors))
		{
			$password = hash('whirlpool', $password);
			$query = "INSERT INTO `register` SET `user_name` = '$username', `password` = '$password', `email` = '$email', `act_email` = 0, `hash_email` = '$hash_email', `admin` = 0";
			mysqli_query($db, $query);
			mail($email, "Your activation key for internet shop.", 'For activation your account '.$username.' 
				follow this link http://localhost:8100/auth.php?email=' . $hash_email);
		}
	}
?>
<?php include "block/header.php"; ?>
	<div id="menu">
		<?php require_once 'block/menu.php';?>
	</div>
	<div id="content">
		<?php	
		if (!empty($errors))
			echo $errors[0] . '<hr>';
		else if (isset($_POST['submit']))
			echo "Аккаунт зарегистрирован. Код активации отправлен на почту." . '<hr style="background-color: green">';
		?>
		<content>
		<form method="POST" action="register.php">
		    <fieldset style="width: 300px; margin-left: 200px;">
		     <legend>Пройдите форму регистрации</legend>
		     <p>Введите имя:</p>
		     <input id="login_im" type="text" maxlength="18" name="login" value="<?php if (isset($_POST['login'])) { echo $_POST['login']; } ?>">
		     <p>Введите пароль:</p>
		     <input id="passw_im" type="password" name="password">
		     <p>Повторите пароль:</p>
		     <input id="passw_im" type="password" name="password2">
		     <p>Введите email адрес:</p>
		     <input id="email_im" type="email" name="email">
		     <button type="submit" name="submit" style="margin-left: 15%;">Зарегистрироваться</button>
		    </fieldset>
		   </form>
		</content>
	</div>
	<div class="clear">
	</div>
	<div id="footer">
		<p class="footer-text">© Интернет-магазин «Apple» 2019</p>
	</div>
</div>
 </body>
</html>

