<?php
require_once 'db.php';
unset($_SESSION['user_name']);
unset($_SESSION['admin']);
echo("<script>location.href = '/index.php';</script>"); 
?>