<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список отраслей</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script>
        function deleteRow(row) {
            row.classList.add('deleted');
        }
    </script>
</head>
<body>
<h1>Список отраслей</h1>

<form method='post' action='save_industries.php'>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
        </tr>
        <?php
        global $db;
        require_once 'db.php';
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Получение списка отраслей из базы данных
            $query = "SELECT * FROM industry";
            $result = $db->query($query);

            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td><input type='text' name='industry_name[{$row['id']}]' value='{$row['name']}'></td>";
                echo "<td><button type='button' onclick='deleteRow(this.parentNode.parentNode)'>Удалить</button></td>";
                echo "</tr>";
            }

            $db = null;
        } catch (PDOException $e) {
            die("Ошибка: " . $e->getMessage());
        }
        ?>
        <tr>
            <td colspan='3'><input type='text' name='new_name[]' placeholder='New Name'></td>
        </tr>
    </table>
    <br>
    <input type='submit' value='Сохранить изменения'>
</form>
</body>
</html>
