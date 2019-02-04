<?php

	$increment = 0;
	$global_increment = 0;
	$plus = 0;
	isset($_GET['id']) ? $id_input = "&id=" . $_GET['id'] : $id_input = "";
	$style = "style=\"margin-top: 20px;\"";

	$num_page = 1;
	if (isset($_GET['id']))
		$query = "SELECT * FROM `product` WHERE `cat_id` = '".$_GET['id']."'";
	else
		$query = "SELECT * FROM `product`";
	$query = mysqli_query($db, $query);
	$count = mysqli_num_rows($query);
	$count_on_page = $_COOKIE['select_page'];
	isset($_GET['page']) ? $num_page = $_GET['page'] : 0;
	isset($_GET['page']) ? $get_page = $_GET['page'] : $get_page = 1;
	$max_pages = ceil($count / $count_on_page);
	if (isset($_GET['page']) && $_GET['page'] > $max_pages)
		echo("<script>location.href = '/index.php';</script>"); 
	foreach($mas as $value)
	{
		$global_increment++;
		if ($global_increment > $num_page * $count_on_page - $count_on_page && $plus < $count_on_page)
		{
			$plus++;
			$increment++;
			if ($increment > 3)
				$style = "";
				?>
				<div class="product" <?php echo $style; ?> >
				<div class="product-name"><?php echo $value['name']; ?></div>
				<div class="product-img"><img src="<?php echo $value['img']; ?>" width="100px" height="130px"></div>
				<div class="product-price">Цена: <?php echo $value['price']; ?>грн</div>
				<a href="<?php echo $_SESSION['page']; ?>?add_basket=<?php echo $value['id']; 
				if (isset($_GET['page'])) echo "&page=" . $_GET['page'];
				if (isset($_GET['id'])) echo "&id=" . $_GET['id']; echo "&buyname=" . $value['name'];?>">
					<div class="product-button">
						<img src="img/buybutton.png" width="80px" height="20px">
					</div>
				</a>
			</div>
			<?php 
			}
		}
			?>
		<div class="pagination">
		<a href="index.php?page=<?php echo 1 . $id_input ?>">1</a>
		<?php if ($get_page > 1): ?>
		<a href="index.php?page=<?php echo $get_page - 1 . $id_input; ?>"><<</a>
		<?php endif; ?>
		<?php
		if ($get_page > 1 && $get_page < $max_pages)
			echo $get_page;
		?>
		<?php if ($get_page < $max_pages): ?>
		<a href="index.php?page=<?php echo $get_page + 1 . $id_input; ?>">>></a>
		<?php endif; ?>
		<?php if ($count > $count_on_page): ?>
		<a href="index.php?page=<?php echo $max_pages . $id_input; ?>"><?php echo $max_pages; ?></a>
		<?php endif; ?>
	</div>