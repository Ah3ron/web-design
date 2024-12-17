<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск книги</title>
</head>
<body>
    <h1>Поиск книги в каталоге</h1>
    <form action="results.php" method="POST">
        <label for="searchtype">Выберите параметр поиска:</label><br>
        <select name="searchtype" id="searchtype">
            <option value="Author">Автор</option>
            <option value="Title">Заголовок</option>
            <option value="ISBN">ISBN</option>
        </select><br><br>

        <label for="searchterm">Введите параметры поиска:</label><br>
        <input type="text" name="searchterm" id="searchterm" required><br><br>

        <input type="submit" value="Поиск">
    </form>
</body>
</html>
