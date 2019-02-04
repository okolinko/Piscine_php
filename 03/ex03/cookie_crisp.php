<?php
if ($_GET['action'] == 'set')
{
    if ($_GET['name'])
    {
        setcookie($_GET['name'], $_GET['value']);
    }
}
elseif ($_GET['action'] == 'get')
{
    echo $_COOKIE[$_GET['name']];//После передачи клиенту cookie  доступны через массив $_COOKIE при следующей загрузке страницы
}
elseif ($_GET['action'] == 'del')
{
    if ($_GET['name'])
    {
        setcookie($_GET['name'], '');
    }
}
?>