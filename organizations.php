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
    // Получение выбранной отрасли из параметра URL
    $industryId = $_GET['industry'];

    // Получение списка организаций для выбранной отрасли
    $query = "SELECT organization.name , organization.adress, industry.name AS indname
FROM organization
JOIN industry ON organization.industry_id = industry.id
WHERE industry.id = :industryId;";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':industryId', $industryId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<h1>" . $row['indname'] . "</h1>";
        break;
    }
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
