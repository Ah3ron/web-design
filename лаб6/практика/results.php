<?php
// Проверяем, что данные из формы отправлены
if (!isset($_POST['searchtype']) || !isset($_POST['searchterm'])) {
    die("Вы не ввели критерии поиска. Вернитесь назад и попробуйте ещё раз.");
}

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

// Получаем данные из формы и экранируем их
$searchtype = $connection->real_escape_string($_POST['searchtype']);
$searchterm = $connection->real_escape_string($_POST['searchterm']);

// Формируем SQL-запрос
$query = "SELECT * FROM Books WHERE $searchtype LIKE '%$searchterm%'";

// Выполняем запрос
$result = $connection->query($query);

// Проверяем наличие результатов
echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Результаты поиска книги</title>
</head>
<body>
    <h1>Результаты поиска книги</h1>';

if ($result->num_rows > 0) {
    echo "<p>Количество найденных книг: " . $result->num_rows . "</p>";
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
    echo '<p>Книги не найдены по заданному запросу.</p>';
}
echo "<a href='http://localhost/poisk.php'>Назад</a><br>";
echo "<a href='http://localhost/show.php'>Задание 6.4</a>";
echo '</body></html>';

$connection->close();
?>
