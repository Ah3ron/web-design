<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Добавить книгу</title>
</head>
<body>
    <h1>Добавить новую книгу</h1>
    <form action="insert_book.php" method="post">
        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" required><br><br>

        <label for="author">Автор:</label><br>
        <input type="text" id="author" name="author" required><br><br>

        <label for="title">Название:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="price">Цена:</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <input type="submit" value="Добавить">
    </form>
</body>
</html>
