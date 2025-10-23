# 📋 PRD - ServiceFlow
**Product Requirements Document**

---

## 📖 1. VISÃO GERAL DO PRODUTO

### 1.1 Problema a Resolver
Profissionais de serviços (construção, reforma, elétrica, hidráulica, pintura) enfrentam dificuldades para:
- Organizar registros fotográficos de serviços via smartphone
- Criar orçamentos personalizados de forma ágil
- Gerenciar tarefas e anotações importantes
- Realizar cálculos específicos da área de atuação
- Converter orçamentos para PDF profissionais

### 1.2 Solução Proposta
Sistema web completo que permite aos profissionais organizarem seus projetos, fotos, orçamentos e tarefas de forma integrada e acessível via smartphone/desktop.

### 1.3 Público-Alvo
- **Primário:** Profissionais autônomos de serviços (pedreiros, eletricistas, encanadores, pintores)
- **Secundário:** Pequenas empresas de reforma e construção
- **Terciário:** Prestadores de serviços diversos

---

## 🎯 2. OBJETIVOS DO PRODUTO

### 2.1 Objetivos de Negócio
- Digitalizar o processo de gestão de serviços
- Aumentar produtividade dos profissionais
- Profissionalizar apresentação de orçamentos
- Reduzir tempo gasto em tarefas administrativas

### 2.2 Objetivos de Usuário
- Organizar fotos de projetos facilmente
- Criar orçamentos rapidamente
- Anotar informações importantes por voz
- Realizar cálculos específicos da profissão
- Gerar PDFs profissionais

---

## ⚙️ 3. FUNCIONALIDADES

### 3.1 Core Features (MVP - v1.0)

#### 📁 **Gerenciador de Arquivos Hierárquico**
- Upload de múltiplas fotos via smartphone
- Organização em pastas por projeto/cliente
- Renomeação de arquivos e pastas
- Preview de imagens
- Download de arquivos
- **Critério de Aceitação:** Usuário consegue organizar 100+ fotos em menos de 5 minutos

#### 📝 **Formulários Dinâmicos para Orçamentos**
- Criação de templates personalizáveis
- Campos dinâmicos (texto, número, seleção, data)
- Cálculos automáticos
- Dados do cliente integrados
- **Critério de Aceitação:** Criar orçamento completo em menos de 10 minutos

#### 🔐 **Sistema de Autenticação**
- Registro/Login seguro
- Gestão de sessões
- Proteção de dados por usuário
- **Critério de Aceitação:** Login seguro e dados isolados por usuário

#### 🏗️ **Gestão de Projetos**
- CRUD completo de projetos
- Dados do cliente
- Status do projeto (ativo, concluído, cancelado)
- Relacionamento com arquivos
- **Critério de Aceitação:** Gerenciar 50+ projetos simultaneamente

### 3.2 Advanced Features (v1.1)

#### 🎤 **TodoList com Voz-para-Texto**
- Gravação de áudio via browser
- Conversão automática para texto
- Busca avançada (ignora acentos/maiúsculas)
- CRUD completo de tarefas
- Filtros por data/projeto
- **Critério de Aceitação:** 95% de precisão na transcrição

#### 📊 **Visualizador de Planilhas Excel**
- Upload de arquivos .xls, .xlsx, .xlsm
- Visualização na própria aplicação
- Download direto
- **Critério de Aceitação:** Abrir planilhas até 10MB

### 3.3 Professional Features (v2.0)

#### 🧮 **Calculadora Multi-Modo**
- **Modo Elétrica:** Cálculo de carga, disjuntores, conversões
- **Modo Construção:** Área construída, materiais, volumes
- **Modo Hidráulica:** Pressão, vazão, tubulações
- Histórico de cálculos salvos
- **Critério de Aceitação:** Cálculos precisos e salvos por projeto

#### 📄 **Geração de PDF**
- Conversão de orçamentos HTML para PDF
- Layout profissional
- Logo personalizado
- **Critério de Aceitação:** PDFs de qualidade profissional

---

## 🛠️ 4. ESPECIFICAÇÕES TÉCNICAS

### 4.1 Stack Tecnológico
- **Backend:** PHP 8+ com PDO
- **Database:** PostgreSQL (Supabase)
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Versionamento:** Git + GitHub
- **Deploy:** Railway/Render (produção)

### 4.2 Arquitetura
- **Padrão:** MVC (Model-View-Controller)
- **Estrutura:** Modular e escalável
- **Segurança:** Sanitização, validação, hash de senhas
- **Performance:** Otimização de queries, cache

### 4.3 Compatibilidade
- **Desktop:** Chrome, Firefox, Safari, Edge
- **Mobile:** Responsivo para smartphones/tablets
- **Resolução:** 320px a 1920px+

---

## 📊 5. MÉTRICAS DE SUCESSO

### 5.1 Métricas Técnicas
- Tempo de carregamento < 3 segundos
- Uptime > 99%
- Zero vulnerabilidades críticas
- Cobertura de testes > 80%

### 5.2 Métricas de Usuário
- Upload de fotos < 30 segundos
- Criação de orçamento < 10 minutos
- Taxa de conversão voz-texto > 95%
- Satisfação do usuário > 4.5/5

---

## 🗓️ 6. CRONOGRAMA

### Fase 1 - MVP (4 semanas)
- **Semana 1:** Autenticação + Estrutura base
- **Semana 2:** Gestão de projetos + Arquivos
- **Semana 3:** Formulários dinâmicos
- **Semana 4:** Testes + Deploy

### Fase 2 - Advanced (3 semanas)
- **Semana 5-6:** TodoList com voz + Excel viewer
- **Semana 7:** Refinamentos + UX

### Fase 3 - Professional (4 semanas)
- **Semana 8-10:** Calculadora multi-modo
- **Semana 11:** Geração de PDF + Polimentos

---

## 🔒 7. CONSIDERAÇÕES DE SEGURANÇA

- Sanitização de inputs
- Proteção contra SQL Injection
- Hash seguro de senhas (bcrypt)
- Validação de uploads
- Proteção CSRF
- Logs de auditoria

---

## 📱 8. EXPERIÊNCIA DO USUÁRIO

### 8.1 Fluxo Principal
1. **Login** → Dashboard
2. **Criar Projeto** → Adicionar dados do cliente
3. **Upload Fotos** → Organizar em pastas
4. **Criar Orçamento** → Preencher formulário dinâmico
5. **Gerar PDF** → Enviar para cliente

### 8.2 Design Principles
- **Mobile First:** Otimizado para smartphone
- **Simplicidade:** Interface intuitiva
- **Velocidade:** Ações rápidas e eficientes
- **Acessibilidade:** Compatível com diferentes dispositivos

---

**Documento criado em:** Janeiro 2025  
**Versão:** 1.0  
**Autor:** Equipe ServiceFlow