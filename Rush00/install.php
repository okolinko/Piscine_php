<?php
	$wow = mysqli_connect("localhost", "root", "myroot");
	$val = mysqli_query($wow, "show databases like 'table'");
	$res = mysqli_num_rows($val);
	if (!$res)
	{

	$query = mysqli_query($wow, "CREATE DATABASE IF NOT EXISTS `table`");
	$wow = mysqli_connect("localhost", "root", "myroot", "table");

	$query = mysqli_query($wow, "CREATE TABLE IF NOT EXISTS `order_shop` (
        `name` varchar(255) NOT NULL,
  		`adress` varchar(255) NOT NULL,
  		`summa` int(11) NOT NULL,
  		`id` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8");


	$query = mysqli_query($wow, "INSERT INTO `order_shop` (`name`, `adress`, `summa`, `id`) VALUES
	('123', 'ул Пушкина', 46400, 14),
	('123', 'эрондондон', 35340, 15),
	('123', 'блабла', 254880, 16)");

	$query = mysqli_query($wow, "CREATE TABLE IF NOT EXISTS `product` (
	  `id` int(11) NOT NULL,
	  `name` varchar(255) NOT NULL,
	  `cat_id` int(11) NOT NULL DEFAULT '0',
	  `price` int(11) NOT NULL,
	  `img` varchar(255) NOT NULL
	  )ENGINE=InnoDB DEFAULT CHARSET=utf8");

	$query = mysqli_query($wow, "INSERT INTO `product` (`id`, `name`, `cat_id`, `price`, `img`) VALUES
	(1, 'iPhoneX', 1, 29990, 'appleimg/iphonex.jpg'),
	(2, 'iPhone 8', 1, 22000, 'appleimg/iphone8.jpg'),
	(4, 'Ipad 3', 2, 12200, 'appleimg/ipad1.jpeg'),
	(6, 'Ipad 4', 2, 11000, 'appleimg/ipad2.jpg'),
	(7, 'IPad Air 2', 2, 15000, 'appleimg/ipad3.jpg'),
	(22, 'Apple Ears', 3, 650, 'appleimg/ears1.jpg'),
	(23, 'Apple Airpods', 3, 4400, 'appleimg/ears2.jpg'),
	(24, 'Apple Watch', 3, 8200, 'appleimg/clock.jpg'),
	(25, 'Apple Charge', 3, 550, 'appleimg/block.jpg'),
	(26, 'Apple Cable', 3, 400, 'appleimg/cable.jpg'),
	(32, 'Iphone XS', 1, 44000, 'appleimg/iphonexs.jpg'),
	(33, 'Ipad Pro', 2, 14900, 'appleimg/ipadpro.jpg'),
	(299, 'IPad 3', 2, 1500, 'appleimg/0y7e9sfdgm7z.png'),
	(300, 'Ipad 2', 2, 2350, 'appleimg/ibzqgiywgf02.png'),
	(301, 'Чехол IphoneX', 3, 520, 'appleimg/saen2qzycgmn.png'),
	(302, 'Чехол Iphone 7', 3, 400, 'appleimg/6ajswl2acnqm.png'),
	(303, 'Чехол Iphone 6s', 3, 300, 'appleimg/g0dkxl2wg0gg.png'),
	(304, 'Iphone 4', 1, 1100, 'appleimg/ot9rbtpusf0b.png'),
	(305, 'Iphone 5', 1, 1850, 'appleimg/fq6edkf6w83n.png'),
	(306, 'Iphone 6s', 1, 4650, 'appleimg/qm2bm73dfabm.png')");

	$query = mysqli_query($wow, "CREATE TABLE IF NOT EXISTS `register` (
	  `id` int(11) NOT NULL,
	  `user_name` varchar(255) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `admin` int(11) NOT NULL,
	  `hash_email` varchar(255) NOT NULL,
	  `act_email` int(10) UNSIGNED NOT NULL,
	  `email` varchar(255) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8");

	$query = mysqli_query($wow, "INSERT INTO `register` (`id`, `user_name`, `password`, `admin`, `hash_email`, `act_email`, `email`) VALUES
	(27, 'Helper', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 1, '61547a0d', 1, 'lol@dsa.ds'),
	(38, 'admin', 'cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de', 1, '5deb80y8', 1, '834mag@skarblom.ua')
	");

	$query = mysqli_query($wow, "ALTER TABLE `order_shop` ADD PRIMARY KEY (`id`)");
	$query = mysqli_query($wow, "ALTER TABLE `product` ADD PRIMARY KEY (`id`)");
	$query = mysqli_query($wow, "ALTER TABLE `register` ADD PRIMARY KEY (`id`)");
	$query = mysqli_query($wow, "ALTER TABLE `order_shop` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78");
	$query = mysqli_query($wow, "ALTER TABLE `product` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307");
	$query = mysqli_query($wow, "ALTER TABLE `register` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48");
	}

?>

