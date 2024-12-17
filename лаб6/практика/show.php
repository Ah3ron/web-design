<?php
// Подключение к базе данных
$localhost="localhost";
$username="root";
$password="";
$bookby="bookby";
$connection = new mysqli("$localhost", "$username", "$password", "$bookby");
if ($connection->connect_error) {
    die("Ошибка подключения: " . $connection->connect_error);
}

// Установка кодировки соединения
$connection->set_charset("utf8mb4");

// Запрос на получение всех книг
$query = "SELECT * FROM Books";
$result = $connection->query($query);

echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Список книг</title>
</head>
<body>
    <h1>Список всех книг</h1>';

if ($result->num_rows > 0) {
    echo '<table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>ISBN</th>
                <th>Автор</th>
                <th>Название</th>
                <th>Цена</th>
            </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . htmlspecialchars($row["ISBN"], ENT_QUOTES, 'UTF-8') . '</td>
                <td>' . htmlspecialchars($row["Author"], ENT_QUOTES, 'UTF-8') . '</td>
                <td>' . htmlspecialchars($row["Title"], ENT_QUOTES, 'UTF-8') . '</td>
                <td>' . htmlspecialchars($row["Price"], ENT_QUOTES, 'UTF-8') . '</td>
              </tr>';
    }
    echo '</table><br>';
} else {
    echo '<p>Книги не найдены.</p>';
}
echo "<a href='http://localhost/add_book.php'>Добавить книгу</a><br>";
echo '</body></html>';

$connection->close();
?>