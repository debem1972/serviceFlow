<?php
/**
 * Configuração do Banco de Dados - Supabase
 * 
 * Renomeie este arquivo para database.php e configure suas credenciais
 */

return [
    'host' => 'db.supabase.co',
    'port' => '5432',
    'dbname' => 'postgres',
    'username' => 'postgres',
    'password' => 'SUA_SENHA_AQUI',
    'project_url' => 'https://SEU_PROJECT_ID.supabase.co',
    'anon_key' => 'SUA_ANON_KEY_AQUI',
    'service_role_key' => 'SUA_SERVICE_ROLE_KEY_AQUI',
    'charset' => 'utf8',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];