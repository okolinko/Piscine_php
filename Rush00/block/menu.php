<a href="/index.php"><div class="menubutton regtext">Главная</div></a>
<a href="/index.php?page=1&id=1"><div class="menubutton regtext">Телефоны</div></a>
<a href="/index.php?page=1&id=2"><div class="menubutton regtext">Планшеты</div></a>
<a href="/index.php?page=1&id=3"><div class="menubutton regtext">Аксесуары</div></a>
<div class="emptyspace"></div>
<?php if (!empty($_SESSION['admin']) AND $_SESSION['admin'] == 1): ?>
    <a href="admin.php"><div class="menubutton regtext">Админ панель</div></a>
<?php endif; ?>
<?php if (isset($_SESSION['user_name'])): ?>
    <a href="logout.php"><div class="menubutton regtext">Выход</div></a>
<?php else: ?>
    <a href="auth.php"><div class="menubutton regtext">Авторизация</div></a>
    <a href="register.php"><div class="menubutton regtext">Регистрация</div></a>
<?php endif; ?>
<div class="emptyspace"></div>
<a href="block/contacts.php"><div class="menubutton regtext"> Контакты</div> </a>
