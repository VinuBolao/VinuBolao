## Aplicação

Esta aplicação foi desenvolvida em com:

**Framework Laravel 5.4** para **BackEnd** 

**VueJS 2.4** para **FrontEnd**

**MySQL** como **Database**

## Instalação

Após clonar o projeto, você deverá executar o comando:

    composer update

este comando cria a pasta `vendor` que irá conter os pacotes e dependencias do PHP.

depois renomeie o arquivo `.env.example` para `.env` e execute o comando:

    php artisan key:generate
    
este comando cria a sua Application Key que será atribuida automaticamente para a variável de ambiente `APP_KEY`. 

o arquivo `.env` é onde voce tem que preencher os seus dados de conexão com Banco de Dados, abra o arquivo e nas variáveis listadas a baixo preencha os dados do seu banco. No exemplo abaixo estou usando MySQL mas você pode usar qualquer outro banco.

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nomedodatabase
    DB_USERNAME=usuariododatabase
    DB_PASSWORD=senhadodatabase

Depois execute o comando:

    npm install
    
este comando cria a pasta `node_modules` que irá conter os pacotes do node.

se tudo ocorreu certo você está com o ambiente pronto e pode rodar o comando `php artisan serve` e acessar o seu _localhost_ que o site estará rodando normalmente.