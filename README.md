



## Configurando Projeto

- .env ( as informações do mailer estão no .env.example | https://sendgrid.com/ utilizado localmente. )
- .env (  QUEUE_CONNECTION=database também setado em .env.example )
- composer install
- php artisan migrate

## Rodando Projeto

- php artisan serve
- php artisan queue:work
 
 php artisan queue:work utilizado para rodar os jobs assíncronos
 
 ## Rotas - Autenticação ( rotas não autenticadas )
 - /api/auth/login
 - /api/auth/register

 ## Rotas - Autenticação ( rotas autenticadas )
 - /api/auth/logout

 ## Rotas - CRUD Despesas ( rotas autenticadas )
 - /api/despesa {post, params: descricao, data_despesa, user_id, valor}
 - /api/despesa {put, params: descricao, data_despesa, valor, despesa_id}
 - /api/despesa {get}
 - /api/despesa/usuario/{userId} {get}
 - /api/despesa/{despesaId} {delete}
