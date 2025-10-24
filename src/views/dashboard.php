<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceFlow - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="?">🚀 ServiceFlow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=dashboard">🏠 Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=files">📁 Arquivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=forms">📝 Formulários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=todo">✅ Todo List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=calculator">🧮 Calculadora</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            👤 <?= AuthController::getUser()['name'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><span class="dropdown-item-text"><small><?= AuthController::getUser()['profession'] ?? 'Profissional' ?></small></span></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="?page=auth&action=logout">🚪 Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">📊 Dashboard</h1>
                <div class="alert alert-info">
                    <strong>Bem-vindo, <?= AuthController::getUser()['name'] ?>!</strong> 
                    Você está logado como <?= AuthController::getUser()['profession'] ?? 'Profissional' ?>.
                </div>
            </div>
        </div>

        <!-- Cards de Funcionalidades -->
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 text-primary mb-3">📁</div>
                        <h5 class="card-title">Gerenciador de Arquivos</h5>
                        <p class="card-text">Organize fotos e documentos por projeto</p>
                        <a href="?page=files" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 text-success mb-3">📝</div>
                        <h5 class="card-title">Formulários Dinâmicos</h5>
                        <p class="card-text">Crie orçamentos personalizáveis</p>
                        <a href="?page=forms" class="btn btn-success">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 text-warning mb-3">✅</div>
                        <h5 class="card-title">Todo List com Voz</h5>
                        <p class="card-text">Anotações por comando de voz</p>
                        <a href="?page=todo" class="btn btn-warning">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 text-info mb-3">🧮</div>
                        <h5 class="card-title">Calculadora Multi-Modo</h5>
                        <p class="card-text">Cálculos específicos por área</p>
                        <a href="?page=calculator" class="btn btn-info">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 text-secondary mb-3">📊</div>
                        <h5 class="card-title">Relatórios</h5>
                        <p class="card-text">Visualize estatísticas dos projetos</p>
                        <button class="btn btn-secondary" disabled>Em Breve</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="display-4 text-danger mb-3">⚙️</div>
                        <h5 class="card-title">Configurações</h5>
                        <p class="card-text">Personalize sua experiência</p>
                        <button class="btn btn-outline-secondary" disabled>Em Breve</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status do Sistema -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">📈 Status do Sistema</h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <div class="border-end">
                                    <h4 class="text-primary">✅</h4>
                                    <small>Banco Conectado</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="border-end">
                                    <h4 class="text-success">0</h4>
                                    <small>Projetos Ativos</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="border-end">
                                    <h4 class="text-warning">0</h4>
                                    <small>Arquivos Enviados</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-info">0</h4>
                                <small>Tarefas Pendentes</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>