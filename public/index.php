<?php
    session_start();

    // Protéger l'accès (si pas connecté → retour au login)
    if (!isset($_SESSION["connected"])) {
        header("Location: login.php");
        exit;
    }

    // Récupérer le controller et l'action
    $controller = $_GET['controller'] ?? 'livre';
    $action = $_GET['action'] ?? 'liste';

    // Charger le contrôleur demandé
    $controllerFile = "../controller/" . ucfirst($controller) . "Controller.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        $controllerClass = ucfirst($controller) . "Controller";

        if (class_exists($controllerClass)) {
            $ctrl = new $controllerClass();

            if (method_exists($ctrl, $action)) {
                $ctrl->$action();
            } else {
                echo "Action '$action' introuvable.";
            }
        } else {
            echo "Contrôleur '$controllerClass' introuvable.";
        }

    } else {
        echo "Fichier contrôleur '$controllerFile' introuvable.";
    }
?>