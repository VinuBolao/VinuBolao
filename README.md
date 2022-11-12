# VinúBolão

### Pré-requisitos

1. Instale [PHP >= 8.0](http://php.net/downloads.php)

2. Instale o [Laravel 9.x]

_Lembrando que essas são as versões utilizadas no momento de criação do projeto._

## Começando

1. Clone o repositório e entre na pasta.

    ```
      git clone https://github.com/GustavoSantosLima/VinuBolao.git

      cd VinuBolao
    ```

2. Copie e cole o arquivo `.env.example` na raiz do projeto com o nome `.env` ou renomeie.

    ```
      cp .env.example .env
    ```

3. Instale as dependencias do composer.

    ```
      composer update
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

6. Execute o comando abaixo para criar as tabelas no seu Banco de Dados e popular as tabelas.

    ```
      php artisan migrate
    ```

7. Instale as dependencias do [NPM](http://php.net/downloads.php).

    ```
      npm install
    ```
