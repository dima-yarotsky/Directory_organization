<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список отраслей</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .deleted {
            opacity: 0.5; /* изменение прозрачности для отображения удаленных записей */
        }
    </style>
    <script>
        function addNewInput() {
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'new_industry[]';
            newInput.placeholder = 'Новая отрасль';
            document.getElementById('newIndustries').appendChild(newInput);
        }

        function deleteRow(row) {
            row.classList.add('deleted');
        }
    </script>
</head>
<body>
<h1>Список отраслей</h1>

<?php
// Подключение к базе данных
$host = 'localhost';
$dbname = 'directory';
$user = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получение списка отраслей из базы данных
    $query = "SELECT * FROM industry";
    $result = $db->query($query);

    echo "<form method='post' action='save_industries.php'>";
    echo "<div id='newIndustries'>";
    echo "<input type='text' name='new_industry[]' placeholder='Новая отрасль'>";
    echo "</div>";
    echo "<br><br>";

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Название отрасли</th><th>Удалить запись</th></tr>";

    // Вывод списка отраслей в виде редактируемой таблицы
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td><button type='button' onclick='deleteRow(this.parentNode.parentNode)'>Удалить</button></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<br>";
    echo "<input type='button' value='Добавить еще' onclick='addNewInput()'>";
    echo "<input type='submit' value='Сохранить изменения'>";
    echo "</form>";

    $db = null; // Закрытие соединения с базой данных
} catch (PDOException $e) {
    die("Ошибка: " . $e->getMessage());
}
?>
</body>
</html>