<?php
global $db;
require_once 'db.php';

try {
    // Получение списка отраслей из базы данных
    $query = "SELECT * FROM industry";
    $result = $db->query($query);

    // Вывод списка отраслей
    echo "<h1>Отрасли</h1>";
    echo "<ul>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<li><a href='organizations.php?industry=" . $row['id'] . "'>" . $row['название'] . "</a></li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}
