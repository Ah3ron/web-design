<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма ввода персональных данных пользователя</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="reader2.php" method="post">
        <table class="table1" >
            <tr>
                <td>Введите ваше имя: </td>
                <td><input type="text" name="name"><font class="star">*</font><br><font class="star2"">Данное поле должно быть обязательно заполнено</font></td>
            </tr>
            <tr>
                <td>Введите ваш логин: </td>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <td>Введите ваш пароль: </td>
                <td><input type="password" name="password1"><font class="star">*</font><br><font class="star2"">Данное поле должно быть обязательно заполнено</font></td>
            </tr>
            <tr>
                <td rowspan="2">Подтвердите пароль: </td>
                <td><input type="password" name="password2"></td>
            </tr>
            <tr>
                
                <td>
                    <?php
                        if ($_POST["password1"] !== $_POST["password2"]){
                            echo "<font style='color: red;'>Введенные пароли отличаются</font>";
                        }
                        else{
                            echo " ";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Введите вашу почту: </td>
                <td><input type="email" name="email"><font class="star">*</font><br><font class="star2"">Данное поле должно быть обязательно заполнено</font></td>
            </tr>
            <tr>
                <td>Выбор иностранного языка:</td>
                <td>
                    <input type="checkbox" name="languages[]" value="Русский">Русский<br>
                    <input type="checkbox" name="languages[]" value="Английский">Английский<br>
                    <input type="checkbox" name="languages[]" value="Немецкий">Немецкий<br>
                </td>
            </tr>
            <tr>
                <td>Выбор пола: </td>
                <td>
                    <input type="radio" name="sex" value="Мужской">Мужской<br>
                    <input type="radio" name="sex" value="Женский">Женский<br>
                </td>
            </tr>
            <tr>
                <td>Образование: </td>
                <td>
                    <input type="radio" name="education" value="Среднее ">Среднее образование<br>
                    <input type="radio" name="education" value="Среднее специальное">Среднее специальное образование<br>
                    <input type="radio" name="education" value="Высшее">Высшее образование<br>
                </td>
            </tr>
            <tr>
                <td>Город проживания: </td>
                <td>
                    <select name="city">
                        <option value="Пинск">Пинск</option>
                        <option value="Слоним">Слоним</option>
                        <option value="Минск">Минск</option>
                        <option value="Гродно">Гродно</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Профессия: </td>
                <td>
                    <select name="profession">
                        <option value="Программист">Программист</option>
                        <option value="Экономист">Экономист</option>
                        <option value="Инженер">Инженер</option>
                        <option value="Слесарь">Слесарь</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Задайте интересующий<br> вас вопрос: </td>
                <td><textarea name="question" cols="20" rows="5"></textarea><font class="star">*</font><br><font class="star2"">Данное поле должно быть обязательно заполнено</font></td>
            </tr>

            <tr>
                <td><input type="submit" value="Отправить" name="button"></td>
                <td><input type="reset" value="Сбросить"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                           if (isset($_POST["name"])==null || $_POST["password1"]==null || $_POST["email"]==null || $_POST["question"]==null){
                            echo "<font style='color: red'>Поля: ФИО,  пароль пользователя, e-mail и <br>введенный пользователем вопрос - должны быть заполнены</font>";
                           }                 
                    ?>
                </td>
            </tr>

        </table>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST["name"]);
            $login = htmlspecialchars($_POST["login"]);
            $password1 = htmlspecialchars($_POST["password1"]);
            $password2 = htmlspecialchars($_POST["password2"]);
            $email = htmlspecialchars($_POST["email"]);
            $languages = isset($_POST["languages"]) ? implode(", ", array_map("htmlspecialchars", $_POST["languages"])) : "Не выбран";

            $sex = isset($_POST["sex"]) ? htmlspecialchars($_POST["sex"]) : "Не указан";
            $education = isset($_POST["education"]) ? htmlspecialchars($_POST["education"]) : "Не указано";

            $city = htmlspecialchars($_POST["city"]);
            $profession = htmlspecialchars($_POST["profession"]);
            $question = htmlspecialchars($_POST["question"]);
                echo "<h2>Введенные данные:</h2>";
                echo "<table>";
                echo "<tr><td>Ваше имя:</td><td>$name</td></tr>";
                echo "<tr><td>Ваш логин:</td><td>$login</td></tr>";
                echo "<tr><td>Ваш пароль:</td><td>$password1</td></tr>";
                echo "<tr><td>Подтверждение пароля:</td><td>$password2</td></tr>";
                echo "<tr><td>Ваша почта:</td><td>$email</td></tr>";
                echo "<tr><td>Язык(и):</td><td>$languages</td></tr>";
                echo "<tr><td>Ваш пол:</td><td>$sex</td></tr>";
                echo "<tr><td>Ваше образование:</td><td>$education</td></tr>";
                echo "<tr><td>Ваш город:</td><td>$city</td></tr>";
                echo "<tr><td>Ваша профессия:</td><td>$profession</td></tr>";
                echo "<tr><td>Ваш вопрос:</td><td>$question</td></tr>";
                echo "</table>";
        }
    ?>

    
</body>
</html>