# VinuBolão

[![Code Climate](https://codeclimate.com/github/VinuBolao/VinuBolao/badges/gpa.svg)](https://codeclimate.com/github/VinuBolao/VinuBolao)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/51ff3b4bd55b4d06b0cb240b62839b88)](https://www.codacy.com/app/GustavoSantosLima/VinuBolao?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=VinuBolao/VinuBolao&amp;utm_campaign=Badge_Grade)

### Pré-requisitos

1. Instale [PHP 7.0](http://php.net/downloads.php)

2. Instale o [Composer 1.2](https://getcomposer.org)

3. Instale o [Laravel 5.4](https://laravel.com/docs/5.4#installation)

_Lembrando que essas são as versões utilizadas no momento de criação do projeto._

## Começando

1. Clone o repositório e entre na pasta.

    ```
      git clone https://github.com/GustavoSantosLima/VinuBolao.git
      
      cd VinuBolao
    ```

2. Instale as dependencias do composer.

    ```
      composer update
    ```

3. Copie e cole o arquivo `.env.example` na raiz do projeto com o nome `.env` ou renomeie.

    ```
      cp .env.examplo .env
    ```
    
4. Execute o comando abaixo para criar sua application key.

    ```
      php artisan key:generate
    ```

5. Atribua os dados do seu Banco de Dados nas variáveis do arquivo `.env` como no exemplo abaixo:

    ```
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=nomedodatabase
      DB_USERNAME=usuariododatabase
      DB_PASSWORD=senhadodatabase
    ```

4. Execute o comando abaixo para criar as tabelas no seu Banco de Dados e popular as tabelas.

    ```
      php artisan migrate --seed
    ```

6. Instale as dependencias do [NPM](http://php.net/downloads.php).

    ```
      npm install
    ```

    Obs. quando você fizer alguma alteração em arquivos .html, .js ou .css execute o comando `npm run dev` para compilar os Assets para mais informações [Laravel Mix](https://laravel.com/docs/5.4/mix).

