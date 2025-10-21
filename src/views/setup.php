<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceFlow - Configuração Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">🚀 ServiceFlow - Configuração Inicial</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h5>📋 Passos para Configuração:</h5>
                            <ol>
                                <li><strong>Criar conta no Supabase:</strong> <a href="https://supabase.com" target="_blank">supabase.com</a></li>
                                <li><strong>Criar novo projeto</strong> no Supabase</li>
                                <li><strong>Copiar credenciais</strong> do projeto</li>
                                <li><strong>Configurar arquivo</strong> <code>config/database.php</code></li>
                            </ol>
                        </div>

                        <div class="alert alert-warning">
                            <h6>⚠️ Arquivo de Configuração Necessário</h6>
                            <p>Copie o arquivo <code>config/database.example.php</code> para <code>config/database.php</code> e configure suas credenciais do Supabase.</p>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h6>📝 Exemplo de Configuração</h6>
                            </div>
                            <div class="card-body">
                                <pre><code><?php echo htmlspecialchars("<?php
return [
    'host' => 'db.supabase.co',
    'port' => '5432',
    'dbname' => 'postgres',
    'username' => 'postgres',
    'password' => 'SUA_SENHA_AQUI',
    'project_url' => 'https://SEU_PROJECT_ID.supabase.co',
    'anon_key' => 'SUA_ANON_KEY_AQUI',
    // ... outras configurações
];"); ?></code></pre>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="?" class="btn btn-primary">🔄 Tentar Novamente</a>
                            <a href="https://github.com/seu-usuario/ServiceFlow" class="btn btn-outline-secondary">📚 Documentação</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>