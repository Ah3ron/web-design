<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вывод данных пользователя</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Данные пользователя</h1>
    <table>
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td>Имя</td>
            <td><?php echo htmlspecialchars($_POST['name']); ?></td>
        </tr>
        <tr>
            <td>Логин</td>
            <td><?php echo htmlspecialchars($_POST['login']); ?></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><?php echo htmlspecialchars($_POST['password']); ?></td>
        </tr>
        <tr>
            <td>Электронная почта</td>
            <td><?php echo htmlspecialchars($_POST['email']); ?></td>
        </tr>
        <tr>
            <td>Иностранные языки</td>
            <td>
                <?php
                    if (isset($_POST["Russian"])) echo $_POST["Russian"] . "<br>";
                    if (isset($_POST["English"])) echo $_POST["English"] . "<br>";
                    if (isset($_POST["Germany"])) echo $_POST["Germany"] . "<br>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Пол</td>
            <td>
                <?php 
                    if (isset($_POST["sex"])){
                        echo $_POST["sex"];
                    } else{
                        echo " ";
                    } 
                ?> 
            </td>
        </tr>
        <tr>
            <td>Образование</td>
            <td>
                <?php
                    if (isset($_POST["education"])){
                        echo $_POST["education"];
                    } else{
                        echo " ";
                    }        
                ?>
            </td>
        </tr>
        <tr>
            <td>Город проживания</td>
            <td><?php echo $_POST["city"]; ?></td>
        </tr>
        <tr>
            <td>Профессия</td>
            <td><?php echo $_POST["profession"]; ?></td>
        </tr>
        <tr>
            <td>Вопрос пользователя</td>
            <td><?php echo $_POST["question"]; ?></td>
        </tr>
    </table>
</body>
</html>