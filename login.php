<?php
session_start();

// Проверка аутентификации пользователя
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['authenticated'] = true;
        header('Location: admin_page.php');
        exit();
    } else {
        echo 'Неверное имя пользователя или пароль';
    }
}
?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Страница авторизации</title>
    </head>
    <body>
    <h1>Авторизация</h1>
    <form method="POST" action="">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Войти">
    </form>
    </body>
    </html>
<?php
