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

// Получение данных из формы
$isbn = $connection->real_escape_string($_POST["isbn"]);
$author = $connection->real_escape_string($_POST["author"]);
$title = $connection->real_escape_string($_POST["title"]);
$price = $connection->real_escape_string($_POST["price"]);

// Вставка данных в таблицу
$query = "INSERT INTO Books (ISBN, Author, Title, Price) VALUES ('$isbn', '$author', '$title', '$price')";

if ($connection->query($query) === TRUE) {
    echo "<p>Книга успешно добавлена!</p>";
    echo '<a href="show.php">Посмотреть список всех книг</a>';
} else {
    echo "<p>Ошибка: " . $connection->error . "</p>";
}

$connection->close();
?>
