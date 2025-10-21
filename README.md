# 🚀 ServiceFlow

**Sistema de Gestão para Profissionais de Serviços**

Uma aplicação web completa para profissionais que prestam serviços (construção, elétrica, hidráulica, pintura) organizarem seus projetos, fotos, orçamentos e tarefas.

## 📋 Funcionalidades

- 📁 **Gerenciador de Arquivos** - Upload e organização de fotos por projeto
- 📝 **Formulários Dinâmicos** - Criação de orçamentos personalizáveis  
- 🎤 **TodoList com Voz** - Anotações por comando de voz
- 🧮 **Calculadora Multi-Modo** - Cálculos específicos por área (elétrica, construção)
- 📊 **Visualizador Excel** - Abertura de planilhas na aplicação
- 🔍 **Busca Avançada** - Pesquisa inteligente por projetos e tarefas
- 📄 **Geração de PDF** - Conversão de orçamentos para PDF

## 🛠️ Tecnologias

- **Backend:** PHP 8+ com PDO
- **Database:** Supabase (PostgreSQL)
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Versionamento:** Git + GitHub

## 📦 Estrutura do Projeto

```
ServiceFlow/
├── config/          # Configurações e conexão DB
├── src/             # Código fonte
│   ├── controllers/ # Controladores MVC
│   ├── models/      # Modelos de dados
│   └── views/       # Templates e páginas
├── public/          # Arquivos públicos
│   ├── assets/      # CSS, JS, imagens
│   └── uploads/     # Arquivos enviados
└── docs/            # Documentação
```

## 🚀 Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/debem1972/serviceFlow.git
   cd serviceFlow
   ```

2. **Configure o banco de dados:**
   ```bash
   cp config/database.example.php config/database.php
   # Edite config/database.php com suas credenciais do Supabase
   ```

3. **Execute o setup do banco:**
   ```bash
   php config/setup-database.php
   ```

4. **Acesse a aplicação:**
   ```
   http://localhost/ServiceFlow/public/
   ```

## 🗄️ Configuração do Supabase

1. Crie uma conta em [supabase.com](https://supabase.com)
2. Crie um novo projeto
3. Copie as credenciais para `config/database.php`
4. Execute o script de setup

## 📊 Status do Desenvolvimento

- ✅ **Estrutura Base** - Configuração inicial e banco
- 🔄 **Em Desenvolvimento:**
  - Gerenciador de Arquivos
  - Sistema de Autenticação
  - Formulários Dinâmicos
- ⏳ **Planejado:**
  - TodoList com Voz
  - Calculadora Multi-Modo
  - Geração de PDF

## 🤝 Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para:

1. Fazer fork do projeto
2. Criar uma branch para sua feature
3. Fazer commit das mudanças
4. Abrir um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---
**Desenvolvido com ❤️ para profissionais de serviços diversos**