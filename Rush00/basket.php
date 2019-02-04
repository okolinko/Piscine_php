<?php
	require_once 'db.php';
	require_once 'functions.php';
    deleteElemBasket();
    include "block/header.php"; 
    ?>
	<div id="menu">
        <?php require_once 'block/menu.php';?>
	</div>
	<div id="content">
    <?php
        if (!empty($_SESSION['basket']))
        {
    ?>
    	<p style="margin-left: 20px"><strong>Ваши покупки:</strong></p>
            <table>
            <th>№</th>
            <th>Название</th>
            <th>Цена(грн)</th>
            <th style="padding: 0">К-ство</th>
            <th>Общая сумма</th>
            <th style="color: red">X</th>
    <?php
        }
            $num = 0;
            $summa = 0; 
        if (empty($_SESSION['basket']))
            echo "У вас пока что нет покупок.";
        else
        {
            foreach ($_SESSION['basket'] as $id => $count)
            {
                $num++;
                $query = "SELECT * FROM `product` WHERE `id` = '$id'";
                $query = mysqli_query($db, $query);
                if (mysqli_num_rows($query))
                {
                    $mas = mysqli_fetch_assoc($query);
                    ?>
                    <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $mas['name']; ?></td>
                    <td><?php echo $mas['price']; ?></td>
                    <td><?php echo $count;?></td>
                    <td><?php echo $mas['price']*$count; ?></td>
                    <td>
                    <form method="post" name="123" value="555">
                    <button type="submit" name="delete" value="<?php echo $mas['id']; ?>">x</button>    
                    </form></td>
                    </tr>
                    <?php
                    $summa += $mas['price']*$count;
                }
            }
        }
        if (!empty($_SESSION['basket']))
        {
            ?>
            </table>
            <hr style="background-color: #A9D0A9">
            <p style="margin-left: 20px"><strong>Общая сумма: <?php echo $summa; ?> грн.</strong></p>
            <?php
         }
            if (!isset($_SESSION['user_name']) AND !empty($_SESSION['basket']))
            {
            ?>
                <p style="text-align: center; color: #ff776b;"><strong>Для покупок товара просим Вас авторизироваться.</strong></p>
            <?php
            }
            else if ($summa == 0)
                ;
            else
            {
                ?>
                <br>
                <fieldset style="width: 300px; margin: 0 auto;">
                <legend>Форма оплаты и отправки заявки</legend>
                <form method="POST" action="makebuy.php"> 
                <p style="margin-left: 20px">Адрес доставки<span style="color: red;">*</span>:</p>
                <input class="buy-text" type="text" name="text" maxlength="20"><br>
                <p style="margin-left: 20px">Желаемый вид оплаты:</p>
                <input style="margin-left: 20px" type="radio" name="login" value="<?php echo $_SESSION['user_name']?>" checked>
                <img src="img/visa.jpg" style="width="100px"; height="50px";">
                <input type="radio" name="login" value="<?php echo $_SESSION['user_name']?>"><br>
                <content style="padding-left: 85px"><button class="button-buy" name="button" value="<?php echo $summa;?>" style="vertical-align: middle;">Оформить заказ</button></content>
                </form>
                </fieldset>
            <?php
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
