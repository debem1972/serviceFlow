<?php
/**
 * AuthController - Controlador de Autenticação
 * ServiceFlow - Issue #1
 */

class AuthController 
{
    private $userModel;

    public function __construct() 
    {
        $this->userModel = new User();
    }

    /**
     * Processar registro de usuário
     */
    public function register() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'name' => $_POST['name'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'password' => $_POST['password'] ?? '',
                    'phone' => $_POST['phone'] ?? null,
                    'profession' => $_POST['profession'] ?? null
                ];

                $userId = $this->userModel->create($data);
                
                if ($userId) {
                    $_SESSION['success'] = 'Usuário criado com sucesso! Faça login.';
                    header('Location: ?page=auth&action=login');
                    exit;
                }
                
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
        
        require_once SRC_PATH . '/views/auth/register.php';
    }

    /**
     * Processar login de usuário
     */
    public function login() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';

                $user = $this->userModel->authenticate($email, $password);
                
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_profession'] = $user['profession'];
                    
                    header('Location: ?page=dashboard');
                    exit;
                } else {
                    $_SESSION['error'] = 'Email ou senha inválidos';
                }
                
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
        
        require_once SRC_PATH . '/views/auth/login.php';
    }

    /**
     * Logout seguro
     */
    public function logout() 
    {
        session_destroy();
        header('Location: ?page=auth&action=login');
        exit;
    }

    /**
     * Verificar se usuário está autenticado
     */
    public static function checkAuth() 
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Middleware - Redirecionar se não autenticado
     */
    public static function requireAuth() 
    {
        if (!self::checkAuth()) {
            header('Location: ?page=auth&action=login');
            exit;
        }
    }

    /**
     * Obter dados do usuário logado
     */
    public static function getUser() 
    {
        if (self::checkAuth()) {
            return [
                'id' => $_SESSION['user_id'],
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                'profession' => $_SESSION['user_profession']
            ];
        }
        return null;
    }
}