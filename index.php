<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'db_pdo';

//set dsn
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

//create a pdo instance
$pdo = new PDO($dsn, $user, $password);

// PDO Query Method
$stmt = $pdo->query('SELECT * FROM posts');

// while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {
//     echo 'Book Title : '.$row['title'] . '<br>';
// }

while ($row = $stmt->fetch(PDO :: FETCH_OBJ)) {
    echo 'Book Title : '.$row->title . '<br>';
}