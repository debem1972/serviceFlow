<?php
/**
 * Classe de Conexão com Banco de Dados
 * Padrão Singleton para Supabase/PostgreSQL
 */

class Database 
{
    private static $instance = null;
    private $connection;
    private $config;

    private function __construct() 
    {
        $this->config = require_once __DIR__ . '/database.php';
        $this->connect();
    }

    public static function getInstance() 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect() 
    {
        try {
            $dsn = sprintf(
                "pgsql:host=%s;port=%s;dbname=%s;sslmode=require",
                $this->config['host'],
                $this->config['port'],
                $this->config['dbname']
            );

            $this->connection = new PDO(
                $dsn,
                $this->config['username'],
                $this->config['password'],
                $this->config['options']
            );

        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function getConnection() 
    {
        return $this->connection;
    }

    public function query($sql, $params = []) 
    {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Erro na query: " . $e->getMessage());
        }
    }

    public function lastInsertId() 
    {
        return $this->connection->lastInsertId();
    }

    // Previne clonagem
    private function __clone() {}
    
    // Previne deserialização
    public function __wakeup() {}
}