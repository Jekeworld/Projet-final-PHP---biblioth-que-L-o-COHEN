<?php
    require __DIR__ . '/vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $host=$_ENV["DB_host"];
    $name=$_ENV["DB_name"];
    $user=$_ENV["DB_user"];
    $pass=$_ENV["DB_pass"];
    $charset = 'utf8mb4';

    try{
        $pdo = new PDO("mysql:host=$host; dbname=$name; charset=$charset", $user, $pass);
        $pdo -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die ("Could not connect to the database $name:" . $e->getMessage());
    }
?>