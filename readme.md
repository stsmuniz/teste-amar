Teste AMAR
==========

Uma aplicação em laravel para demonstrar conhecimentos básicos em PHP, MySQL, CSS e JS

Ferramentas usadas
------------------
* Docker
* Composer
* VIM

Pacotes e Plugins
-----------------
* AdminLTE
* DataTables

Testando o Projeto
------------------
Além do código, o projeto acompanha os arquivos do docker para provisionar os containers com as aplicações necessárias para executar o projeto. Para isso, deve se fazer os seguintes passos:

### Clonar este projeto
```git clone https://github.com/stsmuniz/teste-amar```

### Baixar as dependências do projeto
```docker run --rm -v $(pwd):/app composer/composer install```

### Montar o ambiente docker
```docker-compose up -d```

### Executar as migrações de banco de dados
```sudo docker exec -it teste-amar_app_1 php artisan migrate```

A partir deste ponto, o projeto já estará acessível no endereço ```http://localhost:8080```. Para registrar-se, clique no link "register" no cando superior direito ou acesse ```http://localhost:8080/register```, preencha com Nome, e-mail, login e senha. Você será redirecionado para o dashboard de usuários. De lá, poderá adicionar, editar e excluir (soft delete, os dados continuam no banco, porém inativos) registros. 
