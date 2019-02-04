<?php
if (($_SERVER['PHP_AUTH_USER'] != "zaz") || ($_SERVER['PHP_AUTH_PW'] != "jaimelespetitsponeys"))
{
    header('HTTP/1.0 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="My Realm"');
    echo "<html><body>Sorry. but you don`t have login!</body></html>\n";
    exit (1);
}
else
{
    $file = file_get_contents('../image/42.png');
    echo "<html><body>Hello Zaz<br>\n<img src='data:image/png;base64,".base64_encode($file)."'>\n</body></html>\n";//base64_encode — Кодирует данные в формат MIME base64
}
//Переменная $_SERVER - это массив, содержащий информацию, такую как заголовки, пути и местоположения скриптов
//header("HTTP/1.0 401 Unauthorized"); отправляет 401 код статуса неавторизованного на сервер, говорящий, что вам не разрешено просматривать страницу
//WWW-AuthenticateЗаголовок ответа HTTP определяет метод аутентификации, который следует использовать для получения доступа к ресурсу.
?>
