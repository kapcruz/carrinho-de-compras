## Carrinho de compras

# Iniciando o projeto
docker-compose up --build -d


# Instalando dependências
docker exec carrinho-de-compras_php-fpm_1 composer install

# Acesso ao PHPMYAdmin

Url: http://localhost:11003/
server: carrinho-de-compras_mariadb_1
user: root
senha: carrinho_root
