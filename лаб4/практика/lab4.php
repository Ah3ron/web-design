<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
        <tr>
            <td><input type="number" name="num1"></td>
            <td><input type="number" name="num2"></td>
        <tr>
        <tr>
            <td>
                <input type="radio" name="expression" value="+" required>Сложение <br>
                <input type="radio" name="expression" value="-" required>Вычитание<br>
                <input type="radio" name="expression" value="*" required>Умножение<br>
                <input type="radio" name="expression" value="/" required>Деление<br>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Вычесть"></td>
            <td>Результат:
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $num1 = isset($_POST["num1"]) ? floatval($_POST["num1"]) : 0;
                        $num2 = isset($_POST["num2"]) ? floatval($_POST["num2"]) : 0;
                        $expression = $_POST["expression"];
                        $res = 0;
                    
                        switch($expression){
                            case "+":
                                $res = $num1 + $num2;
                                echo $res;
                                break;
                            case "-":
                                $res = $num1 - $num2;
                                echo $res;
                                break;
                            case "*":
                                $res = $num1 * $num2;
                                echo $res;
                                break;
                            case "/":
                                if ($num2 == 0){
                                    echo "На ноль делить нельзя";
                                }
                                else{
                                    $res = $num1 / $num2;
                                    echo $res;
                                }
                                
                                break;                      
                        }                   
                    }
                ?> 
            </td>
        </tr>
        </table>
    </form>
    <?php
        foreach ($_POST as $k => $v)
            echo "<b>$k</b> => <tt>$v</tt><br>";
        echo "<br>";
        foreach ($_SERVER as $k => $v)
            echo "<b>$k</b> => <tt>$v</tt><br>";    
    ?>
</body>
</html>