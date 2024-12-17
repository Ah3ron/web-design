<?php
$servername = "localhost"; // Имя сервера
$username = "root";        // Имя пользователя
$password = "";            // Пароль
$dbname = "employee";      // Имя базы данных

// Установить соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверить соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Установка кодировки
$conn->set_charset("utf8mb4");

$sql = "SELECT name, employeeID FROM employee";
$result = $conn->query($sql);

echo "<h3>а) Все работники (имя и табельный номер):</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . " - Employee ID: " . $row["employeeID"] . "<br>";
    }
} else {
    echo "No results found.<br>";
}


$sql = "SELECT employeeID, name FROM employee WHERE job = 'Программист'";
$result = $conn->query($sql);

echo "<h3>б) Программисты:</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Employee ID: " . $row["employeeID"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "No results found.<br>";
}

$sql = "SELECT * FROM assignment WHERE employeeID = 6651 AND hours > 8";
$result = $conn->query($sql);

echo "<h3>в) Рабочие дни с более 8 часов для работника 6651:</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Client ID: " . $row["clientID"] . ", Work Date: " . $row["workdate"] . ", Hours: " . $row["hours"] . "<br>";
    }
} else {
    echo "Результат не найден.<br>";
}

$sql = "SELECT COUNT(DISTINCT job) AS distinct_jobs FROM employee";
$result = $conn->query($sql);

echo "<h3>г) Количество различных должностей:</h3>";
if ($row = $result->fetch_assoc()) {
    echo "Distinct Jobs: " . $row["distinct_jobs"] . "<br>";
}

$sql = "SELECT COUNT(*) AS num_employees, job FROM employee GROUP BY job";
$result = $conn->query($sql);

echo "<h3>д) Количество работников по каждой должности:</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Job: " . $row["job"] . " - Number of Employees: " . $row["num_employees"] . "<br>";
    }
} else {
    echo "No results found.<br>";
}

$sql = "SELECT job, name FROM employee GROUP BY job HAVING COUNT(*) = 1";
$result = $conn->query($sql);

echo "<h3>е) Работники, единственные на своей должности:</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Job: " . $row["job"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "No results found.<br>";
}

$sql = "SELECT * FROM employee ORDER BY job ASC, name DESC";
$result = $conn->query($sql);

echo "<h3>ж) Работники (сортировка по должности и имени):</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Employee ID: " . $row["employeeID"] . ", Name: " . $row["name"] . ", Job: " . $row["job"] . "<br>";
    }
} else {
    echo "No results found.<br>";
}

$sql = "SELECT * FROM employeeSkills LIMIT 5";
$result = $conn->query($sql);

echo "<h3>з) Первые пять записей из таблицы employeeSkills:</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Employee ID: " . $row["employeeID"] . ", Skill: " . $row["skill"] . "<br>";
    }
} else {
    echo "No results found.<br>";
}

$conn->close();
?>
