<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'db_pdo';

//set dsn
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

//create a pdo instance
$pdo = new PDO($dsn, $user, $password);

//set attribute for pdo
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// PDO Query Method
// $stmt = $pdo->query('SELECT * FROM posts');

// while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {
//     echo 'Book Title : '.$row['title'] . '<br>';
// }

// while ($row = $stmt->fetch(PDO :: FETCH_OBJ)) {
//     echo 'Book Title : '.$row->title . '<br>';
// }

//PDO Prepared Statement (prepare & execute)

// UNSAFE WAY
// $sql = "SELECT * FROM posts WHERE author = '$author'";

//User input example
// $author = 'John';
// $is_published = true;
// $id = 1;

# Fetch Mutliple Posts

//Positional Params ( ? )
//The params that has sign ? must be ordered with true position/index, it's very sensitif
// $sql = 'SELECT * FROM posts WHERE author = ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author]);
// $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

// //Named Params ( : )
// $sql = 'SELECT * FROM posts WHERE author = :author && is_publish = :is_published';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['author' => $author, 'is_published' => $is_published]);
// $posts = $stmt->fetchAll(PDO::FETCH_OBJ);

// // var_dump($posts);
// foreach ($posts as $post) {
//     echo $post->title.'<br>';
// }

# FETCH SINGLE POST
// $sql = 'SELECT * FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $posts = $stmt->fetch(PDO::FETCH_OBJ);

// echo $posts->body;

# GET ROW COUNT
// $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = :author');
// $stmt->execute(['author' => $author]);
// $postCount = $stmt->rowCount();

// echo $postCount;

// # INSERT DATA
// $title = 'Java App Spring';
// $body = 'Ultimate guide springboot for java developer';
// $author = 'Ravi';

// $sql = 'INSERT INTO posts (title, body, author) VALUE (:title, :body, :author)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
// echo 'Post Added';

# UPDATE DATA
// $id = 5;
// $body = 'The updated catalog books';

// $sql = 'UPDATE posts SET body = :body WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['body' => $body, 'id' => $id]);
// echo 'Post Updated';

# DELETE DATA
// $id = 5;

// $sql = 'DELETE FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// echo 'Post Deleted';

# SEARCH DATA
$search = "%cra%";

$sql = 'SELECT * FROM posts WHERE title LIKE :search';
$stmt = $pdo->prepare($sql);
$stmt->execute(['search' => $search]);
$posts = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($posts as $post) {
    echo $post->title.'<br>';
}
