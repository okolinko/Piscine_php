<?php
	require_once 'db.php';
	require_once 'functions.php';

	if (isset($_POST['submit']))
    {
		$_POST['name'] = getClean($_POST['name']);
		$_POST['category'] = getClean($_POST['category']);
		$_POST['price'] = getClean($_POST['price']);
		$errors = [];
		if (empty($_POST['name']) || empty($_POST['category']) || empty($_POST['price']))
			$errors[] = "Одно из полей не было заполнено";
		if(empty($_FILES['image']['name']))
			$errors[] = "Изображение не было добавлено";
		if (!preg_match("/^[0-9]+/", $_POST['price']))
			$errors[] = "Некорректный воод цены";

		if (empty($errors))
		{
			$name_img = rand_hash(12).'.png';
			$send_img = 'appleimg/'.$name_img;
			$uploads_dir = DIR.'/appleimg/'.$name_img;
			move_uploaded_file(($_FILES['image']['tmp_name']), $uploads_dir);

			$query = "INSERT INTO `product` SET `name` = '".$_POST['name']."' , 
			`cat_id` = '".$_POST['category']."', `price` = '".$_POST['price']."', `img` = '$send_img'";
			$query = mysqli_query($db, $query);
		}
	}
?>
<?php include "block/header.php"; ?>
	<div id="menu">
        <?php require_once 'block/menu.php';?>
	</div>
	<div id="content">
    <?php
	if (isset($_POST['submit']))
		if (empty($errors))
			echo "Товар успешно добавлен";
		else
			echo $errors[0];
	
    if (isset($_POST['delete_user']))
    {
    	$query = "SELECT * FROM `register` WHERE `user_name` = 'admin'";
    	$query = mysqli_query($db, $query);
    	if ($_POST['delete_user'] == 'admin' || $_SESSION['user_name'] == $_POST['delete_user'])
    		echo "Нельзя удалить главного админа или себя.";
    	else
    	{
    		$query = "DELETE FROM `register` WHERE `user_name` = '".$_POST['delete_user']."'";
    		$query = mysqli_query($db, $query);
    		echo "Пользователь " . $_POST['delete_user'] . " успешно удален.";
    	}
    }
    else if (isset($_POST['delete_order']))
    {
		$query = "DELETE FROM `order_shop` WHERE `id` = '".$_POST['delete_order']."'";
		$query = mysqli_query($db, $query);
		echo "Заказ #" . $_POST['delete_order'] . " успешно обработан.";
	}
	else if (isset($_POST['delete_product']))
    {
		$query = "DELETE FROM `product` WHERE `id` = '".$_POST['delete_product']."'";
		$query = mysqli_query($db, $query);
		echo "Това #" . $_POST['delete_product'] . " успешно удален из каталога.";
    }
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
    	{
    		$query = "SELECT * FROM `register`";
    		$query = mysqli_query($db, $query);
    		if (mysqli_num_rows($query) > 0)
    		{
    ?>		
    		<p style="text-align: center;"><strong>Список пользователей сайта</strong></p>
	    	<table>
	    	<tr>
	        <th>ID</th>
	        <th>Логин</th>
	        <th>Админ</th>
	        <th>Активирован</th>
	        <th style="color: red">X</th>
	    	</tr>
    <?php
    		$mas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    		foreach ($mas as $key)
    		{
    		?>
	    		<tr>
		        <td><?php echo $key['id'];?></td>
		        <td><?php echo $key['user_name'];?></td>
		        <td><?php echo $key['admin'];?></td>
		        <td><?php echo $key['act_email'];?></td>
		        <td>
		        	<form method="POST"><button type="submit" name="delete_user" value="<?php echo $key['user_name']; ?>">x</button> </form>
		        </td>
		    	</tr>
    		<?php
    		}
    		?>
    			</table>
    		<?php
    		}
    		else
    			echo "Список пользователей пуст.";

    		$query = "SELECT * FROM `order_shop`";
    		$query = mysqli_query($db, $query);
    		if (mysqli_num_rows($query) > 0)
    		{
    ?>
    		<p style="text-align: center;"><strong>Список поданых заявок на покупки</strong></p>
	    	<table>
	    	<tr>
	  		<th>ID</th>
	        <th>Клиент</th>
	        <th>Адрес</th>
	        <th>Сумма</th>
	        <th style="color: green">OK</th>
	    	</tr>
    <?php
    		$mas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    		foreach ($mas as $key)
    		{
    		?>
	    		<tr>
	    		<td><?php echo $key['id'];?></td>
		        <td><?php echo $key['name'];?></td>
		        <td><?php echo $key['adress'];?></td>
		        <td><?php echo $key['summa'];?></td>
		        <td>
		        	<form method="POST"><button type="submit" name="delete_order" value="<?php echo $key['id']; ?>">
		        		<img src="img/success.jpg" width="15px" height="15px">
		        	</button> </form>
		        </td>
		    	</tr>
    <?php
    		}
    ?>
    			</table>
    <?php
    		}
    ?>
            <fieldset style="margin-left: 114px; width: 450px; margin-top: 10px;">
			<legend>Добавить товар</legend>
				<form method="post" enctype="multipart/form-data">
					<p>Введите название товара:</p>
					<input type="text" name="name" maxlength="12">
					<p>Выберите категорию:</p>
					<select name="category">
					<option selected value="1">Телефоны</option>
					<option value="2">Планшеты</option>
					<option value="3">Аксесуары</option>
					</select>
					<p>Цена товара:</p>
					<input type="text" name="price" maxlength="6">
					<p>Добавить изображение:</p>
					<input style="display: block; margin-bottom: 5px;" type="file" name="image">
				<input style="width: 100px; height: 20px;" type="submit" name="submit" value="Добавить товар">
				</form>
			</fieldset>
			<?php
			$query = "SELECT * FROM `product`";
			$query = mysqli_query($db, $query);
			$mas = mysqli_fetch_all($query, MYSQLI_ASSOC);
			if (mysqli_num_rows($query) > 0)
			{
			?>
			<p style="text-align: center;"><strong>Удалить товар</strong></p>
	    	<table style="margin-bottom: 20px">
	    	<tr>
	  		<th>ID</th>
	        <th>Наименование</th>
	        <th>Категория</th>
			<th>Фото</th>
	        <th style="color: red">X</th>
	    	</tr>
            <?php
				foreach ($mas as $key)
				{
				?>
					<tr>
					<td><?php echo $key['id'];?></td>
					<td><?php echo $key['name'];?></td>
					<td><?php echo $key['cat_id'];?></td>
					<td><img src="<?php echo $key['img']?>" width="35px" heigth="35px"></td>
					<td>
						<form method="POST"><button type="submit" name="delete_product" value="<?php echo $key['id']; ?>">x</button> </form>
					</td>
					</tr>
				<?php
				}
    		?>
    			</table>
    		<?php
			}
    	}
    ?>
	</div>
	<div class="clear">
	</div>
	<div id="footer">
		<p class="footer-text">© Интернет-магазин «Apple» 2019</p>
	</div>
</div>
 </body>
</html>