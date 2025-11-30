<?php
require __DIR__ . '/../config/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

class Database {
    private static $pdo = null;

    public static function connection() {
        if (self::$pdo === null) {

            $host = $_ENV["DB_host"];
            $name = $_ENV["DB_name"];
            $user = $_ENV["DB_user"];
            $pass = $_ENV["DB_pass"];
            $charset = 'utf8mb4';

            try {
                self::$pdo = new PDO(
                    "mysql:host=$host;dbname=$name;charset=$charset",
                    $user,
                    $pass
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {
                die("Could not connect to the database $name : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>