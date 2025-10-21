<?php
/**
 * Script para Configurar Banco de Dados
 * Executa o schema SQL no Supabase
 */

require_once __DIR__ . '/Database.php';

try {
    echo "🚀 Iniciando configuração do banco de dados...\n\n";
    
    // Conectar ao banco
    $db = Database::getInstance();
    $connection = $db->getConnection();
    
    // Ler arquivo SQL
    $sqlFile = __DIR__ . '/../docs/database-schema.sql';
    if (!file_exists($sqlFile)) {
        throw new Exception("Arquivo SQL não encontrado: $sqlFile");
    }
    
    $sql = file_get_contents($sqlFile);
    
    // Executar SQL
    echo "📋 Executando schema do banco...\n";
    $connection->exec($sql);
    
    echo "✅ Banco de dados configurado com sucesso!\n\n";
    
    // Verificar tabelas criadas
    echo "📊 Verificando tabelas criadas:\n";
    $stmt = $connection->query("
        SELECT table_name 
        FROM information_schema.tables 
        WHERE table_schema = 'public' 
        AND table_type = 'BASE TABLE'
        ORDER BY table_name
    ");
    
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    foreach ($tables as $table) {
        echo "  ✓ $table\n";
    }
    
    echo "\n🎉 Setup concluído! Acesse: http://localhost/ServiceFlow/public/\n";
    
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
    exit(1);
}