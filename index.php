<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "database1";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// //   // sql to create table
// //   $sql = "CREATE TABLE MyGuests (
// //   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// //   firstname VARCHAR(30) NOT NULL,
// //   lastname VARCHAR(30) NOT NULL,
// //   email VARCHAR(50),
// //   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// //   )";

// //   // use exec() because no results are returned
// //   $conn->exec($sql);
// //   echo "Table MyGuests created successfully";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }



// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "database1";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//   VALUES ('John', 'Doe', 'john@example.com')";
$stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests"); 
  // use exec() because no results are returned
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo("<table> <tr> <th>ID</th><th>name</th></tr>");
  foreach($rows as $row){
    echo("<tr>");
    echo("<th>");
    echo($row['id'] . ": " );
    echo("</th>");
    echo("<td>");
    echo($row['firstname']);
    echo("</td>");
    echo("</tr>");
  }
  echo("</table>");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();

}

$conn = null;

?>