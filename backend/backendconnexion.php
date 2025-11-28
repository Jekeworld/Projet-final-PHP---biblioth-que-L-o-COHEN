<?
    session_start();
    require_once 'database.php';

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $user = $_POST["user"];
        $password = $_POST["password"];

        if($user&&$password){
            $stmt = $pdo -> prepare("SELECT * FROM utilisateurs WHERE user = ?");
            
        }
    }
?>