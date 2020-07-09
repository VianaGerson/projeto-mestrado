# guia para download e contribuição

## Instalação

Acesse a pasta backend e copie o arquivo .en.example para .env
```
cp .env.example .env
```

Logo em seguida saia da pasta backend para poder levantar os containers `cd ../`. Feito isso execute:

```
docker-compose up --build -d
```

Após executar este comando você estará subindo um ambiente de desenvolvimento com as seguintes ferramentas:

| Ferramenta            | Versão   |
| ----------------------| -------- |
| PHP                   | 7.4.5    |
| Laravel               | 6.18.13  |
| Postgres              | 11.7     |
| Nginx                 | Alpine   |


## Acessando ambiente de desenvolvimento

Quando certificar-se que todos os containers subiram corretamente, é necessário entrar dentro da máquina que o docker criou. Para realizar tal tarefa é preciso executar o seguinte comando:

``` 
docker-compose exec backend bash 
```

Esse comando fará com que você entre dentro do ambiente de desenvolvimento criado, possibilitando-o ter acesso aos comandos que o composer irá disponibilizar. Como é um projeto novo, é requisito executar o comando abaixo para atualizar todas as dependências do projeto.

```
composer update
```
ou
```
composer install
```

## Liberar permissão de escrita

É necessário executar os comandos abaixo para poder ter acesso de leitura e escrita nos arquivos do projeto. Isso é obrigatório fazer, porque o docker por padrão irá procurar um usuário root dentro do container, então você acessa o container como root e executa os seguintes comandos.
```
chown -Rf 1000:1000 .
chown -Rf www-data:www-data storage/
```
O DOCKERFILE desse projeto adiciona um usuario não root para você não precisar ficar executando esses comandos acima toda vez que for criada uma pasta ou arquivo.

para acessar o container com esse usuario execute:

```
docker-compose exec -u user backend bash 
```

## executando migrations e seeds

Caso não tenha as migrations em seu banco você precisa dos seguintes passos:

* Migrar a estrutura de dados
```
php artisan migrate
```
* Executar os seeds caso necessite

```
php artisan db:seed
```

## Configurando autenticação

* Para a autenticação, usa-se o pacote `jwt-auth` e o mesmo ja está configurado no projeto, as configurações do pacote estão em `config/jwt.php`.

## Testando Projeto

Para realizar o teste se o projeto realmente está rodando abra o ***browser*** e acesse: [SEU_ENDERECO_DE_IP:8000](SEU_ENDERECO_DE_IP:8000)