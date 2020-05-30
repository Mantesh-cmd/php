<html>
<head>
<title>Docker App</title>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$servername = "php_mysql";
$username = "root";
$password = "edureka";
$dbname = "docker";
$name=$_POST["name"];
$phone=$_POST["phone"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO emp (name, phone)
VALUES ('".$name."', '".$phone."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully"."<br>";
    echo "<br>";
    echo "<b>Current employees are:</b><br>";
    echo "<br>";
    $mysql = 'SELECT name, phone FROM emp';
    $result = $conn->query($mysql);
    while ($row = $result->fetch_assoc()) {
	    echo $row['name']."  ".$row['phone']."<br>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
</head>
<body>
        <h1>New Employee</h1>
        <form action="index.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone"><br><br>
                <input type="submit" name="submit">
        </form>
</body>
</html>

