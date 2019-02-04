<!DOCTYPE>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Интернет магазин Apple</title>
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
  <link href="style.css" type="text/css" rel="stylesheet">
 </head>
 <body>
  <div id="wrapper">
        <div id="header" style="height: 17%; min-height: 150px">
            <div>
                <div style="display: flex;justify-content: space-around width: 100%;">
                    <div style="display: flex; justify-content: center;">
                        <img src="img/apple1.jpg" class="imgblock1" ">
                    </div>
                    <div style="display: flex; justify-content: center">
                        <img src="img/apple2.jpg" class="imgblock2">
                    </div>
                </div>
            </div>
  <?php if (isset($_SESSION['user_name'])): ?>
  <div class="usertext">Приветствуем вас, <?php echo $_SESSION['user_name'].'!';?></div>
  <?php else: ?>
  <div class="usertext">Приветствуем вас, <span style="color: white">гость</span>!</div>
  <?php endif; ?>
   <a href="basket.php">
    <div class="basket"><img src="img/trash.png" style="width: 70px; height: 70px;">
     <div class="basket-count">
      <?php
       $sum = 0;
       if (!empty($_SESSION['basket']))
        foreach ($_SESSION['basket'] as $key => $value)
        {
         $sum += $value;
        }
       if ($sum)
        echo $sum;
      ?>
     </div>
    </div>
   </a>
 </div>