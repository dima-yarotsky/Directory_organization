<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Справочник организаций</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
global $db;
require_once 'db.php';

try {
    $query = "SELECT * FROM organization";
    $result = $db->query($query);

    echo "<h1>Организации</h1>";
    echo "<table>";
    echo "<tr><th>Название</th><th>Адрес</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['adress'] . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}
?>
</body>
</html>
