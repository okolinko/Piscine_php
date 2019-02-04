<?php 
function get_users($db)
{
	$sql = "SELECT * FROM register";
	$result = mysqli_query($db, $sql);
	$cat = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $cat;
}
function getClean($value = "")
{
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
	return $value;
}

function rand_hash($count = 5)
{
	$outstr = '';
	$i = -1;
	$str = "abcdefghijklmnopqrstuvwxyz1234567890";
	while (++$i < $count)
		$outstr .= $str{rand(0, 35)};
	return $outstr;
}

function deleteElemBasket()
{
	$on = 0;
	 if (isset($_POST['delete']) AND isset($_SESSION['basket']))
        {
            foreach ($_SESSION['basket'] as $id => $count)
            {
                if ($id == $_POST['delete'])
                {
                    if ($count == 1)
                        unset($_SESSION['basket'][$id]);
                    else
                        $_SESSION['basket'][$id] -= 1;
                }
            }
        }
}

function addToBasket($db)
{
	if (isset($_GET['add_basket']))
	{
		if (is_numeric($_GET['add_basket']))
		{
			$basket_id = (int)getClean($_GET['add_basket']);
			$query = "SELECT * FROM `product` WHERE `id` = '$basket_id'";
			$query = mysqli_query($db, $query);
			if (mysqli_num_rows($query))
			{
				if (empty($_SESSION['basket']))
					$_SESSION['basket'] = [];
				if (!array_key_exists($basket_id, $_SESSION['basket'])) 
					$_SESSION['basket'] += [$basket_id => 1];
				else
					foreach ($_SESSION['basket'] as $key => $value)
						if ($key == $basket_id)
							$_SESSION['basket'][$key] += 1;
			}
		}
	}
}

function checkSession($db)
{
	$mas = get_users($db);
	if (isset($_SESSION['user_name']))
	{
		foreach ($mas as $key)
 			if ($_SESSION['user_name'] == $key['user_name'])
				return ;
		echo("<script>location.href = '/logout.php';</script>");
	}
}
?>