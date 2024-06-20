## Carrinho de compras

# Iniciando o projeto
docker-compose up --build -d


# Instalando dependências
docker exec php-fpm-cart composer install

# Acesso ao PHPMYAdmin

Url: http://localhost:11003/
server: mariadb-cart
user: root
senha: carrinho_root

# Rodar testes
docker exec php-fpm-cart php ./vendor/bin/phpunit {diretório}
