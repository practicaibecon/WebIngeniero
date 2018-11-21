<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}


$servername = "localhost";
$username = "root";
$password = "t00r";
$dbname = "llorens";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$condicion = $_POST['condicion'];
$comments=$_POST['comments'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

$sql="INSERT INTO `llorens`.`contacto` (\n".
"	`nombre`,\n".
"	`email`,\n".
"	`telefono`,\n".
"	`origen`,\n".
"	`tipo_consulta`,\n".
"	`consulta` \n".
")\n".
"VALUES\n".
"	(\n".
"		'" . $nombre . "',\n".
"		'" . $email . "',\n".
"		'" . $telefono . "',\n".
"		'" . $condicion . "',\n".
"		'prueba',\n".
"	'" . $comments . "' \n".
"	);";

if ($conn->query($sql) === TRUE)
{
    echo "New record created successfully " . $sql;
}
else
    {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>