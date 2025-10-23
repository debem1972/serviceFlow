<?php
/**
 * Model User - Gerenciamento de Usuários
 * ServiceFlow
 */

class User 
{
    private $db;
    private $table = 'users';

    public function __construct() 
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Criar novo usuário
     */
    public function create($data) 
    {
        try {
            // Validar dados
            $this->validateUserData($data);
            
            // Verificar se email já existe
            if ($this->emailExists($data['email'])) {
                throw new Exception('Email já cadastrado no sistema');
            }

            // Hash da senha
            $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO {$this->table} (name, email, password_hash, phone, profession) 
                    VALUES (:name, :email, :password_hash, :phone, :profession)";
            
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                ':name' => trim($data['name']),
                ':email' => strtolower(trim($data['email'])),
                ':password_hash' => $passwordHash,
                ':phone' => $data['phone'] ?? null,
                ':profession' => $data['profession'] ?? null
            ]);

            if ($result) {
                return $this->db->lastInsertId();
            }
            
            throw new Exception('Erro ao criar usuário');
            
        } catch (Exception $e) {
            throw new Exception('Erro ao criar usuário: ' . $e->getMessage());
        }
    }

    /**
     * Autenticar usuário
     */
    public function authenticate($email, $password) 
    {
        try {
            $sql = "SELECT id, name, email, password_hash, profession 
                    FROM {$this->table} 
                    WHERE email = :email AND created_at IS NOT NULL";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':email' => strtolower(trim($email))]);
            
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password_hash'])) {
                // Remove senha do retorno
                unset($user['password_hash']);
                return $user;
            }
            
            return false;
            
        } catch (Exception $e) {
            throw new Exception('Erro na autenticação: ' . $e->getMessage());
        }
    }

    /**
     * Buscar usuário por ID
     */
    public function findById($id) 
    {
        try {
            $sql = "SELECT id, name, email, phone, profession, created_at 
                    FROM {$this->table} 
                    WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            return $stmt->fetch();
            
        } catch (Exception $e) {
            throw new Exception('Erro ao buscar usuário: ' . $e->getMessage());
        }
    }

    /**
     * Atualizar dados do usuário
     */
    public function update($id, $data) 
    {
        try {
            $fields = [];
            $params = [':id' => $id];
            
            if (isset($data['name'])) {
                $fields[] = 'name = :name';
                $params[':name'] = trim($data['name']);
            }
            
            if (isset($data['phone'])) {
                $fields[] = 'phone = :phone';
                $params[':phone'] = $data['phone'];
            }
            
            if (isset($data['profession'])) {
                $fields[] = 'profession = :profession';
                $params[':profession'] = $data['profession'];
            }
            
            if (empty($fields)) {
                throw new Exception('Nenhum campo para atualizar');
            }
            
            $fields[] = 'updated_at = CURRENT_TIMESTAMP';
            
            $sql = "UPDATE {$this->table} SET " . implode(', ', $fields) . " WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($params);
            
        } catch (Exception $e) {
            throw new Exception('Erro ao atualizar usuário: ' . $e->getMessage());
        }
    }

    /**
     * Verificar se email já existe
     */
    private function emailExists($email) 
    {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => strtolower(trim($email))]);
        
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Validar dados do usuário
     */
    private function validateUserData($data) 
    {
        if (empty($data['name'])) {
            throw new Exception('Nome é obrigatório');
        }
        
        if (empty($data['email'])) {
            throw new Exception('Email é obrigatório');
        }
        
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email inválido');
        }
        
        if (empty($data['password'])) {
            throw new Exception('Senha é obrigatória');
        }
        
        if (strlen($data['password']) < 6) {
            throw new Exception('Senha deve ter pelo menos 6 caracteres');
        }
    }
}