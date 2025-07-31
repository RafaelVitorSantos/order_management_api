# Order_Management API

[![Status](https://img.shields.io/badge/Status-Em_desenvolvimento-yellow)]()
[![PHP](https://img.shields.io/badge/PHP-%3E%3D8.0-brightgreen)]()
[![Laravel](https://img.shields.io/badge/Laravel-%5E10-red)]()

# Descrição

API RESTful para gerenciamento de **Ordens de Serviço**, **Apontamentos**, **Documentos** e **Usuários**, construída com Laravel moderno.  
Foco em segurança, escalabilidade e boas práticas: autenticação com Sanctum, autorização via Policies, validação com FormRequests, rate limiting com alertas, blacklist de IPs, factories/seeders, filtros dinâmicos, e respostas padronizadas.

---

## Recursos principais

- CRUD de:
  - Usuários  
  - Ordens de Serviço  
  - Apontamentos  
  - Documentos  
- Autenticação API com **Laravel Sanctum** (tokens, proteção de sessão)  
- Autorização granular via **Policies**  
- Validação de entrada estruturada com **FormRequest**  
- Filtros dinâmicos (`?campo=valor` ou `?filter[campo]=valor`) com whitelist segura  
- Paginação padrão com meta  
- Factories e Seeders para dados de teste e inicialização  
- Rate limiting customizado na rota de login  
  - Limite: **10 tentativas por minuto**
  - Se o mesmo cliente exceder esse limite **5 vezes dentro de uma hora**, é disparado **um e-mail de alerta**  
- **Blacklist de IPs** bloqueando acessos indesejados  
- Respostas de erro consistentes e padronizadas  
- Logging/auditoria mínima de ações sensíveis (ex: tentativas de login, exclusão)  
- Versionamento da API (ex: via prefixo `/v1/`)  
- Convenções de commit (Conventional Commits) e branchamento  
- Boas práticas de segurança (rate limiting, headers, HTTPS obrigatório, hashing de senhas, verification de email, etc.)

---

## Requisitos

- PHP >= 8.0
- Laravel >= 10.0
- Composer  
- Banco de dados compatível (MySQL, PostgreSQL, etc.)  
- Servidor de email configurado (gmail, outlook, etc) (para alertas e verificação)  
- Git  

---