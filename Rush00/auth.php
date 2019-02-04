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
		$password = getClean($_POST['password']);
		$password = hash('whirlpool', $password);

		$query = mysqli_query($db, "SELECT * FROM `register` WHERE `user_name` = '$username' AND `password` = '$password'");
		$result = mysqli_fetch_assoc($query);
		if (empty($_POST['login']) || empty($_POST['password']))
			$errors[] = "Одно из полей не было заполнено";
		else if ($result == NULL)
			$errors[] = "Логин или пароль неверный";
		else if ($result['act_email'] == 0)
			$errors[] = "Аккаунт не активирован";

		if (empty($errors))
		{
			$_SESSION['admin'] = $result['admin'];
			$_SESSION['user_name'] = $result['user_name'];

			echo("<script>location.href = '/index.php';</script>"); 
		}
	}
?>
<?php include "block/header.php"; ?>
	<div id="menu">
		<?php require_once 'block/menu.php';?>
	</div>
	<div id="content">
	<?php
	if (isset($errors))
		echo $errors[0] . "<hr>";
	if (isset($_GET['email']))
	{
		$query = "SELECT * FROM `register` WHERE `hash_email` = '".$_GET['email']."'";
		$result = mysqli_query($db, $query);
		$cat = mysqli_fetch_assoc($result);
		if ($cat['act_email'] == 0 && mysqli_num_rows($result) == 1)
		{
			echo 'Аккаунт '; ?><span style="color: #FF4500"><?php echo $cat['user_name'];?> </span> <?php  echo ' успешно активирован.';
			?> <hr style="background-color: green"><?php
			$query = "UPDATE `register` SET `act_email` = 1 WHERE `id` = '".$cat['id']."'";
			mysqli_query($db, $query);
		}
		else
			echo "Данный код активации уже не действителен либо неверный.<hr>" ;
	}
	?>
			<content>
			<form method="POST">
				<fieldset style="width: 300px; margin-left: 200px;">
					<legend>Авторизация</legend>
					<p>Введите логин:</p>
					<input type="text" name="login" value="<?php if (isset($_POST['login'])) { echo $_POST['login']; } ?>">
					<p>Введите пароль:</p>
					<input type="password" name="password">
					<button type="submit" name="submit" style="margin-left: 40%;">Войти</button>
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
