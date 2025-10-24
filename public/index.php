<?php
/**
 * ServiceFlow - Ponto de Entrada Principal
 * Sistema de Gestão para Profissionais de Serviços
 */

// Configurações iniciais
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Definir constantes do projeto
define('ROOT_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);
define('CONFIG_PATH', ROOT_PATH . '/config');
define('SRC_PATH', ROOT_PATH . '/src');

// Autoload simples (futuramente pode usar Composer)
spl_autoload_register(function ($class) {
    $paths = [
        CONFIG_PATH . '/' . $class . '.php',
        SRC_PATH . '/models/' . $class . '.php',
        SRC_PATH . '/controllers/' . $class . '.php'
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Roteamento simples
$request = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Verificar se existe arquivo de configuração do banco
if (!file_exists(CONFIG_PATH . '/database.php')) {
    require_once SRC_PATH . '/views/setup.php';
    exit;
}

// Carregar página solicitada
switch ($request) {
    case 'auth':
        $authController = new AuthController();
        switch ($action) {
            case 'login':
                $authController->login();
                break;
            case 'register':
                $authController->register();
                break;
            case 'logout':
                $authController->logout();
                break;
            default:
                $authController->login();
                break;
        }
        break;
        
    case 'home':
    case 'dashboard':
        AuthController::requireAuth();
        require_once SRC_PATH . '/views/dashboard.php';
        break;
        
    case 'files':
        AuthController::requireAuth();
        require_once SRC_PATH . '/views/file-manager.php';
        break;
        
    case 'forms':
        AuthController::requireAuth();
        require_once SRC_PATH . '/views/dynamic-forms.php';
        break;
        
    case 'todo':
        AuthController::requireAuth();
        require_once SRC_PATH . '/views/todo-list.php';
        break;
        
    case 'calculator':
        AuthController::requireAuth();
        require_once SRC_PATH . '/views/calculator.php';
        break;
        
    default:
        if (!AuthController::checkAuth()) {
            header('Location: ?page=auth&action=login');
            exit;
        }
        http_response_code(404);
        require_once SRC_PATH . '/views/404.php';
        break;
}