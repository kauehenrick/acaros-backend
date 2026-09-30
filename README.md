# FuXi Backend

Backend da aplicação **FuXi**, um gerenciador de livros estilo biblioteca, desenvolvido com uma arquitetura baseada em **Docker**, **PHP** e **Laravel**.

## Stack

* **PHP 8.4**
* **Laravel 13**
* **Docker**
* **Docker Compose**

## Requisitos

Antes de iniciar o projeto, certifique-se de ter instalado:

* Docker
* Docker Compose

## Como executar o projeto

### 1. Build dos containers

Para construir os containers da aplicação, execute:

```bash
docker compose build --no-cache
```

O parâmetro `--no-cache` força a reconstrução das imagens sem utilizar o cache das etapas anteriores.

### 2. Iniciar os containers

Após concluir o build, inicie a aplicação com:

```bash
docker compose up -d
```

Para acompanhar os logs dos containers:

```bash
docker compose logs -f
```

### 3. Configurar a aplicação

Após iniciar os containers, configure a chave de criptografia da aplicação:

```bash
php artisan key:generate
```

### 4. Executar as migrations

Para criar e atualizar as tabelas do banco de dados:

```bash
php artisan migrate
```

### 5. Executar os seeders

Para popular o banco de dados com os dados iniciais:

```bash
php artisan db:seed
```

## Inicialização completa

Em um ambiente novo, a sequência recomendada é:

```bash
docker compose build --no-cache
docker compose up -d
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## Estrutura do projeto

A aplicação segue a estrutura padrão do Laravel, mantendo a separação entre regras de negócio, infraestrutura e camada de apresentação.

```text
FuXi Backend
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── docker/
├── docker-compose.yaml
└── README.md
```

## Banco de dados

As alterações na estrutura do banco devem ser realizadas através de **Laravel Migrations**.

Para aplicar novas migrations:

```bash
php artisan migrate
```

Para executar os seeders:

```bash
php artisan db:seed
```

> **Atenção:** os seeders podem inserir ou modificar dados no banco. Evite executá-los em ambientes de produção sem verificar previamente seu comportamento.

## Comandos úteis

### Verificar o status das migrations

```bash
php artisan migrate:status
```

### Reverter a última migration

```bash
php artisan migrate:rollback
```

### Limpar e recriar o banco de dados

```bash
php artisan migrate:fresh
```

> **Atenção:** `migrate:fresh` remove todas as tabelas do banco de dados antes de recriá-las. Use apenas em ambientes onde a perda dos dados seja aceitável.

### Parar os containers

```bash
docker compose down
```

### Reiniciar os containers

```bash
docker compose restart
```

## Desenvolvimento

Durante o desenvolvimento, recomenda-se manter os containers em execução e utilizar os comandos do Artisan conforme a necessidade.

Comandos executados diretamente pelo ambiente Docker podem ser adaptados conforme a configuração do `docker-compose.yaml`.
