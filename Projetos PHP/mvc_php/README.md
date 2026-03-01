# 🏗️ Business System — MVC em PHP

Sistema web de gerenciamento de produtos construído com arquitetura **MVC (Model-View-Controller)** implementada do zero em PHP puro, sem frameworks.

---

## 🖼️ Sobre o projeto

Este projeto foi desenvolvido para aprofundar o entendimento de padrões arquiteturais reais usados no mercado. O sistema possui roteamento customizado, camada de abstração de banco de dados e separação clara de responsabilidades entre as camadas.

---

## 🚀 Funcionalidades

- ✅ Roteamento dinâmico via `.htaccess` — URLs limpas sem parâmetros expostos
- ✅ Cadastro, listagem e exclusão de **produtos**
- ✅ Gerenciamento de **usuários** com upload de foto de perfil
- ✅ **Dashboard** com visão geral do sistema
- ✅ Interface de edição habilitada por botão (campos bloqueados por padrão)
- ✅ Design responsivo com **suporte a Dark Mode** automático

---

## 🏛️ Arquitetura MVC

```
mvc_php/
├── controllers/         # Lógica de controle das rotas
│   ├── home.php
│   ├── produto.php
│   ├── cliente.php
│   └── usuario.php
├── models/              # Acesso e manipulação de dados
│   ├── database.php     # Camada de abstração PDO
│   ├── produto.php
│   └── usuario.php
├── views/               # Templates de interface
│   ├── produtos/
│   └── usuarios/
├── assets/css/
├── rotas.php            # Dispatcher central
├── index.php            # Entry point
└── .htaccess            # Rewrite rules
```

### Fluxo de uma requisição:
```
URL → .htaccess → index.php → rotas.php → Controller → Model → View
```

---

## 🔑 Destaques técnicos

### Roteamento customizado
```apache
# .htaccess
RewriteEngine On
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```
Todas as URLs são interceptadas e redirecionadas para o `index.php`, que despacha para o controller correto via `rotas.php`.

### Camada de abstração de banco de dados
```php
// models/database.php
class Database extends PDO {
    public function executeQuery(string $query, array $parameters = []) {
        $stmt = $this->conn->prepare($query);
        $this->mountQuery($stmt, $parameters);
        $stmt->execute();
        return $stmt;
    }
}
```
Os Models não acessam o banco diretamente — toda query passa pela classe `Database`, centralizando a conexão e os prepared statements.

### Sub-rotas no Controller
```php
// controllers/produto.php
switch($subRota){
    case '':        // GET /produto → lista todos
    case 'cadastro': // GET /produto/cadastro → formulário
    case 'delete':   // GET /produto/delete/{id} → exclusão
    default:         // GET /produto/{id} → detalhe
}
```

---

## 🛠️ Tecnologias

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Apache](https://img.shields.io/badge/Apache-D22128?style=for-the-badge&logo=apache&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

- **PHP** — Backend e lógica de negócio
- **MySQL + PDO** — Banco de dados com prepared statements
- **Apache + .htaccess** — Roteamento via mod_rewrite
- **CSS3** — Estilização com suporte a `prefers-color-scheme`

---

## ⚙️ Como rodar localmente

### Pré-requisitos
- PHP 8.0+
- MySQL
- Apache com `mod_rewrite` ativo (XAMPP, WAMP ou similar)

### Passos

```bash
# 1. Clone o repositório
git clone https://github.com/Pavani9190/DS-WEB.git

# 2. Acesse a pasta do projeto
cd DS-WEB/PHP/mvc_php

# 3. Crie o banco de dados
# Execute o script SQL abaixo no seu MySQL
```

```sql
CREATE DATABASE mvc_db;
USE mvc_db;

CREATE TABLE produtos (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduto VARCHAR(100) NOT NULL,
    precoProduto DECIMAL(10,2) NOT NULL,
    estoqueProduto INT NOT NULL
);

CREATE TABLE usuarios (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nomeUsuario VARCHAR(100),
    emailUsuario VARCHAR(100),
    senhaUsuario VARCHAR(255),
    fotoUsuario VARCHAR(255)
);

INSERT INTO usuarios (nomeUsuario, emailUsuario, senhaUsuario) 
VALUES ('Admin', 'admin@email.com', '1234');
```

```bash
# 4. Configure a conexão em models/database.php
# Ajuste DB_USER, DB_PASSWORD e DB_HOST conforme seu ambiente

# 5. Acesse via Apache
# http://localhost/mvc_php/home
```

---

## 📚 O que aprendi com este projeto

- Como funciona o **padrão MVC** na prática, sem a "mágica" de um framework
- Roteamento com **mod_rewrite** do Apache
- Criação de uma **camada de abstração de banco de dados** reutilizável
- Upload e manipulação de arquivos com PHP
- Organização de projeto em camadas com responsabilidade única

---

## 👨‍💻 Autor

**Gustavo Pavani**  
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=flat&logo=linkedin&logoColor=white)](https://linkedin.com/in/gustavo-pavani)
[![GitHub](https://img.shields.io/badge/GitHub-181717?style=flat&logo=github&logoColor=white)](https://github.com/Pavani9190)