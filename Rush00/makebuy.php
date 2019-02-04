<?php
	require_once 'db.php';
	require_once 'functions.php';


?>
<?php include "block/header.php"; ?>
	<div id="menu">
        <?php require_once 'block/menu.php';?>
	</div>
	<div id="content">
    <?php
    if (isset($_POST['button']) AND !empty($_POST['text']) AND isset($_POST['login']))
    {
		?>
		<fieldset>
			<p style="text-align: center; color: #13c76f;">Ваш заказ принят и отправлен администрации на обработку. Хорошего дня.</p>
		</fieldset>
		<?php
    	$query = "INSERT INTO `order_shop` SET `adress` = '".$_POST['text']."', `summa` = '".$_POST['button']."', `name` = '".$_POST['login']."'";
    	mysqli_query($db, $query);
        unset($_SESSION['basket']);
    }
    else
        echo("<script>location.href = '/basket.php';</script>"); 
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
