<?php

require_once __DIR__ . '/../src/bootstrap.php';

$attr = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD,$attr);

    $sql  = 'INSERT INTO assets (json) VALUES (:json);';

    $query = $pdo->prepare($sql);

    $data = serialize($_POST['json']);

    $query->bindParam(':json', $data, PDO::PARAM_STR);

    $query->execute();
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
