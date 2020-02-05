<h1>Parsing PHP</h1>

<p>Este sistema é de uso livre, o uso do web scraping pode violar os direitos autorais de alguns sites.</p>

<h2>Requisitos para Bootstrap, Poppers, Jquery e Asset</h2>
<dl>
    <dt>Laravel UI</dt>
    <dd>composer require laravel/ui --dev</dd>
    <dt>Laravel UI VUE e Auth</dt>
    <dd>php artisan ui vue --auth</dd>
    <dt>Instalar Node</dt>
    <dd>npm install</dd>
    <dt>Node em Desenvolvimento</dt>
    <dd>npm run dev</dd>
</dl>

<h2>Configurando Database</h2>
<dl>
    <dt>Alterar informações no arquivo .env</dt>
    <dd>
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_ScrapingTest
    DB_USERNAME=root
    DB_PASSWORD=
    </dd>
</dl>

<h2>Confgurando Migration</h2>
<dl>
    <dt>Criar Tabela Usuário</dt>
    <dd>php artisan make:migration usuario --create=usuario </dd>
    <dt>Criar Tabela Artigos</dt>
    <dd>php artisan make:migration artigos --create=artigos </dd>
    <dt>Rodar Migrations</dt>
    <dd>php artisan migrate</dd>
</dl>




