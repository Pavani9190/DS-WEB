# 🛒 Business System — Gestão de Vendas

Sistema web completo de gerenciamento de clientes, produtos e vendas, com **carrinho de compras interativo** e **histórico de vendas com filtros**.

---

## 🖼️ Sobre o projeto

Desafio desenvolvido para consolidar os conceitos de PHP orientado a objetos com PDO, integração com JavaScript via fetch API e gestão de estado no frontend. O sistema permite selecionar clientes e produtos para montar um pedido em tempo real, registrar a venda no banco de dados e consultar o histórico com filtros.

---

## 🚀 Funcionalidades

- ✅ **Carrinho de compras dinâmico** — produtos adicionados sem recarregar a página
- ✅ Controle de **quantidade no carrinho** com validação de estoque em tempo real
- ✅ **Registro de vendas** via fetch API (JSON POST para o backend)
- ✅ **Histórico de vendas** com filtro por cliente e por data
- ✅ CRUD completo de **Clientes** (cadastro, listagem, edição, exclusão)
- ✅ CRUD completo de **Produtos** (cadastro, listagem, edição, exclusão)
- ✅ Validação de formulários no frontend e backend
- ✅ Dark Mode automático via `prefers-color-scheme`
- ✅ Sessões para gerenciamento de estado

---

## 🗂️ Estrutura do projeto

```
DesafioVenda/
├── index.php               # Dashboard
├── cliente.php             # CRUD de clientes
├── produto.php             # CRUD de produtos
├── venda.php               # Tela de vendas com carrinho
├── conexao.php             # Conexão PDO
├── clienteValida.php       # Validação server-side de clientes
├── venda/
│   ├── vendaPost.php       # Endpoint JSON para registrar venda
│   └── vendaHistorico.php  # Histórico com filtros
└── assets/
    ├── js/
    │   ├── venda.js        # Lógica do carrinho (JS puro)
    │   └── script.js       # Validação de formulários
    └── style/
        └── style.css       # Dark mode + responsividade
```

---

## 🔑 Destaques técnicos

### Carrinho de compras em JavaScript puro
O carrinho gerencia estado em arrays, calcula totais dinamicamente e renderiza a tabela sem precisar de frameworks.

```javascript
function selecionaProduto(id, nome, codigo, estoque, preco) {
    produtos[id] = { id, nome, codigo, estoque, preco, quantidade: 1 }
    atualizaCarrinho()
}

function quantidadeProduto(id, quantidade) {
    if (produtos[id].quantidade + quantidade >= 1 &&
        produtos[id].quantidade + quantidade <= produtos[id].estoque) {
        produtos[id].quantidade += quantidade
        atualizaCarrinho()
    }
}
```

### Registro de venda via fetch API
A venda é enviada como JSON para o backend sem reload de página:

```javascript
async function finalizaVenda() {
    const dados = {
        cliente: { idCliente, nomeCliente },
        produtos: Object.values(produtos)
    }
    const response = await fetch("./venda/vendaPost.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dados)
    })
}
```

### Validação e tratamento robusto no backend
O `vendaPost.php` valida cada campo antes de gravar: verifica se o cliente existe, se há estoque disponível e se a estrutura do JSON está correta — tudo com `try/catch` e respostas padronizadas.

```php
// Verifica estoque antes de gravar
foreach ($data['produtos'] as $produto) {
    $stmt = $db->prepare("SELECT estoque FROM produto WHERE id_produto = :id");
    $stmt->execute([':id' => $produto['id']]);
    $estoque = $stmt->fetchColumn();
    
    if ($estoque < $produto['quantidade']) {
        throw new Exception("Estoque insuficiente para o produto ID {$produto['id']}");
    }
}
```

### Histórico de vendas com filtros dinâmicos
```php
// Filtros opcionais por cliente e data
if ($filtroCliente) $sql .= " AND idCliente = :cliente";
if ($filtroData)    $sql .= " AND DATE(dataVenda) = :data";
```

---

## 🗄️ Banco de dados

```sql
CREATE DATABASE pdo;
USE pdo;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    observacao TEXT
);

CREATE TABLE produto (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    codigo_produto INT NOT NULL,
    nome_produto VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL
);

CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT NOT NULL,
    dataVenda TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idCliente) REFERENCES clientes(id)
);

CREATE TABLE produtosvendidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idVenda INT NOT NULL,
    idProduto INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (idVenda) REFERENCES vendas(id),
    FOREIGN KEY (idProduto) REFERENCES produto(id_produto)
);
```

---

## 🛠️ Tecnologias

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

- **PHP + PDO** — Backend com prepared statements (prevenção de SQL Injection)
- **MySQL** — Banco relacional com chaves estrangeiras
- **JavaScript** — Carrinho de compras e comunicação com API via fetch
- **CSS3** — Dark mode automático e layout responsivo

---

## ⚙️ Como rodar localmente

### Pré-requisitos
- PHP 8.0+
- MySQL
- Apache com mod_rewrite (XAMPP, WAMP ou similar)

```bash
# 1. Clone o repositório
git clone https://github.com/Pavani9190/DS-WEB.git

# 2. Acesse a pasta
cd DS-WEB/PHP/POO/PDO/DesafioVenda

# 3. Crie o banco de dados
# Execute os scripts SQL acima no seu MySQL

# 4. Acesse via Apache
# http://localhost/DS-WEB/PHP/POO/PDO/DesafioVenda/
```

---

## 📚 O que aprendi com este projeto

- Integração entre **PHP e JavaScript** via fetch API e JSON
- Gerenciamento de **estado no frontend** sem bibliotecas externas
- **Validação em camadas** — frontend (JS) + backend (PHP) + banco (constraints)
- Relacionamento entre tabelas com **chaves estrangeiras**
- Uso correto de **PDO com prepared statements**

---

## 👨‍💻 Autor

**Gustavo Pavani**  
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=flat&logo=linkedin&logoColor=white)](https://linkedin.com/in/gustavo-pavani)
[![GitHub](https://img.shields.io/badge/GitHub-181717?style=flat&logo=github&logoColor=white)](https://github.com/Pavani9190)