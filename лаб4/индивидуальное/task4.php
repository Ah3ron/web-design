<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Установка контейнера с сеткой */
        .container {
            display: flex;
        }

        /* Размещение первой части формы и таблицы */
        .form-section {
            flex: 1;
            margin-right: 20px;
        }

        /* Размещение второй части формы и таблицы */
        .calculation-section {
            flex: 1;
        }
        


    </style>
</head>
<body>
    <div class="container">
        <!-- Первая часть формы и первая таблица -->
        <div class="form-section">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Номер счета: </td>
                        <td><input type="number" name="accnumber"></td>
                    </tr>
                    <tr>
                        <td>Баланс на начало месяца: </td>
                        <td><input type="number" name="openbalance"></td>
                    </tr>
                    <tr>
                        <td>Общая сумма по всем статьям расхода<br>для данного покупателя в этом месяце: </td>
                        <td><input type="number" name="totalsum1"></td>
                    </tr>
                    <tr>
                        <td>Общая сумма всех кредитов, отнесенная<br>на счет данного покупателя, в этом месяце: </td>
                        <td><input type="number" name="totalsum2"></td>
                    </tr>
                    <tr>
                        <td>Допустимый предельный размер кредита: </td>
                        <td><input type="number" name="creditlimit"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Расчет"></td>    
                    </tr>
                </table>
            </form>
            <table border="1" cellspacing="0">
                <tr>
                    <th colspan="2">Расчет введённых данных:</th>
                </tr>
                <tr>
                    <td>Номер счета: </td>
                    <td><?php echo $_POST["accnumber"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Начальный баланс: </td>
                    <td><?php echo $_POST["openbalance"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Общая сумму расходов: </td>
                    <td><?php echo $_POST["totalsum1"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Общая сумма кредита: </td>
                    <td><?php echo $_POST["totalsum2"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Предельный размер кредита: </td>
                    <td><?php echo $_POST["creditlimit"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Новый баланс: </td>
                    <td>
                        <?php 
                            $openbalance = $_POST["openbalance"] ?? "";
                            $totalsum1 = $_POST["totalsum1"] ?? "";
                            $totalsum2 = $_POST["totalsum2"] ?? "";
                            echo ($openbalance + $totalsum1 - $totalsum2); 
                        ?>
                    </td>
                </tr>
                <?php
                    $creditlimit = $_POST["creditlimit"] ?? "";
                    if($totalsum2 > $creditlimit){
                        echo "<tr><td colspan='2'>Предельный размер кредита превышен!</td></tr>";
                    }
                ?>
            </table>
        </div>
        
        <!-- Вторая часть формы и вторая таблица -->
        <div class="calculation-section">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Введите основную сумму ссуды: </td>
                        <td><input type="number" name="principal"></td>
                    </tr>
                    <tr>
                        <td>Введите процентную ставку: </td>
                        <td><input type="text" name="rate"></td>
                    </tr>
                    <tr>
                        <td>Введите срок ссуды в днях: </td>
                        <td><input type="number" name="days"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Расчет"></td>    
                    </tr>
                </table>
            </form>
            <table border="1" cellspacing="0">
                <tr>
                    <th colspan="2">Расчет введённых данных:</th>
                </tr>
                <tr>
                    <td>Основная сумма ссуды: </td>
                    <td><?php echo $_POST["principal"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Процентная ставка: </td>
                    <td><?php echo $_POST["rate"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Срок ссуды: </td>
                    <td><?php echo $_POST["days"] ?? ""; ?></td>
                </tr>
                <tr>
                    <td>Выплаты по простым процентам составляют: </td>
                    <td>
                        <?php 
                            $principal = $_POST["principal"] ?? "";
                            $rate = $_POST["rate"] ?? "";
                            $days = $_POST["days"] ?? "";
                            $interest = $principal * $rate * $days / 365;

                            echo "$" . $interest;
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>