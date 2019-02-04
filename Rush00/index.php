<?php
	require_once 'db.php';
	require_once 'functions.php';
	addToBasket($db);
	$_SESSION['page'] = 'index.php';
	empty($_COOKIE['select_page']) ? $_COOKIE['select_page'] = 8 : 0;
	empty($_COOKIE['select_sort']) ? $_COOKIE['select_sort'] = 'sort1' : 0;
	if (isset($_POST['button2']))
	{
		setcookie('select_page', $_POST['page']);
		if (isset($_GET['id']))
			echo "<script>location.href = '/index.php?id=". $_GET['id'] ."';</script>"; 
		else
			echo("<script>location.href = '/index.php';</script>"); 
	}
	else if (isset($_POST['button']))
	{
		setcookie('select_sort', $_POST['sort']);
		if (isset($_GET['id']))
			echo "<script>location.href = '/index.php?id=". $_GET['id'] ."';</script>"; 
		else
			echo("<script>location.href = '/index.php';</script>"); 
	}
	$where = "";
	if (isset($_GET['id']))
	{
	$where = "WHERE cat_id = ". $_GET['id'] ."";
	}

	if (isset($_COOKIE['select_sort']) && $_COOKIE['select_sort'] == 'sort1')
		$query = "SELECT * FROM `product` ".$where." ORDER BY `price` DESC";
	else if (isset($_COOKIE['select_sort']) && $_COOKIE['select_sort'] == 'sort2')
		$query = "SELECT * FROM `product` ".$where." ORDER BY `price` ASC";
	else if (isset($_COOKIE['select_sort']) && $_COOKIE['select_sort'] == 'sort3')
		$query = "SELECT * FROM `product` ".$where." ORDER BY `name` ASC";
	else
		$query = "SELECT * FROM `product` ".$where;

	$result = mysqli_query($db, $query);

	$mas = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<?php include "block/header.php"; ?>
	<div id="menu">
		<?php require_once 'block/menu.php';?>
	</div>
	<div id="content">
		<?php
		if (isset($_GET['buyname']))
		{
			?>
			<p class="product-buy">Товар <span style="color: #FF4500"><?php echo $_GET['buyname'];?> </span> успешно добавлен в корзину</p>
			<?php
		}
		?>
		<div class="product-page">
			<form method="POST">
				<select name="page">
				<option value="4" <?php if(isset($_COOKIE['select_page']) && $_COOKIE['select_page'] == 4){ echo ' selected';} ?> >4</option>
				<option value="8" <?php if(isset($_COOKIE['select_page']) && $_COOKIE['select_page'] == 8){ echo ' selected';} ?> >8</option>
				<option value="12" <?php if(isset($_COOKIE['select_page']) && $_COOKIE['select_page'] == 12){ echo ' selected';} ?> >12</option>
				</select>
				<button name="button2">OK</button>
			</form>
		</div>
		<div class="product-sort">
			<form method="POST">
				<select name="sort">
				<option value="sort1" <?php if(isset($_COOKIE['select_sort']) && $_COOKIE['select_sort'] == 'sort1'){ echo ' selected';} ?>>убыванию</option>
				<option value="sort2" <?php if(isset($_COOKIE['select_sort']) && $_COOKIE['select_sort'] == 'sort2'){ echo ' selected';} ?>>возрастанию</option>
				<option value="sort3" <?php if(isset($_COOKIE['select_sort']) && $_COOKIE['select_sort'] == 'sort3'){ echo ' selected';} ?>">названию</option>
				</select>
				<button name="button">OK</button>
			</form>
		</div>
	<?php require_once 'block/content_part.php';?>
	</div>
	<div id="footer">
		<p class="footer-text">© Интернет-магазин «Apple» 2019</p>
	</div>
</div>
 </body>
</html>



