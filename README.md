# FuXi Backend

## Como rodar
```cli
docker compose build --no-cache
```

Comando para rodar as migrations do banco de dados
```cli
php artisan migrate
```

Comando para rodar as seeders do banco dados
```cli
php artisan db:seed
```

Comando para gerar a chave de encriptação da aplicação
```cli
php artisan key:generate
```
